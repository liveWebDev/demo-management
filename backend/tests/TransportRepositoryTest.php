<?php

use App\Models\Transport;
use App\Repositories\TransportRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransportRepositoryTest extends TestCase
{
    use MakeTransportTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TransportRepository
     */
    protected $transportRepo;

    public function setUp()
    {
        parent::setUp();
        $this->transportRepo = App::make(TransportRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTransport()
    {
        $transport = $this->fakeTransportData();
        $createdTransport = $this->transportRepo->create($transport);
        $createdTransport = $createdTransport->toArray();
        $this->assertArrayHasKey('id', $createdTransport);
        $this->assertNotNull($createdTransport['id'], 'Created Transport must have id specified');
        $this->assertNotNull(Transport::find($createdTransport['id']), 'Transport with given id must be in DB');
        $this->assertModelData($transport, $createdTransport);
    }

    /**
     * @test read
     */
    public function testReadTransport()
    {
        $transport = $this->makeTransport();
        $dbTransport = $this->transportRepo->find($transport->id);
        $dbTransport = $dbTransport->toArray();
        $this->assertModelData($transport->toArray(), $dbTransport);
    }

    /**
     * @test update
     */
    public function testUpdateTransport()
    {
        $transport = $this->makeTransport();
        $fakeTransport = $this->fakeTransportData();
        $updatedTransport = $this->transportRepo->update($fakeTransport, $transport->id);
        $this->assertModelData($fakeTransport, $updatedTransport->toArray());
        $dbTransport = $this->transportRepo->find($transport->id);
        $this->assertModelData($fakeTransport, $dbTransport->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTransport()
    {
        $transport = $this->makeTransport();
        $resp = $this->transportRepo->delete($transport->id);
        $this->assertTrue($resp);
        $this->assertNull(Transport::find($transport->id), 'Transport should not exist in DB');
    }
}
