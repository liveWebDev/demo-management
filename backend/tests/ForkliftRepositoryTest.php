<?php

use App\Models\Forklift;
use App\Repositories\ForkliftRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ForkliftRepositoryTest extends TestCase
{
    use MakeForkliftTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ForkliftRepository
     */
    protected $forkliftRepo;

    public function setUp()
    {
        parent::setUp();
        $this->forkliftRepo = App::make(ForkliftRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateForklift()
    {
        $forklift = $this->fakeForkliftData();
        $createdForklift = $this->forkliftRepo->create($forklift);
        $createdForklift = $createdForklift->toArray();
        $this->assertArrayHasKey('id', $createdForklift);
        $this->assertNotNull($createdForklift['id'], 'Created Forklift must have id specified');
        $this->assertNotNull(Forklift::find($createdForklift['id']), 'Forklift with given id must be in DB');
        $this->assertModelData($forklift, $createdForklift);
    }

    /**
     * @test read
     */
    public function testReadForklift()
    {
        $forklift = $this->makeForklift();
        $dbForklift = $this->forkliftRepo->find($forklift->id);
        $dbForklift = $dbForklift->toArray();
        $this->assertModelData($forklift->toArray(), $dbForklift);
    }

    /**
     * @test update
     */
    public function testUpdateForklift()
    {
        $forklift = $this->makeForklift();
        $fakeForklift = $this->fakeForkliftData();
        $updatedForklift = $this->forkliftRepo->update($fakeForklift, $forklift->id);
        $this->assertModelData($fakeForklift, $updatedForklift->toArray());
        $dbForklift = $this->forkliftRepo->find($forklift->id);
        $this->assertModelData($fakeForklift, $dbForklift->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteForklift()
    {
        $forklift = $this->makeForklift();
        $resp = $this->forkliftRepo->delete($forklift->id);
        $this->assertTrue($resp);
        $this->assertNull(Forklift::find($forklift->id), 'Forklift should not exist in DB');
    }
}
