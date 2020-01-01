<?php

namespace App\Repositories\Admin;

use App\Models\Task;
use App\Models\TaskCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TaskCategoryRepository
 * @package App\Repositories\Admin
 * @version February 17, 2019, 3:34 pm UTC
 *
 * @method TaskCategory findWithoutFail($id, $columns = ['*'])
 * @method TaskCategory find($id, $columns = ['*'])
 * @method TaskCategory first($columns = ['*'])
*/
class TaskCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TaskCategory::class;
    }

    /**
     * @param $request
     * @return mixed
     */
    public function saveRecord($request)
    {
        $userData = $request->only(['parent_task_id','title', 'earn_point','cash_value','roles']);
        $postData['parent_task_id'] = $userData['parent_task_id'];
        $postData['title'] = $userData['title'];
        $postData['roles'] = $userData['roles'][0];
        $postData['earn_point'] = (isset($userData['earn_point']) ? $userData['earn_point']:'');
        $postData['cash_value'] = (isset($userData['cash_value']) ? $userData['cash_value']:'');

        $taskCategory = $this->create($postData);
        return $taskCategory;
    }

    /**
     * @param $request
     * @param $taskCategory
     * @return mixed
     */
    public function updateRecord($request, $taskCategory)
    {
        $userData = $request->only(['parent_task_id','title', 'earn_point','cash_value','roles']);
//        dd($userData);
        $postData['parent_task_id'] = $userData['parent_task_id'];
        $postData['title'] = $userData['title'];
        $postData['roles'] = $userData['roles'][0];
        $postData['earn_point'] = (isset($userData['earn_point']) ? $userData['earn_point']:'');
        $postData['cash_value'] = (isset($userData['cash_value']) ? $userData['cash_value']:'');

//        dd($postData);

        $taskCategory = $this->update($postData, $taskCategory->id);
//        dd($taskCategory);
        return $taskCategory;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function deleteRecord($id)
    {
        $taskExist = Task::where('task_id', $id)->first();

        if(!empty($taskExist)){
            return 'error';
        }else{
            $this->delete($id);
            return 'success';
        }

    }
}
