<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserDataTable;
use App\Helper\BreadcrumbsRegister;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
use App\Models\Attendance;
use App\Models\User;
use App\Models\UserCompany;
use App\Repositories\Admin\RoleRepository;
use App\Repositories\Admin\UserCompanyRepository;
use App\Repositories\Admin\AttendanceRepository;
use App\Repositories\Admin\UserDetailRepository;
use App\Repositories\Admin\UserRepository;
use App\Http\Controllers\AppBaseController;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Laracasts\Flash\Flash;
use Illuminate\Support\Facades\Auth;

/**
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends AppBaseController
{
    /** @var  UserRepository */
    private $userRepository;

    /** ModelName */
    private $ModelName;

    /** ModelName */
    private $BreadCrumbName;

    /** @var  RoleRepository */
    private $roleRepository;
    private $attendanceRepository;

    /** @var  UserDetailRepository */
    private $userDetailRepository;

    /** @var  UserCompanyRepository */
    private $userCompanyRepository;

    public function __construct(UserRepository $userRepo, RoleRepository $roleRepo, UserDetailRepository $detailRepo, UserCompanyRepository $userCompanyRepo, AttendanceRepository $attendanceRepo)
    {
        $this->userRepository = $userRepo;
        $this->attendanceRepository = $attendanceRepo;
        $this->userDetailRepository = $detailRepo;
        $this->userCompanyRepository = $userCompanyRepo;
        $this->roleRepository = $roleRepo;
        $this->ModelName = 'users';
        $this->BreadCrumbName = 'Users';
    }

    /**
     * Display a listing of the User.
     * @param UserDataTable $userDataTable
     * @return Response
     */
    public function index(UserDataTable $userDataTable)
    {
        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName);
        return $userDataTable->render('admin.users.index', ['title' => $this->BreadCrumbName]);
    }

    /**
     * Show the form for creating a new User.
     * @return Response
     */
    public function create()
    {
        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName);
        $roles = $this->roleRepository->all()->where('id', '!=', '1')->pluck('display_name', 'id')->all();

        return view('admin.users.create')->with([
            'title' => $this->BreadCrumbName,
            'roles' => $roles
        ]);
    }
    
    /**
    *
    *
    *  Code added by Junaid Quadri for
    *  Uploading Users through CSV
    *  @param Request $request
    *  @return Response
    *
    *
    */

    public function uploadFile(Request $request)
    {
        $path = $request->file('csvfile')->getRealPath();
         $redirect_to = redirect(route('admin.users.index'));
//        $data = \Excel::load($path)->get();

        if (($h = fopen($path, "r")) !== FALSE) 
        {
          // Each line in the file is converted into an individual array that we call $data
          // The items of the array are comma separated
          while (($data = fgetcsv($h, 1000, ",")) !== FALSE) 
          {
            // Each individual array is being pushed into the nested array
            $the_big_array[] = $data;       
          }

          // Close the file
          fclose($h);
        }


        foreach($the_big_array as $value){

            try{
                if(!empty($value[1]) && !empty($value[2])){    
                    $id = User::create([
                        'name' => $value[0],
                        'email' => $value[1],
                        'password' => bcrypt($value[2])
                    ])->id;

                    $this->userDetailRepository->create([
                        'user_id' => $id,
                        'first_name' => $value[3],
                        'last_name' => $value[4],
                        'phone' => $value[5],
                        'address' => $value[6],
                        'salary' => $value[7]
                    ]);
                    $this->userRepository->attachRole($id, $value[8]);
                }
            }catch(\Exception $e){
                Flash::error($this->BreadCrumbName . $e->getMessage());
                return $redirect_to->with([
                    'title' => $this->BreadCrumbName
                ]); 
            }       
        }
        Flash::success($this->BreadCrumbName . ' saved successfully.');
        return $redirect_to->with([
            'title' => $this->BreadCrumbName
        ]);    
    }
    /**
    *
    *
    Code Ended by Junaid Quadri for
    Uploading Users through CSV
    *
    *
    */

    /**
     * Store a newly created User in storage.
     * @param CreateUserRequest $request
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        // Create User
//        dd($request->all());
        $user = $this->userRepository->saveRecord($request);

        // Create UserDetail
        $this->userDetailRepository->saveRecord($user->id, $request);

        // For Supervisor
        if($request->roles[0] == 4){
            // Create UserCompany
            $this->userCompanyRepository->saveRecord($user->id, $request);
        }

        //attach role to user....
        $this->userRepository->attachRole($user->id, $request->roles);

        Flash::success('User saved successfully.');
        return redirect(route('admin.users.index'))->with(['title' => $this->BreadCrumbName]);
    }


    public function storeWorker(Request $request)
    {
        $data = $request->all();
//        dd($request->all());
//        dd($request->company_id);
        $company_id = UserCompany::where(['user_id' => $request->company_id])->first();
        $user = User::where('id', $request->company_id)->first();
        //attach worker to company....
//        $this->userRepository->attachWorker($company_id->id, $request->roles );

        $selectedRoles = [];
        if ($request->has('roles') || $request->get('roles', null) !== null) {
            $selectedRoles = $request->get('roles');
            unset($data['roles']);

            $existingRoles = DB::table('user_company')->where('company_id', $company_id->id)->pluck('user_id')->all();
//            $existingRoles = [ 0 => 8 , 1 => 11];
//            dd($existingRoles);
            $newRoles = array_diff($selectedRoles, $existingRoles);
//            dd($newRoles);
            $rolesToBeDeleted = array_diff($existingRoles, $selectedRoles);
//            dd($rolesToBeDeleted);
            foreach ($newRoles as $newRole) {
                $this->userRepository->attachWorker($company_id->id, $newRole );
            }

            foreach ($rolesToBeDeleted as $roleToBeDeleted) {
//                $this->detachRole($user->id, $roleToBeDeleted);
                $this->userRepository->detachWorker($company_id->id, $roleToBeDeleted );
            }
        }


        Flash::success('Worker added successfully.');
        return redirect(route('admin.users.index'))->with(['title' => $this->BreadCrumbName]);
    }


    /**
     * Display the specified User.
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        $attendance = $this->attendanceRepository->orderBy('id')->findByField(['user_id' => $id])->groupBy('job_date');

        $userTask = DB::table('task_user')->where('user_id', $id)->pluck('task_id')->all();

        $userRole = User::whereHas('roles', function($q) use ($id){
            $q->where(['name' => 'Worker']);
        })->where(['id' => $id])->first();

//        dd($userRole);

        if(count($userTask) != 0){
//        if($userRole != NULL && $userTask != NULL){
            $nestedUsers = '';
            foreach ($userTask as $key => $service) {
                $nestedUsers .= $service.',';
            }
            $ids = rtrim($nestedUsers,',');

            $total_jobs_performance = DB::select(DB::raw("SELECT COUNT(tasks.id) as job_count, task_categories.parent_task_id FROM tasks JOIN task_categories WHERE tasks.task_id = task_categories.id AND tasks.id IN ($ids) AND tasks.status = 40 AND task_categories.parent_task_id = 1 AND MONTH(tasks.complete_date) = MONTH(CURRENT_DATE()) AND YEAR(tasks.complete_date) = YEAR(CURRENT_DATE())"));

            $total_jobs_conformance = DB::select(DB::raw("SELECT COUNT(tasks.id) as job_count, task_categories.parent_task_id FROM tasks JOIN task_categories WHERE tasks.task_id = task_categories.id AND tasks.id IN ($ids) AND tasks.status = 40 AND task_categories.parent_task_id = 2 AND MONTH(tasks.complete_date) = MONTH(CURRENT_DATE()) AND YEAR(tasks.complete_date) = YEAR(CURRENT_DATE())"));

            $total_jobs_performance_earn = DB::select(DB::raw("SELECT tasks.*, task_categories.*, task_comments.* FROM tasks
        INNER JOIN task_categories ON tasks.task_id = task_categories.id
        INNER JOIN task_comments ON tasks.id = task_comments.task_id
        WHERE tasks.id IN ($ids) AND tasks.status = 40
        AND task_categories.parent_task_id = 1
        AND MONTH(tasks.complete_date) = MONTH(CURRENT_DATE()) AND YEAR(tasks.complete_date) = YEAR(CURRENT_DATE())"));
//        dd($total_jobs_performance_earn);

            $total_perf = 0;
            foreach($total_jobs_performance_earn as $earn){
                if($earn->earn_point <= 0 && $earn->quantity > 0 && $earn->cash_value > 0){
                    $total_perf += ($earn->quantity * $earn->cash_value);
                }
                if($earn->earn_point > 0 && $earn->quantity > 0 && $earn->cash_value <= 0){
                    $total_perf += ($earn->earn_point * $earn->quantity);
                }
                if($earn->earn_point > 0 && $earn->quantity <= 0 && $earn->cash_value > 0){
                    $total_perf += ($earn->earn_point * $earn->cash_value);
                }
            }
//        dd($total_perf);
            $total_jobs_conformance_earn = DB::select(DB::raw("SELECT tasks.*, task_comments.* FROM tasks JOIN task_comments WHERE tasks.id = task_comments.task_id AND tasks.id IN ($ids) AND tasks.status = 40 AND MONTH(tasks.complete_date) = MONTH(CURRENT_DATE()) AND YEAR(tasks.complete_date) = YEAR(CURRENT_DATE())"));

            $total_conf = 0;
            foreach($total_jobs_conformance_earn as $earn){
                $total_conf += ($earn->rating * 300)/5;
            }
        }else{

        }




        foreach ($attendance as $server => $disks) {
            foreach ($disks as $disk => $available_space) {

                $clockIn  = $available_space->time_in;
                $clockOut = $available_space->time_out;
                $job_date = $server;
                $current_date = Carbon::now();

                if(empty($clockOut)){
                    if($job_date < $current_date->toDateString()){
                        //update timeOut
                        $clockInSec = strtotime($clockIn);
                        $diffSec = $clockInSec + 3600;
                        $time_out = date('H:i:s', $diffSec);
                        $update = DB::table('attendance')->where('id', $available_space->id)->update(['time_out' => $time_out]);
                    }else{

                    }
                }
            }
        }

        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.users.index'));
        }
        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName, $user);
        return view('admin.users.show')->with([
            'title'         => $this->BreadCrumbName,
            'user'          => $user,
            'job_count_perf'    => isset($total_jobs_performance[0]->job_count) ? $total_jobs_performance[0]->job_count:'',
            'total_perf'        => isset($total_perf) ? $total_perf:'',
            'job_count_conf'    => isset($total_jobs_conformance[0]->job_count) ? $total_jobs_conformance[0]->job_count:'',
            'total_conf'        => isset($total_conf) ? $total_conf:'',
            'attendance'    => $attendance,
        ]);
    }

    public function showWorkerForm($id)
    {
        // user_id -> company -> users

        $company = UserCompany::where(['user_id' => $id])->first();
        $existingRoles = DB::table('user_company')->where('company_id', $company->id)->pluck('user_id')->all();
//        dd($existingRoles);
//        $user = User::where('id', $company_id->id)->first();

//        $services = $this->serviceRepository->findWhere(['parent_id' => 0])->pluck('name', 'id');
//        $userServices = $user->services->pluck('id')->toArray();
//        $mechanicMakers = $user->mechanicMakers->pluck('id')->toArray();

        $nestedServices = [];
        foreach ($existingRoles as $key => $service) {
            $nestedServices[$service] = User::withRole('Worker')->where('id', $service)->pluck('name', 'id')->first();
        }
//        dd($nestedServices);

        $workers = User::withRole('Worker')->get()->pluck('name', 'id');
//        dd($workers);
        if (empty($workers)) {
            Flash::error('User not found');
            return redirect(route('admin.users.index'));
        }
        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName, 'Add Workers');
        return view('admin.users.add')->with([
            'title' => $this->BreadCrumbName,
            'workers' => $workers,
            'worker2' => $nestedServices,
            'id' => $id
        ]);
    }

    /**
     * Show the form for editing the specified User.
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.users.index'));
        }

        $roles = $this->roleRepository->all()->where('id', '!=', '1')->pluck('display_name', 'id')->all();
        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName, $user);
        return view('admin.users.edit')->with(['user' => $user, 'title' => $this->BreadCrumbName, 'roles' => $roles]);
    }

    /**
     * Update the specified User in storage.
     * @param  int $id
     * @param UpdateUserRequest $request
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        $user = $this->userRepository->findWithoutFail($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.users.index'));
        }

        $this->userRepository->updateRecord($request, $user);

        Flash::success('User updated successfully.');
        return redirect(route('admin.users.index'))->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * Remove the specified User from storage.
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = $this->userRepository->findWithoutFail($id);
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.users.index'));
        }

        $message = $this->userRepository->deleteRecord($id);
        if($message == 'success'){
            Flash::success('User deleted successfully');
        }else{
            Flash::error('User can\'t be deleted');
        }

        return redirect(route('admin.users.index'))->with(['title' => $this->BreadCrumbName]);
    }

    /**
     * @return $this|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function profile()
    {
        $user = Auth::user();
        if (empty($user)) {
            Flash::error('User not found');
            return redirect(route('admin.users.index'));
        }
        $this->BreadCrumbName = 'Profile';

        BreadcrumbsRegister::Register($this->ModelName, $this->BreadCrumbName);
        return view('admin.users.edit')->with(['title' => $this->BreadCrumbName, 'user' => $user]);
    }
}