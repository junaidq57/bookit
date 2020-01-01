<?php

use App\Models\Quickorder;
use App\Repositories\Admin\QuickorderRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuickorderRepositoryTest extends TestCase
{
    use MakeQuickorderTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuickorderRepository
     */
    protected $quickorderRepo;

    public function setUp()
    {
        parent::setUp();
        $this->quickorderRepo = App::make(QuickorderRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateQuickorder()
    {
        $quickorder = $this->fakeQuickorderData();
        $createdQuickorder = $this->quickorderRepo->create($quickorder);
        $createdQuickorder = $createdQuickorder->toArray();
        $this->assertArrayHasKey('id', $createdQuickorder);
        $this->assertNotNull($createdQuickorder['id'], 'Created Quickorder must have id specified');
        $this->assertNotNull(Quickorder::find($createdQuickorder['id']), 'Quickorder with given id must be in DB');
        $this->assertModelData($quickorder, $createdQuickorder);
    }

    /**
     * @test read
     */
    public function testReadQuickorder()
    {
        $quickorder = $this->makeQuickorder();
        $dbQuickorder = $this->quickorderRepo->find($quickorder->id);
        $dbQuickorder = $dbQuickorder->toArray();
        $this->assertModelData($quickorder->toArray(), $dbQuickorder);
    }

    /**
     * @test update
     */
    public function testUpdateQuickorder()
    {
        $quickorder = $this->makeQuickorder();
        $fakeQuickorder = $this->fakeQuickorderData();
        $updatedQuickorder = $this->quickorderRepo->update($fakeQuickorder, $quickorder->id);
        $this->assertModelData($fakeQuickorder, $updatedQuickorder->toArray());
        $dbQuickorder = $this->quickorderRepo->find($quickorder->id);
        $this->assertModelData($fakeQuickorder, $dbQuickorder->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteQuickorder()
    {
        $quickorder = $this->makeQuickorder();
        $resp = $this->quickorderRepo->delete($quickorder->id);
        $this->assertTrue($resp);
        $this->assertNull(Quickorder::find($quickorder->id), 'Quickorder should not exist in DB');
    }
}
