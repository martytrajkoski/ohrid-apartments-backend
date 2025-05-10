<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'name',
    ];

    public function apartments()
    {
        return $this->belongsToMany(Apartment::class, 'apartment_facility');
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'room_facility');
    }
}