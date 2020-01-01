<?php

namespace App\Repositories\Admin;

use App\Models\UserCompany;
use Illuminate\Support\Facades\Storage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class UserCompanyRepository
 * @package App\Repositories\Admin
 * @version April 2, 2018, 9:11 am UTC
 *
 * @method UserCompany findWithoutFail($id, $columns = ['*'])
 * @method UserCompany find($id, $columns = ['*'])
 * @method UserCompany first($columns = ['*'])
 */
class UserCompanyRepository extends BaseRepository
{
    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserCompany::class;
    }

    /**
     * @param $id
     * @param $request
     * @return mixed
     */
    public function saveRecord($id, $request)
    {
        $userDetailData = $request->only(['company', 'detail']);

//        dd($userDetailData);
        $userDetails['user_id'] = $id;
        $userDetails['company'] = ucwords($userDetailData['company']);
        $userDetails['detail'] = isset($userDetailData['detail']) ? $userDetailData['detail']: '';

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
            $userCompanyData = $request->only(['company', 'detail']);

            $updateData['user_id'] = $id;
            $updateData['company'] = $userCompanyData['company'];
            $updateData['detail'] = isset($userCompanyData['detail'])? $userCompanyData['detail']: '';

            $userDetails = $userDetails->update($updateData);
        }

        return $userDetails;
    }

//    public function attachWorker($companyId,$userId)
//    {
//        $company = $this->findWithoutFail($companyId);
//        $company->companies()->attach($userId);
//        $company->save();
//    }
}