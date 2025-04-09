<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //;
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];
    // Define the relationship with the User model
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public $timestamps = true; // Ensure timestamps are enabled

}

// class Post extends Model
// {
//     protected $fillable = [
//         'title', 
//         'content', 
//         'user_id',
//     ];
//     public $timestamps = true; // Ensure timestamps are enabled
// }