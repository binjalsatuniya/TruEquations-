<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Comment;
use App\Models\LikeAndReact;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'file_path',
        "user_id",
        'status',
    ];
    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');

    }
    public function reacts()
    {
         return $this->morphMany(LikeAndReact::class, 'reactable');
    }
}
