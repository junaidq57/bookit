<?php

use App\Models\TaskComment;
use App\Repositories\Admin\TaskCommentRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TaskCommentRepositoryTest extends TestCase
{
    use MakeTaskCommentTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TaskCommentRepository
     */
    protected $taskCommentRepo;

    public function setUp()
    {
        parent::setUp();
        $this->taskCommentRepo = App::make(TaskCommentRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTaskComment()
    {
        $taskComment = $this->fakeTaskCommentData();
        $createdTaskComment = $this->taskCommentRepo->create($taskComment);
        $createdTaskComment = $createdTaskComment->toArray();
        $this->assertArrayHasKey('id', $createdTaskComment);
        $this->assertNotNull($createdTaskComment['id'], 'Created TaskComment must have id specified');
        $this->assertNotNull(TaskComment::find($createdTaskComment['id']), 'TaskComment with given id must be in DB');
        $this->assertModelData($taskComment, $createdTaskComment);
    }

    /**
     * @test read
     */
    public function testReadTaskComment()
    {
        $taskComment = $this->makeTaskComment();
        $dbTaskComment = $this->taskCommentRepo->find($taskComment->id);
        $dbTaskComment = $dbTaskComment->toArray();
        $this->assertModelData($taskComment->toArray(), $dbTaskComment);
    }

    /**
     * @test update
     */
    public function testUpdateTaskComment()
    {
        $taskComment = $this->makeTaskComment();
        $fakeTaskComment = $this->fakeTaskCommentData();
        $updatedTaskComment = $this->taskCommentRepo->update($fakeTaskComment, $taskComment->id);
        $this->assertModelData($fakeTaskComment, $updatedTaskComment->toArray());
        $dbTaskComment = $this->taskCommentRepo->find($taskComment->id);
        $this->assertModelData($fakeTaskComment, $dbTaskComment->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTaskComment()
    {
        $taskComment = $this->makeTaskComment();
        $resp = $this->taskCommentRepo->delete($taskComment->id);
        $this->assertTrue($resp);
        $this->assertNull(TaskComment::find($taskComment->id), 'TaskComment should not exist in DB');
    }
}
