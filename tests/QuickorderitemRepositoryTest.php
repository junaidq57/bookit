<?php

use App\Models\Quickorderitem;
use App\Repositories\Admin\QuickorderitemRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuickorderitemRepositoryTest extends TestCase
{
    use MakeQuickorderitemTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var QuickorderitemRepository
     */
    protected $quickorderitemRepo;

    public function setUp()
    {
        parent::setUp();
        $this->quickorderitemRepo = App::make(QuickorderitemRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateQuickorderitem()
    {
        $quickorderitem = $this->fakeQuickorderitemData();
        $createdQuickorderitem = $this->quickorderitemRepo->create($quickorderitem);
        $createdQuickorderitem = $createdQuickorderitem->toArray();
        $this->assertArrayHasKey('id', $createdQuickorderitem);
        $this->assertNotNull($createdQuickorderitem['id'], 'Created Quickorderitem must have id specified');
        $this->assertNotNull(Quickorderitem::find($createdQuickorderitem['id']), 'Quickorderitem with given id must be in DB');
        $this->assertModelData($quickorderitem, $createdQuickorderitem);
    }

    /**
     * @test read
     */
    public function testReadQuickorderitem()
    {
        $quickorderitem = $this->makeQuickorderitem();
        $dbQuickorderitem = $this->quickorderitemRepo->find($quickorderitem->id);
        $dbQuickorderitem = $dbQuickorderitem->toArray();
        $this->assertModelData($quickorderitem->toArray(), $dbQuickorderitem);
    }

    /**
     * @test update
     */
    public function testUpdateQuickorderitem()
    {
        $quickorderitem = $this->makeQuickorderitem();
        $fakeQuickorderitem = $this->fakeQuickorderitemData();
        $updatedQuickorderitem = $this->quickorderitemRepo->update($fakeQuickorderitem, $quickorderitem->id);
        $this->assertModelData($fakeQuickorderitem, $updatedQuickorderitem->toArray());
        $dbQuickorderitem = $this->quickorderitemRepo->find($quickorderitem->id);
        $this->assertModelData($fakeQuickorderitem, $dbQuickorderitem->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteQuickorderitem()
    {
        $quickorderitem = $this->makeQuickorderitem();
        $resp = $this->quickorderitemRepo->delete($quickorderitem->id);
        $this->assertTrue($resp);
        $this->assertNull(Quickorderitem::find($quickorderitem->id), 'Quickorderitem should not exist in DB');
    }
}
