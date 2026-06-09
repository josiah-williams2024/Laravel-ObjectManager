<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['title', 'user_id', 'description', 'rating', 'genre', 'price'];

    protected $casts = [
        'price' => 'float',
    ];

}
