<?php

use App\Models\TaskCategory;
use App\Repositories\Admin\TaskCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskCategoryRepositoryTest extends TestCase
{
    use MakeTaskCategoryTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TaskCategoryRepository
     */
    protected $taskCategoryRepo;

    public function setUp()
    {
        parent::setUp();
        $this->taskCategoryRepo = App::make(TaskCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTaskCategory()
    {
        $taskCategory = $this->fakeTaskCategoryData();
        $createdTaskCategory = $this->taskCategoryRepo->create($taskCategory);
        $createdTaskCategory = $createdTaskCategory->toArray();
        $this->assertArrayHasKey('id', $createdTaskCategory);
        $this->assertNotNull($createdTaskCategory['id'], 'Created TaskCategory must have id specified');
        $this->assertNotNull(TaskCategory::find($createdTaskCategory['id']), 'TaskCategory with given id must be in DB');
        $this->assertModelData($taskCategory, $createdTaskCategory);
    }

    /**
     * @test read
     */
    public function testReadTaskCategory()
    {
        $taskCategory = $this->makeTaskCategory();
        $dbTaskCategory = $this->taskCategoryRepo->find($taskCategory->id);
        $dbTaskCategory = $dbTaskCategory->toArray();
        $this->assertModelData($taskCategory->toArray(), $dbTaskCategory);
    }

    /**
     * @test update
     */
    public function testUpdateTaskCategory()
    {
        $taskCategory = $this->makeTaskCategory();
        $fakeTaskCategory = $this->fakeTaskCategoryData();
        $updatedTaskCategory = $this->taskCategoryRepo->update($fakeTaskCategory, $taskCategory->id);
        $this->assertModelData($fakeTaskCategory, $updatedTaskCategory->toArray());
        $dbTaskCategory = $this->taskCategoryRepo->find($taskCategory->id);
        $this->assertModelData($fakeTaskCategory, $dbTaskCategory->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTaskCategory()
    {
        $taskCategory = $this->makeTaskCategory();
        $resp = $this->taskCategoryRepo->delete($taskCategory->id);
        $this->assertTrue($resp);
        $this->assertNull(TaskCategory::find($taskCategory->id), 'TaskCategory should not exist in DB');
    }
}
