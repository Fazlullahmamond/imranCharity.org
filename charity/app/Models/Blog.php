<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'text', 'image', 'user_id', 'video_url'];

    private $dir = 'backend/img/blogs/';
    // find user whose post this blog
    public function user()
    {
        return $this->belongsTo(USer::class);
    }

    public function getImageAttribute($image)
    {
        return $this->dir . $image;
    }
}
