<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'comment',
    ];

    /**
     * Get the user for the comment.
     */
    public function user()
    {
        return $this->hasOne(User::class);
    }
    
    /**
     * Get the post for the comment.
     */
    public function post()
    {
        return $this->hasOne(Post::class);
    }
}
