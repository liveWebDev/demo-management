<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public $table = 'images';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_type', 'image_id', 'image', 'default'
    ];

    /**
     * Get all of the owning image models.
     */
    public function image()
    {
        return $this->morphTo();
    }
    
    public static function setDefault($id, $imageId)
    {
      Self::where('image_id', '=', $imageId)->update(array('default' => 0));
      $affected = Self::where('id', '=', $id)->update(array('default' => 1));
      return $affected;
    }
}
