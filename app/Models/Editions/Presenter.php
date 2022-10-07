<?php

namespace App\Models\editions;

use App\Models\Country;
use App\Models\Editions\Broadcaster;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Presenter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'broadcaster_id', 'rol', 'country_id', 'photo'];

    public function broadcaster(){
        return $this->belongsTo(Broadcaster::class, 'broadcaster_id');
    }

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function getPhotoUrl()
    {
        return URL::asset('../storage/app/public/images/editions/presenters/'.$this->photo);
    }
}
