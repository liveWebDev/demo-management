<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TransportApiTest extends TestCase
{
    use MakeTransportTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTransport()
    {
        $transport = $this->fakeTransportData();
        $this->json('POST', '/api/v1/transports', $transport);

        $this->assertApiResponse($transport);
    }

    /**
     * @test
     */
    public function testReadTransport()
    {
        $transport = $this->makeTransport();
        $this->json('GET', '/api/v1/transports/'.$transport->id);

        $this->assertApiResponse($transport->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTransport()
    {
        $transport = $this->makeTransport();
        $editedTransport = $this->fakeTransportData();

        $this->json('PUT', '/api/v1/transports/'.$transport->id, $editedTransport);

        $this->assertApiResponse($editedTransport);
    }

    /**
     * @test
     */
    public function testDeleteTransport()
    {
        $transport = $this->makeTransport();
        $this->json('DELETE', '/api/v1/transports/'.$transport->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/transports/'.$transport->id);

        $this->assertResponseStatus(404);
    }
}
