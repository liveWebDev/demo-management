<?php

use Faker\Factory as Faker;
use App\Models\Make;
use App\Repositories\MakeRepository;

trait MakeMakeTrait
{
    /**
     * Create fake instance of Make and save it in database
     *
     * @param array $makeFields
     * @return Make
     */
    public function makeMake($makeFields = [])
    {
        /** @var MakeRepository $makeRepo */
        $makeRepo = App::make(MakeRepository::class);
        $theme = $this->fakeMakeData($makeFields);
        return $makeRepo->create($theme);
    }

    /**
     * Get fake instance of Make
     *
     * @param array $makeFields
     * @return Make
     */
    public function fakeMake($makeFields = [])
    {
        return new Make($this->fakeMakeData($makeFields));
    }

    /**
     * Get fake data of Make
     *
     * @param array $postFields
     * @return array
     */
    public function fakeMakeData($makeFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $makeFields);
    }
}
