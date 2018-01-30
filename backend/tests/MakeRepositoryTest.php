<?php

use App\Models\Make;
use App\Repositories\MakeRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class MakeRepositoryTest extends TestCase
{
    use MakeMakeTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var MakeRepository
     */
    protected $makeRepo;

    public function setUp()
    {
        parent::setUp();
        $this->makeRepo = App::make(MakeRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateMake()
    {
        $make = $this->fakeMakeData();
        $createdMake = $this->makeRepo->create($make);
        $createdMake = $createdMake->toArray();
        $this->assertArrayHasKey('id', $createdMake);
        $this->assertNotNull($createdMake['id'], 'Created Make must have id specified');
        $this->assertNotNull(Make::find($createdMake['id']), 'Make with given id must be in DB');
        $this->assertModelData($make, $createdMake);
    }

    /**
     * @test read
     */
    public function testReadMake()
    {
        $make = $this->makeMake();
        $dbMake = $this->makeRepo->find($make->id);
        $dbMake = $dbMake->toArray();
        $this->assertModelData($make->toArray(), $dbMake);
    }

    /**
     * @test update
     */
    public function testUpdateMake()
    {
        $make = $this->makeMake();
        $fakeMake = $this->fakeMakeData();
        $updatedMake = $this->makeRepo->update($fakeMake, $make->id);
        $this->assertModelData($fakeMake, $updatedMake->toArray());
        $dbMake = $this->makeRepo->find($make->id);
        $this->assertModelData($fakeMake, $dbMake->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteMake()
    {
        $make = $this->makeMake();
        $resp = $this->makeRepo->delete($make->id);
        $this->assertTrue($resp);
        $this->assertNull(Make::find($make->id), 'Make should not exist in DB');
    }
}
