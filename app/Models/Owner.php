<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_name',
        'logo_light_theme',
        'logo_dark_theme',
        'country_id',
        'description',
        'owner_name',
        'owner_occupation',
        'owner_picture'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function getLogoLightThemeUrl()
    {
        return URL::asset('../storage/app/public/images/owners/logo/'.$this->logo_light_theme);
    }

    public function getLogoDarkThemeUrl()
    {
        return URL::asset('../storage/app/public/images/owners/logo/'.$this->logo_dark_theme);
    }

    public function getOwnerPictureUrl()
    {
        return URL::asset('../storage/app/public/images/owners/pictures/'.$this->owner_picture);
    }
}
