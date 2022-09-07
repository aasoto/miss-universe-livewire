<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MuEdition extends Model
{
    use HasFactory;

    protected $fillable = ['edition', 'official_name', 'country_id', 'city_venue', 'num_contestants'];

    public function generals(){
        return $this->hasMany(SponsorGeneral::class);
    }
}
