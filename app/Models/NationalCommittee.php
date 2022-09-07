<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NationalCommittee extends Model
{
    use HasFactory;

    protected $fillable = ['business_name', 'national_director', 'country_id'];

    public function country(){
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function candidates(){
        return $this->hasMany(candidates::class);
    }
}
