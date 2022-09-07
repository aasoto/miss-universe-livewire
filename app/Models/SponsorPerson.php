<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorPerson extends Model
{
    use HasFactory;

    //protected $table = "sponsor_peple";

    protected $fillable = ['name', 'surname', 'email', 'web_site', 'extra_information', 'sponsor_general_id', 'type'];

    public function general(){
        return $this->belongsTo(SponsorGeneral::class, 'sponsor_general_id');
    }
}
