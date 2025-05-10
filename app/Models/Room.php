<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'name',
        'description',
        'room_size',
        'bed',
        'bathroom',
        'view',
        'parking',
        'images',
    ];

    protected $casts = [
        'bathroom' => 'array',
        'bed' => "array",
        'view' => 'array',
        'images' => 'array',
    ];
    
    public function getImagesAttribute($value)
    {
        $images = json_decode($value, true);

        return $images ? array_map(function ($image) {
            return asset('storage' . $image);
        }, $images) : [];
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function allFacilities(){
        return $this->belongsToMany(Facility::class, 'room_facility');
    }
}
