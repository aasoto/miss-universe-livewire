<?php

namespace App\Models\Editions;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ThirdRunnerUp extends Model
{
    use HasFactory;

    protected $fillable = ['candidate_id', 'edition_id'];

    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function edition(){
        return $this->belongsTo(MissUniverse::class, 'edition_id');
    }
}
