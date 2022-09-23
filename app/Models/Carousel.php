<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'number',
        'image',
        'title',
        'subtitle',
        'secondary_image',
        'button_1_text',
        'button_1_type',
        'button_1_color',
        'button_1_link',
        'button_2_text',
        'button_2_type',
        'button_2_color',
        'button_2_link',
        'link_redirect'
    ];

    public function getImageUrlBackground()
    {
        return URL::asset('../storage/app/public/images/carousels/background/'.$this->image);
    }

    public function getImageUrlSecondaryImage()
    {
        return URL::asset('../storage/app/public/images/carousels/secondaries_images/'.$this->secondary_image);
    }
}
