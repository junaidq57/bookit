<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskCategoryApiTest extends TestCase
{
    use MakeTaskCategoryTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTaskCategory()
    {
        $taskCategory = $this->fakeTaskCategoryData();
        $this->json('POST', '/api/v1/taskCategories', $taskCategory);

        $this->assertApiResponse($taskCategory);
    }

    /**
     * @test
     */
    public function testReadTaskCategory()
    {
        $taskCategory = $this->makeTaskCategory();
        $this->json('GET', '/api/v1/taskCategories/'.$taskCategory->id);

        $this->assertApiResponse($taskCategory->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTaskCategory()
    {
        $taskCategory = $this->makeTaskCategory();
        $editedTaskCategory = $this->fakeTaskCategoryData();

        $this->json('PUT', '/api/v1/taskCategories/'.$taskCategory->id, $editedTaskCategory);

        $this->assertApiResponse($editedTaskCategory);
    }

    /**
     * @test
     */
    public function testDeleteTaskCategory()
    {
        $taskCategory = $this->makeTaskCategory();
        $this->json('DELETE', '/api/v1/taskCategories/'.$taskCategory->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/taskCategories/'.$taskCategory->id);

        $this->assertResponseStatus(404);
    }
}
