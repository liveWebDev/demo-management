<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChauffeurApiTest extends TestCase
{
    use MakeChauffeurTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateChauffeur()
    {
        $chauffeur = $this->fakeChauffeurData();
        $this->json('POST', '/api/v1/chauffeurs', $chauffeur);

        $this->assertApiResponse($chauffeur);
    }

    /**
     * @test
     */
    public function testReadChauffeur()
    {
        $chauffeur = $this->makeChauffeur();
        $this->json('GET', '/api/v1/chauffeurs/'.$chauffeur->id);

        $this->assertApiResponse($chauffeur->toArray());
    }

    /**
     * @test
     */
    public function testUpdateChauffeur()
    {
        $chauffeur = $this->makeChauffeur();
        $editedChauffeur = $this->fakeChauffeurData();

        $this->json('PUT', '/api/v1/chauffeurs/'.$chauffeur->id, $editedChauffeur);

        $this->assertApiResponse($editedChauffeur);
    }

    /**
     * @test
     */
    public function testDeleteChauffeur()
    {
        $chauffeur = $this->makeChauffeur();
        $this->json('DELETE', '/api/v1/chauffeurs/'.$chauffeur->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/chauffeurs/'.$chauffeur->id);

        $this->assertResponseStatus(404);
    }
}
