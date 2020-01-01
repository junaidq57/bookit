<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskCommentApiTest extends TestCase
{
    use MakeTaskCommentTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTaskComment()
    {
        $taskComment = $this->fakeTaskCommentData();
        $this->json('POST', '/api/v1/taskComments', $taskComment);

        $this->assertApiResponse($taskComment);
    }

    /**
     * @test
     */
    public function testReadTaskComment()
    {
        $taskComment = $this->makeTaskComment();
        $this->json('GET', '/api/v1/taskComments/'.$taskComment->id);

        $this->assertApiResponse($taskComment->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTaskComment()
    {
        $taskComment = $this->makeTaskComment();
        $editedTaskComment = $this->fakeTaskCommentData();

        $this->json('PUT', '/api/v1/taskComments/'.$taskComment->id, $editedTaskComment);

        $this->assertApiResponse($editedTaskComment);
    }

    /**
     * @test
     */
    public function testDeleteTaskComment()
    {
        $taskComment = $this->makeTaskComment();
        $this->json('DELETE', '/api/v1/taskComments/'.$taskComment->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/taskComments/'.$taskComment->id);

        $this->assertResponseStatus(404);
    }
}
