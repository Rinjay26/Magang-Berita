<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = "posts";
    protected $fillable = [
        'title',
        'slug',
        'description',
        'content',
        'status',
        'thumbnail',
        'user_id',
        'category_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class)->orderBy('created_at', 'desc');
    }
}
