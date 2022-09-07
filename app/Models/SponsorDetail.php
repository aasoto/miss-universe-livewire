<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorDetail extends Model
{
    use HasFactory;

    protected $fillable = ['extra', 'sponsor_general_id'];

    public function general(){
        return $this->belongsTo(SponsorGeneral::class, 'sponsor_general_id');
    }
}
