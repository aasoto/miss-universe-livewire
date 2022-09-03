<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function candidates(){
        return $this->hasMany(Candidate::class);
    }

    public function national_committees(){
        return $this->hasMany(NationalCommittee::class);
    }
}
