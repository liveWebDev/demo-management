<?php

use Faker\Factory as Faker;
use App\Models\Transport;
use App\Repositories\TransportRepository;

trait MakeTransportTrait
{
    /**
     * Create fake instance of Transport and save it in database
     *
     * @param array $transportFields
     * @return Transport
     */
    public function makeTransport($transportFields = [])
    {
        /** @var TransportRepository $transportRepo */
        $transportRepo = App::make(TransportRepository::class);
        $theme = $this->fakeTransportData($transportFields);
        return $transportRepo->create($theme);
    }

    /**
     * Get fake instance of Transport
     *
     * @param array $transportFields
     * @return Transport
     */
    public function fakeTransport($transportFields = [])
    {
        return new Transport($this->fakeTransportData($transportFields));
    }

    /**
     * Get fake data of Transport
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTransportData($transportFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'fahrzeughalter' => $fake->word,
            'lkw_nr' => $fake->word,
            'fahrer' => $fake->word,
            'container' => $fake->word,
            'plomben_nr' => $fake->word,
            'adr' => $fake->word,
            'luftfracht' => $fake->word,
            'rampe' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $transportFields);
    }
}
