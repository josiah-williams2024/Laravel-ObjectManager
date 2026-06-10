<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    protected $fillable = ['title', 'description', 'skill-level', 'user_id'];

    protected $casts = [
        'title' => 'string',
        'description' => 'string',
        'skill-level' => 'string',
    ];
}
