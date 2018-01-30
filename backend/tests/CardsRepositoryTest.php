<?php

use App\Models\Cards;
use App\Repositories\CardsRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CardsRepositoryTest extends TestCase
{
    use MakeCardsTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var CardsRepository
     */
    protected $cardsRepo;

    public function setUp()
    {
        parent::setUp();
        $this->cardsRepo = App::make(CardsRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateCards()
    {
        $cards = $this->fakeCardsData();
        $createdCards = $this->cardsRepo->create($cards);
        $createdCards = $createdCards->toArray();
        $this->assertArrayHasKey('id', $createdCards);
        $this->assertNotNull($createdCards['id'], 'Created Cards must have id specified');
        $this->assertNotNull(Cards::find($createdCards['id']), 'Cards with given id must be in DB');
        $this->assertModelData($cards, $createdCards);
    }

    /**
     * @test read
     */
    public function testReadCards()
    {
        $cards = $this->makeCards();
        $dbCards = $this->cardsRepo->find($cards->id);
        $dbCards = $dbCards->toArray();
        $this->assertModelData($cards->toArray(), $dbCards);
    }

    /**
     * @test update
     */
    public function testUpdateCards()
    {
        $cards = $this->makeCards();
        $fakeCards = $this->fakeCardsData();
        $updatedCards = $this->cardsRepo->update($fakeCards, $cards->id);
        $this->assertModelData($fakeCards, $updatedCards->toArray());
        $dbCards = $this->cardsRepo->find($cards->id);
        $this->assertModelData($fakeCards, $dbCards->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteCards()
    {
        $cards = $this->makeCards();
        $resp = $this->cardsRepo->delete($cards->id);
        $this->assertTrue($resp);
        $this->assertNull(Cards::find($cards->id), 'Cards should not exist in DB');
    }
}
