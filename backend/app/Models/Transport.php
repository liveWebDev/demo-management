<?php

namespace App\Models;

use Eloquent as Model;

/**
 * Class Transport
 * @package App\Models
 * @version June 10, 2017, 9:22 pm UTC
 */
class Transport extends Model
{

    public $table = 'transports';
    

    public $fillable = [
        'user_id',
        'forklift_id',
        'fahrzeughalter',
        'destination',
        'lkw_nr',
        'fahrer',
        'container',
        'plomben_nr',
        'adr',
        'ankunft',
        'abfahrt',
        'luftfracht',
        'rampe'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'fahrzeughalter' => 'string',
        'lkw_nr' => 'string',
        'fahrer' => 'string',
        'container' => 'string',
        'plomben_nr' => 'string',
        'adr' => 'string',
        'luftfracht' => 'string',
        'rampe' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'user_id' => 'required',
        'fahrzeughalter' => 'required',
        'destination' => 'required',
        'lkw_nr' => 'required',
        'fahrer' => 'required',
        'plomben_nr' => 'required',
        'adr' => 'required',
        'luftfracht' => 'required',
        'ankunft' => 'required',
        'rampe' => 'required'
    ];
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shipment(){
        return $this->hasMany('App\Models\Shipment', 'transport_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function forklift(){
        return $this->hasOne('App\Models\Forklift', 'transport_id');
    }
    
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->hasOne('App\Models\User');
    }
    
    
}
