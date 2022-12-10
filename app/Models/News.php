<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class News extends Model
{
    use HasFactory;

    protected $fillable = ['background', 'title', 'slug', 'subtitle', 'content', 'date_publish', 'posted', 'category_id', 'type', 'tags', 'user_id'];

    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getImageUrl()
    {
        return URL::asset('../storage/app/public/images/news/background/'.$this->background);
    }
}
