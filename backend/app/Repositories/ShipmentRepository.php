<?php

namespace App\Repositories;

use App\Models\Shipment;
use InfyOm\Generator\Common\BaseRepository;

class ShipmentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'transport_id',
        'shipment_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Shipment::class;
    }
}
