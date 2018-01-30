<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelApiTest extends TestCase
{
    use MakeModelTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateModel()
    {
        $model = $this->fakeModelData();
        $this->json('POST', '/api/v1/models', $model);

        $this->assertApiResponse($model);
    }

    /**
     * @test
     */
    public function testReadModel()
    {
        $model = $this->makeModel();
        $this->json('GET', '/api/v1/models/'.$model->id);

        $this->assertApiResponse($model->toArray());
    }

    /**
     * @test
     */
    public function testUpdateModel()
    {
        $model = $this->makeModel();
        $editedModel = $this->fakeModelData();

        $this->json('PUT', '/api/v1/models/'.$model->id, $editedModel);

        $this->assertApiResponse($editedModel);
    }

    /**
     * @test
     */
    public function testDeleteModel()
    {
        $model = $this->makeModel();
        $this->json('DELETE', '/api/v1/models/'.$model->iidd);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/models/'.$model->id);

        $this->assertResponseStatus(404);
    }
}
