<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MakeApiTest extends TestCase
{
    use MakeMakeTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateMake()
    {
        $make = $this->fakeMakeData();
        $this->json('POST', '/api/v1/makes', $make);

        $this->assertApiResponse($make);
    }

    /**
     * @test
     */
    public function testReadMake()
    {
        $make = $this->makeMake();
        $this->json('GET', '/api/v1/makes/'.$make->id);

        $this->assertApiResponse($make->toArray());
    }

    /**
     * @test
     */
    public function testUpdateMake()
    {
        $make = $this->makeMake();
        $editedMake = $this->fakeMakeData();

        $this->json('PUT', '/api/v1/makes/'.$make->id, $editedMake);

        $this->assertApiResponse($editedMake);
    }

    /**
     * @test
     */
    public function testDeleteMake()
    {
        $make = $this->makeMake();
        $this->json('DELETE', '/api/v1/makes/'.$make->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/makes/'.$make->id);

        $this->assertResponseStatus(404);
    }
}
