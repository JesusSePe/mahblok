<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Import the other models we want to relate with Post.
use App\Models\User;
use App\Models\Comment;
use App\Models\Like;

class Post extends Model
{
    use HasFactory;

    // A post belongs to a user.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A post has many comments.
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    // A post has many likes
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
