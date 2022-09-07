<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
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
        'button_2_link'
    ];
}
