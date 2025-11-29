<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiries extends Model
{
    public $timestamps = false;
    protected $primaryKey = "inquiry_id";
    protected $table = "inquiries";
    protected $fillable = [
        "property_id",
        "name",
        "email",
        "title",
        "message",
        "created_at",
    ];
}
