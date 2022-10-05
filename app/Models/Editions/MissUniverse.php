<?php

namespace App\Models\Editions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissUniverse extends Model
{
    use HasFactory;

    protected $table = 'editions';

    protected $fillable = ['name', 'official_name', 'date', 'broadcaster_id', 'city_venue_id', 'entrants', 'placements', 'description', 'content', 'top_3', 'top_5', 'top_6', 'extra_data'];

    public function broadcaster(){
        return $this->belongsTo(Broadcaster::class, 'broadcaster_id');
    }

    public function broadcaster_2(){
        return $this->belongsTo(Broadcaster::class, 'broadcaster_2');
    }

    public function city_venue(){
        return $this->belongsTo(CityVenue::class, 'city_venue_id');
    }
}
