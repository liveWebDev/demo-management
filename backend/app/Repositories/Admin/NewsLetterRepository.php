<?php

namespace App\Repositories\Admin;

use App\Models\NewsLetter;
use InfyOm\Generator\Common\BaseRepository;

class NewsLetterRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'email'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NewsLetter::class;
    }
}
