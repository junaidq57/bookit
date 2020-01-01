<?php

use App\Models\FacilitatorTrack;
use App\Repositories\Admin\FacilitatorTrackRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacilitatorTrackRepositoryTest extends TestCase
{
    use MakeFacilitatorTrackTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var FacilitatorTrackRepository
     */
    protected $facilitatorTrackRepo;

    public function setUp()
    {
        parent::setUp();
        $this->facilitatorTrackRepo = App::make(FacilitatorTrackRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateFacilitatorTrack()
    {
        $facilitatorTrack = $this->fakeFacilitatorTrackData();
        $createdFacilitatorTrack = $this->facilitatorTrackRepo->create($facilitatorTrack);
        $createdFacilitatorTrack = $createdFacilitatorTrack->toArray();
        $this->assertArrayHasKey('id', $createdFacilitatorTrack);
        $this->assertNotNull($createdFacilitatorTrack['id'], 'Created FacilitatorTrack must have id specified');
        $this->assertNotNull(FacilitatorTrack::find($createdFacilitatorTrack['id']), 'FacilitatorTrack with given id must be in DB');
        $this->assertModelData($facilitatorTrack, $createdFacilitatorTrack);
    }

    /**
     * @test read
     */
    public function testReadFacilitatorTrack()
    {
        $facilitatorTrack = $this->makeFacilitatorTrack();
        $dbFacilitatorTrack = $this->facilitatorTrackRepo->find($facilitatorTrack->id);
        $dbFacilitatorTrack = $dbFacilitatorTrack->toArray();
        $this->assertModelData($facilitatorTrack->toArray(), $dbFacilitatorTrack);
    }

    /**
     * @test update
     */
    public function testUpdateFacilitatorTrack()
    {
        $facilitatorTrack = $this->makeFacilitatorTrack();
        $fakeFacilitatorTrack = $this->fakeFacilitatorTrackData();
        $updatedFacilitatorTrack = $this->facilitatorTrackRepo->update($fakeFacilitatorTrack, $facilitatorTrack->id);
        $this->assertModelData($fakeFacilitatorTrack, $updatedFacilitatorTrack->toArray());
        $dbFacilitatorTrack = $this->facilitatorTrackRepo->find($facilitatorTrack->id);
        $this->assertModelData($fakeFacilitatorTrack, $dbFacilitatorTrack->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteFacilitatorTrack()
    {
        $facilitatorTrack = $this->makeFacilitatorTrack();
        $resp = $this->facilitatorTrackRepo->delete($facilitatorTrack->id);
        $this->assertTrue($resp);
        $this->assertNull(FacilitatorTrack::find($facilitatorTrack->id), 'FacilitatorTrack should not exist in DB');
    }
}
