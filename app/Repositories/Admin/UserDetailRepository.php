<?php

namespace App\Repositories\Admin;

use App\Models\UserDetail;
use Illuminate\Support\Facades\Storage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserDetailRepository
 * @package App\Repositories\Admin
 * @version April 2, 2018, 9:11 am UTC
 *
 * @method UserDetail findWithoutFail($id, $columns = ['*'])
 * @method UserDetail find($id, $columns = ['*'])
 * @method UserDetail first($columns = ['*'])
 */
class UserDetailRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserDetail::class;
    }

    /**
     * @param $id
     * @param $request
     * @return mixed
     */
    public function saveRecord($id, $request)
    {
        $userDetailData = $request->only(['first_name', 'last_name', 'password', 'phone', 'address', 'email_updates', 'image', 'salary']);

//        dd($userDetailData);
        $userDetails['user_id'] = $id;
        $userDetails['first_name'] = ucwords($userDetailData['first_name']);
        $userDetails['last_name'] = ucwords($userDetailData['last_name']);
        $userDetails['phone'] = isset($userDetailData['phone']) ? $userDetailData['phone']: '';
        $userDetails['address'] = isset($userDetailData['address']) ? $userDetailData['address']: '';
        $userDetails['salary'] = isset($userDetailData['salary']) ? $userDetailData['salary']: '';
        $userDetails['email_updates'] = isset($userDetailData['email_updates']) ?? 0;

//        dd($request->all());
        $userDetails['image'] = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $userDetails['image'] = Storage::putFile('users', $file);
        }

        $userDetails = $this->create($userDetails);
        return $userDetails;
    }

    /**
     * @param $id
     * @param $request
     * @return mixed
     */
    public function updateRecord($id, $request)
    {
        $updateData = [];
        $userDetails = $this->findWhere(['user_id' => $id])->first();
        if ($userDetails) {
            $updateData = $request->all();
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $updateData['image'] = Storage::putFile('users', $file);
            }

            $userDetails = $userDetails->update($updateData);
        }
        /*if ($request->hasFile('image')) {
            $file = $request->file('image');
            $userDetails['image'] = Storage::putFile('users', $file);
        }

        $userDetails = $this->update($request, $id);*/
        return $userDetails;
    }
}