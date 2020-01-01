<?php

use Faker\Factory as Faker;
use App\Models\TaskCategory;
use App\Repositories\Admin\TaskCategoryRepository;

trait MakeTaskCategoryTrait
{
    /**
     * Create fake instance of TaskCategory and save it in database
     *
     * @param array $taskCategoryFields
     * @return TaskCategory
     */
    public function makeTaskCategory($taskCategoryFields = [])
    {
        /** @var TaskCategoryRepository $taskCategoryRepo */
        $taskCategoryRepo = App::make(TaskCategoryRepository::class);
        $theme = $this->fakeTaskCategoryData($taskCategoryFields);
        return $taskCategoryRepo->create($theme);
    }

    /**
     * Get fake instance of TaskCategory
     *
     * @param array $taskCategoryFields
     * @return TaskCategory
     */
    public function fakeTaskCategory($taskCategoryFields = [])
    {
        return new TaskCategory($this->fakeTaskCategoryData($taskCategoryFields));
    }

    /**
     * Get fake data of TaskCategory
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTaskCategoryData($taskCategoryFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'parent_task_id' => $fake->word,
            'title' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $taskCategoryFields);
    }
}
