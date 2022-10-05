<?php

namespace App\Models\Editions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'city_venue_id'];

    public function city_venue(){
        return $this->belongsTo(CityVenue::class, 'city_venue_id');
    }
}
