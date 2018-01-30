<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForkliftApiTest extends TestCase
{
    use MakeForkliftTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateForklift()
    {
        $forklift = $this->fakeForkliftData();
        $this->json('POST', '/api/v1/forklifts', $forklift);

        $this->assertApiResponse($forklift);
    }

    /**
     * @test
     */
    public function testReadForklift()
    {
        $forklift = $this->makeForklift();
        $this->json('GET', '/api/v1/forklifts/'.$forklift->id);

        $this->assertApiResponse($forklift->toArray());
    }

    /**
     * @test
     */
    public function testUpdateForklift()
    {
        $forklift = $this->makeForklift();
        $editedForklift = $this->fakeForkliftData();

        $this->json('PUT', '/api/v1/forklifts/'.$forklift->id, $editedForklift);

        $this->assertApiResponse($editedForklift);
    }

    /**
     * @test
     */
    public function testDeleteForklift()
    {
        $forklift = $this->makeForklift();
        $this->json('DELETE', '/api/v1/forklifts/'.$forklift->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/forklifts/'.$forklift->id);

        $this->assertResponseStatus(404);
    }
}
