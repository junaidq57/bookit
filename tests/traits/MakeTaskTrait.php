<?php

use Faker\Factory as Faker;
use App\Models\Task;
use App\Repositories\Admin\TaskRepository;

trait MakeTaskTrait
{
    /**
     * Create fake instance of Task and save it in database
     *
     * @param array $taskFields
     * @return Task
     */
    public function makeTask($taskFields = [])
    {
        /** @var TaskRepository $taskRepo */
        $taskRepo = App::make(TaskRepository::class);
        $theme = $this->fakeTaskData($taskFields);
        return $taskRepo->create($theme);
    }

    /**
     * Get fake instance of Task
     *
     * @param array $taskFields
     * @return Task
     */
    public function fakeTask($taskFields = [])
    {
        return new Task($this->fakeTaskData($taskFields));
    }

    /**
     * Get fake data of Task
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTaskData($taskFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'title' => $fake->word,
            'detail' => $fake->text,
            'priority' => $fake->word,
            'start_date' => $fake->date('Y-m-d H:i:s'),
            'end_date' => $fake->date('Y-m-d H:i:s'),
            'complete_date' => $fake->date('Y-m-d H:i:s'),
            'created_by' => $fake->word,
            'status' => $fake->word,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $taskFields);
    }
}
