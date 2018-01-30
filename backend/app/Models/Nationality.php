<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nationality extends Model {
  
  use SoftDeletes;
  
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  
  
  protected $dates = ['deleted_at'];
  
	public $table = 'nationality';
	
  public $fillable = [
    'nationality'
  ];
  
  /**
   * The attributes that should be casted to native types.
   *
   * @var array
   */
  protected $casts = [
    'id' => 'integer',
    'nationality' => 'string'
  ];
  
  /**
   * Validation rules
   *
   * @var array
   */
  public static $rules = [
  
  ];
}