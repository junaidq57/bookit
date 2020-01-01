<?php

namespace App\Repositories\Admin;

use App\Models\Task;
use App\Models\User;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TaskRepository
 * @package App\Repositories\Admin
 * @version January 25, 2019, 2:52 pm UTC
 *
 * @method Task findWithoutFail($id, $columns = ['*'])
 * @method Task find($id, $columns = ['*'])
 * @method Task first($columns = ['*'])
*/
class TaskRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'detail',
        'priority',
        'start_date',
        'end_date',
        'created_by',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Task::class;
    }

    // function to convert string and print
    public function convertString($date)
    {
        // convert date and time to seconds
        $sec = strtotime($date);

        // convert seconds into a specific format
        $date = date("Y-m-d H:i", $sec);

        // append seconds to the date and time
        $date = $date . ":00";

        // print final date and time
        return $date;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($request)
    {
        $userData = $request->only(['task_id', 'start_date', 'end_date', 'priority','status','detail','created_by','roles']);

        $postData['task_id'] = $userData['task_id'];
        $postData['start_date'] = date("Y-m-d h:m:s", strtotime($userData['start_date']));
        $postData['end_date'] = date("Y-m-d h:m:s", strtotime($userData['end_date']));
        $postData['priority'] = $userData['priority'];
        $postData['status'] = $userData['status'];
        $postData['detail'] = $userData['detail'];
        $postData['created_by'] = $userData['created_by'];
        $task = $this->create($postData);

        $users = $request->roles;
        $users_merge = implode(',', $users);

        $notificationRepository = app()->make(NotificationRepository::class);
        $notification = $notificationRepository->saveRecord([
            'url'         => 'admin/tasks/' . $task->id,
            'ref_id'      => $users_merge,
            'message'     => 'You have assigned a new task',
            'action_type' => 'tasks'
        ]);

        return $task;
    }

    /**
     * @param $request
     * @param $task
     * @return mixed
     */
    public function updateRecord($request, $task)
    {
            $userData = $request->only(['task_id','start_date', 'end_date', 'priority','status','detail','created_by']);
            $postData['task_id'] = $userData['task_id'];
            $postData['start_date'] = date("Y-m-d h:m:s", strtotime($userData['start_date']));
            $postData['end_date'] = date("Y-m-d h:m:s", strtotime($userData['end_date']));
            $postData['priority'] = $userData['priority'];
            $postData['status'] = $userData['status'];
            $postData['detail'] = $userData['detail'];
            $postData['created_by'] = $userData['created_by'];
            $task = $this->update($postData, $task->id);
            return $task;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        $task = $this->delete($id);
        return $task;
    }
}
