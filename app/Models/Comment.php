<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'website',
        'message',
        
    ];
    public function post()
{
    return $this->belongsTo(Post::class);
}



}