<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;

    protected $table = 'feedback';
    protected $primaryKey = 'feedback_id';
    public $timestamps = false;

    protected $fillable = [
        'rating',
        'message',
        'created_at',
        'unread'
    ];
}
