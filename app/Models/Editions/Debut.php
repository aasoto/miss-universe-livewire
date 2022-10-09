<?php

namespace App\Models\Editions;

use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debut extends Model
{
    use HasFactory;

    protected $fillable =['country_id', 'edition_id'];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function edition(){
        return $this->belongsTo(MissUniverse::class, 'edition_id');
    }
}
