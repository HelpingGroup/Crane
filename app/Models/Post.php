<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'file',
        'approved_by'
    ];

    /**
     * Get all of the comments attached to the post.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
