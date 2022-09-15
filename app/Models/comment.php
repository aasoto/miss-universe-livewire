<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'news_id', 'message'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function news(){
        return $this->belongsTo(News::class, 'news_id');
    }

    public function getProfileImageUrl()
    {
        if ($this->user->profile_photo_path) {
            return URL::asset('../storage/app/public/'.$this->user->profile_photo_path);
        } else {
            return URL::asset('../storage/app/public/profile-photos/user.png');
        }
    }
}
