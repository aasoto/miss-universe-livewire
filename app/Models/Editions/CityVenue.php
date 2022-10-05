<?php

namespace App\Models\Editions;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityVenue extends Model
{
    use HasFactory;

    protected $fillable = ['city', 'state', 'country_id'];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }
}
