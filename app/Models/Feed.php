<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;

class Feed extends Model
{
    use HasFactory;
    protected $fillable = [
        'content',
        "user_id",
        'status',
    ];
    public function comments()
    {
    	return $this->morphMany(Comment::class, 'commentable');
    }
}
