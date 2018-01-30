<?php

use Faker\Factory as Faker;
use App\Models\Model;
use App\Repositories\ModelRepository;

trait MakeModelTrait
{
    /**
     * Create fake instance of Model and save it in database
     *
     * @param array $modelFields
     * @return Model
     */
    public function makeModel($modelFields = [])
    {
        /** @var ModelRepository $modelRepo */
        $modelRepo = App::make(ModelRepository::class);
        $theme = $this->fakeModelData($modelFields);
        return $modelRepo->create($theme);
    }

    /**
     * Get fake instance of Model
     *
     * @param array $modelFields
     * @return Model
     */
    public function fakeModel($modelFields = [])
    {
        return new Model($this->fakeModelData($modelFields));
    }

    /**
     * Get fake data of Model
     *
     * @param array $postFields
     * @return array
     */
    public function fakeModelData($modelFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $modelFields);
    }
}
