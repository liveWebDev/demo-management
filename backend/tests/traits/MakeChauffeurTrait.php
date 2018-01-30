<?php

use Faker\Factory as Faker;
use App\Models\Admin\Chauffeur;
use App\Repositories\Admin\ChauffeurRepository;

trait MakeChauffeurTrait
{
    /**
     * Create fake instance of Chauffeur and save it in database
     *
     * @param array $chauffeurFields
     * @return Chauffeur
     */
    public function makeChauffeur($chauffeurFields = [])
    {
        /** @var ChauffeurRepository $chauffeurRepo */
        $chauffeurRepo = App::make(ChauffeurRepository::class);
        $theme = $this->fakeChauffeurData($chauffeurFields);
        return $chauffeurRepo->create($theme);
    }

    /**
     * Get fake instance of Chauffeur
     *
     * @param array $chauffeurFields
     * @return Chauffeur
     */
    public function fakeChauffeur($chauffeurFields = [])
    {
        return new Chauffeur($this->fakeChauffeurData($chauffeurFields));
    }

    /**
     * Get fake data of Chauffeur
     *
     * @param array $postFields
     * @return array
     */
    public function fakeChauffeurData($chauffeurFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'user_id' => $fake->randomDigitNotNull,
            'name_on_license' => $fake->word,
            'driver_license_number' => $fake->word,
            'national_insurance_number' => $fake->word,
            'postcode_on_license' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $chauffeurFields);
    }
}
