<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
  public $table = 'settings';
  
  public $date;
  
  const CREATED_AT = 'created_at';
  const UPDATED_AT = 'updated_at';
  
  /**
   * @var array
   */
  public $fillable = [
    'user_id',
    'setting_key',
    'setting_value'
  ];
  
  public static $rules = [
    'user_id' => 'required|max:255',
    'setting_key' => 'required|max:255',
    'setting_value' => 'required'
  ];
  
  /**
   * @return \Illuminate\Database\Eloquent\Relations\belongsTo
   */
  public function users()
  {
    return $this->belongsTo('App\Models\User');
  }
  
}
