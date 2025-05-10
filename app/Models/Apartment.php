<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'name',
        'description',
        'logo',
        'images',
        'check_in',
        'check_out',
        'rating',
        'email',
        'phone_number'
    ];

    protected $casts = [
        'logo' => 'array',
        'images' => 'array',
        'phone_number' => 'array',
    ];

    public function getLogoAttribute($value)
    {
        return $value ? asset('storage/' . $value) : null;
    }

    public function getImagesAttribute($value)
    {
        $images = json_decode($value, true);

        return $images ? array_map(function ($image) {
            return asset('storage' . $image);
        }, $images) : [];
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function topFacilities()
    {
        return $this->belongsToMany(Facility::class, 'apartment_facility');
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}
