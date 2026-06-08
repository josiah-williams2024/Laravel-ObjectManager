<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['title', 'Description', 'price', 'user_id'];

    protected $casts = [
        'price' => 'float',
    ];
}
