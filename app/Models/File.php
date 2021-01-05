<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'file_path',
    ];

    /**
     * Get all of the comments attached to the post.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
