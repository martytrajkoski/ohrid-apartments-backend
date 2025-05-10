<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Explore extends Model
{
    protected $fillable = [
        'title',
        'type',
        'phone_number',
        'email',
        'url',
        'location',
        'images'
    ];

    protected $casts = [
        'images' => 'array',
    ];
}
