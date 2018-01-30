<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shipment extends Model
{
    
    public $table = 'shipments';
    
    
    public $fillable = [
        'transport_id',
        'shipment_id'
    ];
    
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'transport_id' => 'string',
        'shipment_id' => 'string'
    ];
    
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'transport_id' => 'required',
        'shipment_id' => 'required'
    ];
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function transport(){
        return $this->belongsTo('App\Models\Transport');
    }
    
}
