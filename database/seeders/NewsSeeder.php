<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\News;
use Database\Factories\ImageFactory;
use Database\Factories\NewsFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        News::factory()->create();
        /*$title = Str::random(rand(10, 30));
        News::create([
            'title' => $title,
            'slug' => str($title)->slug(),
            'subtitle' => Str::random(rand(15, 40)),
            'content' => Str::random(rand(100, 500)),
            'date_publish' => Carbon::today()->subDays(rand(0, 400)),
            'posted' => ['yes','not'][rand(0, 1)],
            'category_id' => Category::inRandomOrder()->first()->id,
            'type' => ['article', 'news', 'other'][rand(0, 2)]
        ]);*/
    }
}
