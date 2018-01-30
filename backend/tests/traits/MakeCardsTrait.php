<?php

use Faker\Factory as Faker;
use App\Models\Cards;
use App\Repositories\CardsRepository;

trait MakeCardsTrait
{
    /**
     * Create fake instance of Cards and save it in database
     *
     * @param array $cardsFields
     * @return Cards
     */
    public function makeCards($cardsFields = [])
    {
        /** @var CardsRepository $cardsRepo */
        $cardsRepo = App::make(CardsRepository::class);
        $theme = $this->fakeCardsData($cardsFields);
        return $cardsRepo->create($theme);
    }

    /**
     * Get fake instance of Cards
     *
     * @param array $cardsFields
     * @return Cards
     */
    public function fakeCards($cardsFields = [])
    {
        return new Cards($this->fakeCardsData($cardsFields));
    }

    /**
     * Get fake data of Cards
     *
     * @param array $postFields
     * @return array
     */
    public function fakeCardsData($cardsFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'type' => $fake->word,
            'name' => $fake->text,
            'number' => $fake->word,
            'cvv' => $fake->randomDigitNotNull,
            'expire' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $cardsFields);
    }
}
