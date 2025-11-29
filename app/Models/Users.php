<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    public $timestamps = false;
    protected $primaryKey = "user_id";
    protected $table = "users";
    protected $fillable = [
        "name",
        "email",
        "password",
        "avatar",
        "role",
        "created_at",
        "updated_at",
    ];
}
