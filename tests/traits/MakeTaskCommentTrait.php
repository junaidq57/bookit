<?php

use Faker\Factory as Faker;
use App\Models\TaskComment;
use App\Repositories\Admin\TaskCommentRepository;

trait MakeTaskCommentTrait
{
    /**
     * Create fake instance of TaskComment and save it in database
     *
     * @param array $taskCommentFields
     * @return TaskComment
     */
    public function makeTaskComment($taskCommentFields = [])
    {
        /** @var TaskCommentRepository $taskCommentRepo */
        $taskCommentRepo = App::make(TaskCommentRepository::class);
        $theme = $this->fakeTaskCommentData($taskCommentFields);
        return $taskCommentRepo->create($theme);
    }

    /**
     * Get fake instance of TaskComment
     *
     * @param array $taskCommentFields
     * @return TaskComment
     */
    public function fakeTaskComment($taskCommentFields = [])
    {
        return new TaskComment($this->fakeTaskCommentData($taskCommentFields));
    }

    /**
     * Get fake data of TaskComment
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTaskCommentData($taskCommentFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'task_id' => $fake->word,
            'user_id' => $fake->word,
            'carried_out' => $fake->word,
            'quantity' => $fake->word,
            'comment' => $fake->text,
            'created_at' => $fake->date('Y-m-d H:i:s'),
            'updated_at' => $fake->date('Y-m-d H:i:s'),
            'deleted_at' => $fake->date('Y-m-d H:i:s')
        ], $taskCommentFields);
    }
}
