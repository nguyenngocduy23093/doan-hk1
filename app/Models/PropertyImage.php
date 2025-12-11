<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $table = 'property_images';
    protected $primaryKey = 'image_id';

    protected $fillable = [
        'property_id',
        'image_data',
    ];

    public $timestamps = true;

    public function property()
    {
        return $this->belongsTo(Properties::class, 'property_id', 'property_id');
    }
}
