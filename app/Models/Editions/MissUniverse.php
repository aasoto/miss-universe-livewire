<?php

namespace App\Models\Editions;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class MissUniverse extends Model
{
    use HasFactory;

    protected $table = 'editions';

    protected $fillable = ['year', 'name', 'official_name', 'start_concentration', 'end_concentration', 'hotel_concentration', 'date_preliminary', 'date', 'broadcaster_id', 'broadcaster_2', 'place_id', 'entrants', 'placements', 'description', 'content', 'top_3', 'top_5', 'top_6', 'extra_data', 'logo', 'background'];

    public function broadcaster(){
        return $this->belongsTo(Broadcaster::class, 'broadcaster_id');
    }

    public function broadcaster_2(){
        return $this->belongsTo(Broadcaster::class, 'broadcaster_2');
    }

    public function place(){
        return $this->belongsTo(Place::class, 'place_id');
    }

    public function getLogoUrl()
    {
        return URL::asset('../storage/app/public/images/editions/miss-universe/logos/'.$this->logo);
    }

    public function getBackgroundUrl()
    {
        return URL::asset('../storage/app/public/images/editions/miss-universe/background/'.$this->background);
    }
}
