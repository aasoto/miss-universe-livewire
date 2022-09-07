<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorGeneral extends Model
{
    use HasFactory;

    protected $fillable = ['mu_edition_id', 'own_objective', 'message', 'type'];

    public function mu_edition(){
        return $this->belongsTo(MuEdition::class, 'mu_edition_id');
    }

    public function person(){
        return $this->hasOne(SponsorPerson::class, 'sponsor_general_id');
    }

    public function company(){
        return $this->hasOne(SponsorCompany::class, 'sponsor_general_id');
    }

    public function detail(){
        return $this->hasOne(SponsorDetail::class, 'sponsor_general_id');
    }
}
