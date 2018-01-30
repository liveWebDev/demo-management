<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model {
  
  public $table = 'country';
  
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  
  
  public $fillable = [
    'country_code',
    'country_name',
    'latitude',
    'longitude',
  ];
  
  
  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'country_code' => 'string',
    'country_name' => 'string',
    'latitude' => 'string',
    'longitude' => 'string'
  ];
  
  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
  
  ];
}
