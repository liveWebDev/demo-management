<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CardsApiTest extends TestCase
{
    use MakeCardsTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateCards()
    {
        $cards = $this->fakeCardsData();
        $this->json('POST', '/api/v1/cards', $cards);

        $this->assertApiResponse($cards);
    }

    /**
     * @test
     */
    public function testReadCards()
    {
        $cards = $this->makeCards();
        $this->json('GET', '/api/v1/cards/'.$cards->id);

        $this->assertApiResponse($cards->toArray());
    }

    /**
     * @test
     */
    public function testUpdateCards()
    {
        $cards = $this->makeCards();
        $editedCards = $this->fakeCardsData();

        $this->json('PUT', '/api/v1/cards/'.$cards->id, $editedCards);

        $this->assertApiResponse($editedCards);
    }

    /**
     * @test
     */
    public function testDeleteCards()
    {
        $cards = $this->makeCards();
        $this->json('DELETE', '/api/v1/cards/'.$cards->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/cards/'.$cards->id);

        $this->assertResponseStatus(404);
    }
}
