<?php

namespace App\Repositories\Admin;

use App\Models\Task;
use App\Models\User;
use App\Models\UserCompany;
use App\Models\UserDetail;
use App\Models\UserDevice;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserRepository
 * @package App\Repositories\Admin
 * @version April 2, 2018, 9:11 am UTC
 *
 * @method User findWithoutFail($id, $columns = ['*'])
 * @method User find($id, $columns = ['*'])
 * @method User first($columns = ['*'])
 */
class UserRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email',
        'password',
        'remember_token'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return User::class;
    }

    /**
     * @param $userId
     * @param $roleId
     */
    public function attachRole($userId, $roleId)
    {
        $user = $this->findWithoutFail($userId);
        $user->roles()->attach($roleId);
        $user->save();
    }

    public function attachWorker($userId, $roleId)
    {
        $user = $this->findWithoutFail($userId);
        $user->roles2()->attach($roleId);
        $user->save();
    }

    public function attachTask($userId, $roleId)
    {
        $taskRepository = App::make(Task::class);
        $task = $taskRepository->where('id',$userId)->first();
        $task->user2()->attach($roleId);
        $task->save();
    }

    public function detachWorker($userId, $roleId)
    {
        $user = $this->findWithoutFail($userId);
        $user->roles2()->detach($roleId);
        $user->save();
    }

    public function detachTask($userId, $roleId)
    {
        $taskRepository = App::make(Task::class);
        $task = $taskRepository->where('id',$userId)->first();
        $task->user2()->detach($roleId);
        $task->save();
    }

    /**
     * @param $userId
     * @param $roleId
     */
    public function detachRole($userId, $roleId)
    {
        $user = $this->findWithoutFail($userId);
        $user->roles()->detach($roleId);
        $user->save();
    }



    /**
     * @param $email
     * @return mixed
     */
    public function getUserByEmail($email)
    {
        return $this->model->whereEmail($email)->first();
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($request)
    {
        $userData = $request->only(['first_name', 'last_name', 'email', 'password']);
        $userDevice = $request->only(['device_token', 'device_type', 'push_notification', 'user_id']);
        $postData['name'] = ucwords($userData['first_name'].' '.$userData['last_name']);
        $postData['email'] = $userData['email'];
        $postData['password'] = bcrypt($userData['password']);

        $user = $this->create($postData);

        if(isset($userDevice['device_token'])){
            $deviceData = App::make(UserDevice::class);
            $userDevice['user_id'] = $user->id;
            $deviceData->create($userDevice);
        }


        return $user;
    }

    /**
     * @param $request
     * @param $user
     * @return mixed
     */
    public function updateRecord($request, $user)
    {
        $data = $request->all();

        unset($data['email']);

        if($request->has('company')){
            if($data['roles'][0] == 4){
                $userCompanyRepository = App::make(UserCompany::class);
                $updateData = [];
                $userDetails = $userCompanyRepository->where(['user_id' => $user->id])->first();
                $userCompanyData = $request->only(['company', 'detail']);
                if ($userDetails) {
                    $updateData['company'] = $userCompanyData['company'];
                    $updateData['detail'] = isset($userCompanyData['detail'])? $userCompanyData['detail']: '';
                    $userCompanyRepository->where(['user_id' => $user->id])->update($updateData);
                }else{
                    $updateData['user_id'] = $user->id;
                    $updateData['company'] = $userCompanyData['company'];
                    $updateData['detail'] = isset($userCompanyData['detail'])? $userCompanyData['detail']: '';
                    $userCompanyRepository->create($updateData);
                }
            }
        }

        if ($request->has('password') && $request->get('password', null) === null) {
            unset($data['password']);
        } else {
            $data['password'] = bcrypt($data['password']);
        }

        $selectedRoles = [];
        if ($request->has('roles') || $request->get('roles', null) !== null) {
            $selectedRoles = $request->get('roles');
            unset($data['roles']);

            $existingRoles = $user->roles->pluck('id')->all();
//            dd($existingRoles);
            $newRoles = array_diff($selectedRoles, $existingRoles);
            $rolesToBeDeleted = array_diff($existingRoles, $selectedRoles);
            foreach ($newRoles as $newRole) {
                $this->attachRole($user->id, $newRole);
            }
            foreach ($rolesToBeDeleted as $roleToBeDeleted) {
                $this->detachRole($user->id, $roleToBeDeleted);
            }
        }


        $userDetailRepository = App::make(UserDetail::class);
        $updateData2 = [];
        $userDetail = $userDetailRepository->where(['user_id' => $user->id])->first();
        if ($userDetail) {
            $userDetailData = $request->only(['first_name', 'last_name', 'phone', 'address', 'email_updates', 'image', 'salary']);

//            $updateData2['user_id'] = $user->id;
            $updateData2['first_name']      = $userDetailData['first_name'];
            $updateData2['last_name']       = $userDetailData['last_name'];
            $updateData2['phone']           = $userDetailData['phone'];
            $updateData2['address']         = $userDetailData['address'];
            $updateData2['email_updates']   = isset($userDetailData['email_updates']) ?? 0;
            $updateData2['image']           = null;
            $updateData2['salary']          = $userDetailData['salary'];

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $updateData2['image'] = Storage::putFile('users', $file);
            }

            $userDetailRepository->where(['user_id' => $user->id])->update($updateData2);
        }

        $user = $this->update($data, $user->id);
        return $user;
    }

    /**
     * @param $id
     * @return array
     */
    public function deleteRecord($id)
    {

        $userTask  = DB::table('task_user')->where('user_id', $id)->first();
        $userTask2 = Task::where('created_by', $id)->first();

        if(!empty($userTask) || !empty($userTask2)){
            return 'error';
        }else{
        $userCompanyRepository = App::make(UserCompany::class);
        $userCompanyRepository->where(['user_id' => $id])->delete();
        $this->delete($id);
            return 'success';
        }
    }

    public function getAllWorkers()
    {

    }
}