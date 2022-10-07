<?php

namespace App\Models\Editions;

use App\Models\editions\Presenter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MissUniversePresentatorInterception extends Model
{
    use HasFactory;

    protected $table = "presenter_edition_interceptions";

    protected $fillable = ['presenter_id', 'edition_id'];

    public function presenter(){
        return $this->belongsTo(Presenter::class, 'presenter_id');
    }

    public function edition(){
        return $this->belongsTo(MissUniverse::class, 'edition_id');
    }
}
