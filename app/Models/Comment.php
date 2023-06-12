<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "parent_id",
        "comment",
        "commentable_type",
        "commentable_id",
        "status",
    ];
    public function commentable()
    {
        return $this->morphTo();
    }
}
