<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Properties extends Model
{
    public $timestamps = false;
    protected $primaryKey = "property_id";
    protected $table = "properties";
    protected $fillable = [
        "title",
        "price",
        "image_main_url",
        "location",
        "description",
        "type",
        "category",
        "bedrooms",
        "bathrooms",
        "area",
        "furnishing",
        "amenities",
        "gps"
    ];
    
    // Relationship: Property has many PropertyImages
    public function images()
    {
        return $this->hasMany(PropertyImage::class, 'property_id', 'property_id');
    }
}
