<?php

namespace App\Repositories\Admin;

use App\Models\Attendance;
use Carbon\Carbon;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AttendanceRepository
 * @package App\Repositories\Admin
 * @version January 25, 2019, 2:42 pm UTC
 *
 * @method Attendance findWithoutFail($id, $columns = ['*'])
 * @method Attendance find($id, $columns = ['*'])
 * @method Attendance first($columns = ['*'])
*/
class AttendanceRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'time_in',
        'time_out',
        'job_date',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Attendance::class;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($id)
    {
        $data['user_id'] = $id;
        $data['time_in'] = date('h:i');
        $data['job_date'] = date('Y-m-d');

        $attendance = $this->create($data);
        return $attendance;
    }

    /**
     * @param $request
     * @param $attendance
     * @param $request
     * @param $user_id
     * @return mixed
     */
    public function updateRecord($request, $user_id)
    {
        $data['time_out'] = date('h:i');
        $today = date('Y-m-d');
        $attendance = Attendance::where(['user_id' => $user_id,'job_date' => $today ])->update($data);
//        dd($data);
        return $attendance;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        $attendance = $this->delete($id);
        return $attendance;
    }
}
