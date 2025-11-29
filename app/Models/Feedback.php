<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    public $timestamps = false;
    protected $primaryKey = "feedback_id";
    protected $table = "feedback";
    protected $fillable = [
        "rating",
        "message",
        "created_at",
        "unread",
    ];
}
