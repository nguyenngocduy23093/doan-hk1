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
        "main_image",
        "location",
        "type",
        "category",
        "bedrooms",
        "bathrooms",
        "area",
        "furnished",
        "amenities",
        "gps",
        "created_at",
    ];
    public function images()
{
    return $this->hasMany(PropertyImage::class, 'property_id', 'property_id');
}

}
?>
