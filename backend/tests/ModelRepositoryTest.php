<?php

use App\Models\Model;
use App\Repositories\ModelRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelRepositoryTest extends TestCase
{
    use MakeModelTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ModelRepository
     */
    protected $modelRepo;

    public function setUp()
    {
        parent::setUp();
        $this->modelRepo = App::make(ModelRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateModel()
    {
        $model = $this->fakeModelData();
        $createdModel = $this->modelRepo->create($model);
        $createdModel = $createdModel->toArray();
        $this->assertArrayHasKey('id', $createdModel);
        $this->assertNotNull($createdModel['id'], 'Created Model must have id specified');
        $this->assertNotNull(Model::find($createdModel['id']), 'Model with given id must be in DB');
        $this->assertModelData($model, $createdModel);
    }

    /**
     * @test read
     */
    public function testReadModel()
    {
        $model = $this->makeModel();
        $dbModel = $this->modelRepo->find($model->id);
        $dbModel = $dbModel->toArray();
        $this->assertModelData($model->toArray(), $dbModel);
    }

    /**
     * @test update
     */
    public function testUpdateModel()
    {
        $model = $this->makeModel();
        $fakeModel = $this->fakeModelData();
        $updatedModel = $this->modelRepo->update($fakeModel, $model->id);
        $this->assertModelData($fakeModel, $updatedModel->toArray());
        $dbModel = $this->modelRepo->find($model->id);
        $this->assertModelData($fakeModel, $dbModel->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteModel()
    {
        $model = $this->makeModel();
        $resp = $this->modelRepo->delete($model->id);
        $this->assertTrue($resp);
        $this->assertNull(Model::find($model->id), 'Model should not exist in DB');
    }
}
