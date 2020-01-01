<?php

namespace App\Http\Controllers\Admin;

use App\Helper\BreadcrumbsRegister;
use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Notification;
use App\Repositories\Admin\MenuRepository;
use App\Repositories\Admin\RoleRepository;
use App\Repositories\Admin\UserRepository;
use App\Repositories\Admin\AttendanceRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

/**
 * Class HomeController
 * @package App\Http\Controllers\Admin
 */
class HomeController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepository;
    protected $attendanceRepository;

    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var MenuRepository
     */
    protected $menuRepository;

    /**
     * HomeController constructor.
     * @param UserRepository $userRepo
     * @param AttendanceRepository $attendanceRepo
     * @param RoleRepository $roleRepo
     * @param MenuRepository $menuRepo
     */
    public function __construct(UserRepository $userRepo, RoleRepository $roleRepo, MenuRepository $menuRepo, AttendanceRepository $attendanceRepo)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepo;
        $this->attendanceRepository = $attendanceRepo;
        $this->roleRepository = $roleRepo;
        $this->menuRepository = $menuRepo;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo '<script>alert("add authentication pram in API swagger doc")</script>';
        if (App::environment() == 'staging') {
            $this->menuRepository->update(['status' => 0], 5);
        }
        $users = $this->userRepository->findWhereNotIn('id', [1, Auth::id()])->count();
        $roles = $this->roleRepository->all()->count();
        BreadcrumbsRegister::Register();
        return view('admin.home')->with(['users' => $users, 'roles' => $roles]);
    }


    public function clock(\Illuminate\Http\Request $request){
        if(isset($request['clock_out'])){

            $input['clock_out'] = $request['clock_out'];
            $users = $this->userRepository->findWhereNotIn('id', [1, Auth::id()])->count();
            $roles = $this->roleRepository->all()->count();
            BreadcrumbsRegister::Register();
            $user = Auth::id();
            $this->attendanceRepository->updateRecord($input, $user);
            return view('admin.home')->with(['users' => $users, 'roles' => $roles]);
        }else{
            $users = $this->userRepository->findWhereNotIn('id', [1, Auth::id()])->count();
            $roles = $this->roleRepository->all()->count();
            BreadcrumbsRegister::Register();
            $user = Auth::id();
            $attendance = $this->attendanceRepository->saveRecord($user);
            return view('admin.home')->with(['users' => $users, 'roles' => $roles]);
        }

    }


    public function getNotification()
    {
        $data = Notification::whereIn('ref_id', [0,Auth::id()])->orderBy('created_at','desc')->get();
        $resultArray = [];
        $i =0;
        foreach ($data as $item){
            $resultArray[$i] = $item;
            $i++;
        }
//        dd($resultArray);

        if (empty($data)) {
            Flash::error('Notification not found');
        }

        return $resultArray;
    }

    public function markRead($id)
    {
        $value['status'] = 1;
        Notification::where('id',$id)->update($value);
    }

    public function getAlertNotification()
    {
        $wordlist = Notification::whereIn('ref_id', [0,Auth::id()])->where('status', '=', 0)->get();
        $wordCount = $wordlist->count();
        return $wordCount;
    }



}