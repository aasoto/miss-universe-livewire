<?php

namespace App\Models\Editions;

use App\Models\Candidate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contestant extends Model
{
    use HasFactory;

    protected $table = 'candidate_edition_interceptions';

    protected $fillable = ['candidate_id', 'edition_id'];

    public function candidate(){
        return $this->belongsTo(Candidate::class, 'candidate_id');
    }

    public function edition(){
        return $this->belongsTo(MissUniverse::class, 'edition_id');
    }
}
