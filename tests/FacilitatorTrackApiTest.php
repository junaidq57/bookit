<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacilitatorTrackApiTest extends TestCase
{
    use MakeFacilitatorTrackTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFacilitatorTrack()
    {
        $facilitatorTrack = $this->fakeFacilitatorTrackData();
        $this->json('POST', '/api/v1/facilitatorTracks', $facilitatorTrack);

        $this->assertApiResponse($facilitatorTrack);
    }

    /**
     * @test
     */
    public function testReadFacilitatorTrack()
    {
        $facilitatorTrack = $this->makeFacilitatorTrack();
        $this->json('GET', '/api/v1/facilitatorTracks/'.$facilitatorTrack->id);

        $this->assertApiResponse($facilitatorTrack->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFacilitatorTrack()
    {
        $facilitatorTrack = $this->makeFacilitatorTrack();
        $editedFacilitatorTrack = $this->fakeFacilitatorTrackData();

        $this->json('PUT', '/api/v1/facilitatorTracks/'.$facilitatorTrack->id, $editedFacilitatorTrack);

        $this->assertApiResponse($editedFacilitatorTrack);
    }

    /**
     * @test
     */
    public function testDeleteFacilitatorTrack()
    {
        $facilitatorTrack = $this->makeFacilitatorTrack();
        $this->json('DELETE', '/api/v1/facilitatorTracks/'.$facilitatorTrack->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/facilitatorTracks/'.$facilitatorTrack->id);

        $this->assertResponseStatus(404);
    }
}
