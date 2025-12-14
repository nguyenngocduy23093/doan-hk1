<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property_Images extends Model
{
    public $timestamps = false;
    protected $primaryKey = "image_id";
    protected $table = "property_images";
    protected $fillable = [
        "property_id",
        "image",
    ];
}
