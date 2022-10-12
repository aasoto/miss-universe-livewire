<?php

namespace App\Models\Editions;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quarterfinalist extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'edition_id'];

    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function candidates(){
        return $this->hasMany(Candidate::class);
    }

    public function edition(){
        return $this->belongsTo(MissUniverse::class, 'edition_id');
    }

    public function editions(){
        return $this->hasMany(MissUniverse::class);
    }
}
