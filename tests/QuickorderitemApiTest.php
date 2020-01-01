<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuickorderitemApiTest extends TestCase
{
    use MakeQuickorderitemTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateQuickorderitem()
    {
        $quickorderitem = $this->fakeQuickorderitemData();
        $this->json('POST', '/api/v1/quickorderitems', $quickorderitem);

        $this->assertApiResponse($quickorderitem);
    }

    /**
     * @test
     */
    public function testReadQuickorderitem()
    {
        $quickorderitem = $this->makeQuickorderitem();
        $this->json('GET', '/api/v1/quickorderitems/'.$quickorderitem->id);

        $this->assertApiResponse($quickorderitem->toArray());
    }

    /**
     * @test
     */
    public function testUpdateQuickorderitem()
    {
        $quickorderitem = $this->makeQuickorderitem();
        $editedQuickorderitem = $this->fakeQuickorderitemData();

        $this->json('PUT', '/api/v1/quickorderitems/'.$quickorderitem->id, $editedQuickorderitem);

        $this->assertApiResponse($editedQuickorderitem);
    }

    /**
     * @test
     */
    public function testDeleteQuickorderitem()
    {
        $quickorderitem = $this->makeQuickorderitem();
        $this->json('DELETE', '/api/v1/quickorderitems/'.$quickorderitem->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/quickorderitems/'.$quickorderitem->id);

        $this->assertResponseStatus(404);
    }
}
