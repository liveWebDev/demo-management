<?php

use App\Models\Chauffeur;
use App\Repositories\ChauffeurRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ChauffeurRepositoryTest extends TestCase
{
    use MakeChauffeurTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ChauffeurRepository
     */
    protected $chauffeurRepo;

    public function setUp()
    {
        parent::setUp();
        $this->chauffeurRepo = App::make(ChauffeurRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateChauffeur()
    {
        $chauffeur = $this->fakeChauffeurData();
        $createdChauffeur = $this->chauffeurRepo->create($chauffeur);
        $createdChauffeur = $createdChauffeur->toArray();
        $this->assertArrayHasKey('id', $createdChauffeur);
        $this->assertNotNull($createdChauffeur['id'], 'Created Chauffeur must have id specified');
        $this->assertNotNull(Chauffeur::find($createdChauffeur['id']), 'Chauffeur with given id must be in DB');
        $this->assertModelData($chauffeur, $createdChauffeur);
    }

    /**
     * @test read
     */
    public function testReadChauffeur()
    {
        $chauffeur = $this->makeChauffeur();
        $dbChauffeur = $this->chauffeurRepo->find($chauffeur->id);
        $dbChauffeur = $dbChauffeur->toArray();
        $this->assertModelData($chauffeur->toArray(), $dbChauffeur);
    }

    /**
     * @test update
     */
    public function testUpdateChauffeur()
    {
        $chauffeur = $this->makeChauffeur();
        $fakeChauffeur = $this->fakeChauffeurData();
        $updatedChauffeur = $this->chauffeurRepo->update($fakeChauffeur, $chauffeur->id);
        $this->assertModelData($fakeChauffeur, $updatedChauffeur->toArray());
        $dbChauffeur = $this->chauffeurRepo->find($chauffeur->id);
        $this->assertModelData($fakeChauffeur, $dbChauffeur->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteChauffeur()
    {
        $chauffeur = $this->makeChauffeur();
        $resp = $this->chauffeurRepo->delete($chauffeur->id);
        $this->assertTrue($resp);
        $this->assertNull(Chauffeur::find($chauffeur->id), 'Chauffeur should not exist in DB');
    }
}
