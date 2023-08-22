<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
Use App\Models\Comment;
Use App\Models\Category;
Use App\Models\User;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'image',
        'category_id',
        'description',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
{
    return $this->hasMany(Comment::class);
}
}
