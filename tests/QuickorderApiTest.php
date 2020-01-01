<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QuickorderApiTest extends TestCase
{
    use MakeQuickorderTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateQuickorder()
    {
        $quickorder = $this->fakeQuickorderData();
        $this->json('POST', '/api/v1/quickorders', $quickorder);

        $this->assertApiResponse($quickorder);
    }

    /**
     * @test
     */
    public function testReadQuickorder()
    {
        $quickorder = $this->makeQuickorder();
        $this->json('GET', '/api/v1/quickorders/'.$quickorder->id);

        $this->assertApiResponse($quickorder->toArray());
    }

    /**
     * @test
     */
    public function testUpdateQuickorder()
    {
        $quickorder = $this->makeQuickorder();
        $editedQuickorder = $this->fakeQuickorderData();

        $this->json('PUT', '/api/v1/quickorders/'.$quickorder->id, $editedQuickorder);

        $this->assertApiResponse($editedQuickorder);
    }

    /**
     * @test
     */
    public function testDeleteQuickorder()
    {
        $quickorder = $this->makeQuickorder();
        $this->json('DELETE', '/api/v1/quickorders/'.$quickorder->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/quickorders/'.$quickorder->id);

        $this->assertResponseStatus(404);
    }
}
