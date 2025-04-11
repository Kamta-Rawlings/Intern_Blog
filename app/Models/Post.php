<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{

    use HasFactory;
    // Define the table associated with the model
    protected $fillable = [
        'title',
        'content',
        'user_id',
    ];
    // Define the relationship with the User model
    public function comments()
    {
        return $this->belongsTo(User::class);
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