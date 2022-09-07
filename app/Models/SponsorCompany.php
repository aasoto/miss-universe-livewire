<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorCompany extends Model
{
    use HasFactory;

    protected $fillable = ['business_name', 'identification', 'email', 'web_site', 'extra_information', 'sponsor_general_id', 'type'];

    public function general(){
        return $this->belongsTo(SponsorGeneral::class, 'sponsor_general_id');
    }
}
