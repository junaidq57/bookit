<?php

namespace App\Repositories\Admin;

use App\Models\TaskComment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TaskCommentRepository
 * @package App\Repositories\Admin
 * @version February 26, 2019, 8:22 pm UTC
 *
 * @method TaskComment findWithoutFail($id, $columns = ['*'])
 * @method TaskComment find($id, $columns = ['*'])
 * @method TaskComment first($columns = ['*'])
*/
class TaskCommentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'task_id',
        'user_id',
        'carried_out',
        'quantity',
        'comment'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TaskComment::class;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($request)
    {

            if(isset($request['rating'])){
                $data['rating'] = $request['rating'];
                $data['status'] = 1;
                $taskComment = $this->update($data, $request['comment_id']);

            }else{
                $data['task_id'] = $request['task_id'];
                $data['user_id'] = $request['user_id'];
                $data['carried_out'] = $request['carried_out'];
                $data['quantity'] = isset($request['quantity']) ? $request['quantity']: 1;
                $data['comment'] = $request['comment'];
                $taskComment = $this->create($data);
            }

        return $taskComment;
    }

    /**
     * @param $request
     * @param $taskComment
     * @return mixed
     */
    public function updateRecord($request, $taskComment)
    {
        $input = $request->all();
        $taskComment = $this->update($input, $taskComment->id);
        return $taskComment;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        $taskComment = $this->delete($id);
        return $taskComment;
    }
}
