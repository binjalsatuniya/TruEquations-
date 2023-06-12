<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeAndReact extends Model
{
    use HasFactory;
    protected $fillable = [
        "user_id",
        "type",
        "reactable_type",
        "reactable_id",
        "status",
    ];

    public function reactable()
    {
        return $this->morphTo();
    }
}
