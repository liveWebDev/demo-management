<?php

namespace App\Repositories\Admin;

use App\Models\Pages;
use InfyOm\Generator\Common\BaseRepository;

class PagesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'username',
        'name',
        'email',
        'password',
        'remember_token',
        'type',
        'active',
        'insurance_number',
        'dvla_points',
        'living',
        'documents',
        'payment'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pages::class;
    }
}
