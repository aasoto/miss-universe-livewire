<?php

namespace App\Models\Editions;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Broadcaster extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'country_id', 'logo'];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function getImageUrl()
    {
        return URL::asset('../storage/app/public/images/editions/broadcasters/'.$this->logo);
    }
}
