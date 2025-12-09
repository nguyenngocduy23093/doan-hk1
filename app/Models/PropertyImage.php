<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PropertyImage extends Model
{
    protected $table = 'property_images';
    protected $primaryKey = 'image_id';
    public $timestamps = false;
    
    protected $fillable = [
        'property_id',
        'image'
    ];
    
    // Relationship: PropertyImage belongs to Property
    public function property()
    {
        return $this->belongsTo(Properties::class, 'property_id', 'property_id');
    }
}
