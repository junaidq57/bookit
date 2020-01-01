<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class FacilitatorApiTest extends TestCase
{
    use MakeFacilitatorTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateFacilitator()
    {
        $facilitator = $this->fakeFacilitatorData();
        $this->json('POST', '/api/v1/facilitators', $facilitator);

        $this->assertApiResponse($facilitator);
    }

    /**
     * @test
     */
    public function testReadFacilitator()
    {
        $facilitator = $this->makeFacilitator();
        $this->json('GET', '/api/v1/facilitators/'.$facilitator->id);

        $this->assertApiResponse($facilitator->toArray());
    }

    /**
     * @test
     */
    public function testUpdateFacilitator()
    {
        $facilitator = $this->makeFacilitator();
        $editedFacilitator = $this->fakeFacilitatorData();

        $this->json('PUT', '/api/v1/facilitators/'.$facilitator->id, $editedFacilitator);

        $this->assertApiResponse($editedFacilitator);
    }

    /**
     * @test
     */
    public function testDeleteFacilitator()
    {
        $facilitator = $this->makeFacilitator();
        $this->json('DELETE', '/api/v1/facilitators/'.$facilitator->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/facilitators/'.$facilitator->id);

        $this->assertResponseStatus(404);
    }
}
