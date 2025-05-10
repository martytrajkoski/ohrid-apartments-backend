<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'address',
        'city',
        'country',
        'latitude',
        'longitude',
        'map_url'
    ];

    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
}
