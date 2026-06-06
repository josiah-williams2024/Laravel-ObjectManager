<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = ['title', 'content', 'user_id'];

    protected $casts = [
        'title' => 'string',
        'content' => 'string',
    ];


}
