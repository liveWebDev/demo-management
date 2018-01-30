<?php

namespace App\Repositories;

use App\Models\Transport;
use InfyOm\Generator\Common\BaseRepository;

class TransportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fahrzeughalter',
        'destination',
        'lkw_nr',
        'fahrer',
        'container',
        'plomben_nr',
        'ankunft',
        'abfahrt',
        'adr',
        'luftfracht',
        'rampe'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Transport::class;
    }
}
