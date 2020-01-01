<?php

use App\Models\Facilitator;
use App\Repositories\Admin\FacilitatorRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacilitatorRepositoryTest extends TestCase
{
    use MakeFacilitatorTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FacilitatorRepository
     */
    protected $facilitatorRepo;

    public function setUp()
    {
        parent::setUp();
        $this->facilitatorRepo = App::make(FacilitatorRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFacilitator()
    {
        $facilitator = $this->fakeFacilitatorData();
        $createdFacilitator = $this->facilitatorRepo->create($facilitator);
        $createdFacilitator = $createdFacilitator->toArray();
        $this->assertArrayHasKey('id', $createdFacilitator);
        $this->assertNotNull($createdFacilitator['id'], 'Created Facilitator must have id specified');
        $this->assertNotNull(Facilitator::find($createdFacilitator['id']), 'Facilitator with given id must be in DB');
        $this->assertModelData($facilitator, $createdFacilitator);
    }

    /**
     * @test read
     */
    public function testReadFacilitator()
    {
        $facilitator = $this->makeFacilitator();
        $dbFacilitator = $this->facilitatorRepo->find($facilitator->id);
        $dbFacilitator = $dbFacilitator->toArray();
        $this->assertModelData($facilitator->toArray(), $dbFacilitator);
    }

    /**
     * @test update
     */
    public function testUpdateFacilitator()
    {
        $facilitator = $this->makeFacilitator();
        $fakeFacilitator = $this->fakeFacilitatorData();
        $updatedFacilitator = $this->facilitatorRepo->update($fakeFacilitator, $facilitator->id);
        $this->assertModelData($fakeFacilitator, $updatedFacilitator->toArray());
        $dbFacilitator = $this->facilitatorRepo->find($facilitator->id);
        $this->assertModelData($fakeFacilitator, $dbFacilitator->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFacilitator()
    {
        $facilitator = $this->makeFacilitator();
        $resp = $this->facilitatorRepo->delete($facilitator->id);
        $this->assertTrue($resp);
        $this->assertNull(Facilitator::find($facilitator->id), 'Facilitator should not exist in DB');
    }
}
