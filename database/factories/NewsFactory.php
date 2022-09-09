<?php

namespace Database\Factories;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = News::class;

    public function definition()
    {
        return [
            'background' => $this->faker->image(storage_path('app/public/images/news/background'), 500, 500, null, false),
            //'background' => $this->faker->imageUrl(1080, 720),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(5),
            'subtitle' => $this->faker->sentence(),
            'content' => $this->faker->text(1000),
            'date_publish' => $this->faker->date(),
            'posted' => $this->faker->randomElement(['yes', 'not']),
            'category_id' => $this->faker->numberBetween(1, 3),
            'type' => $this->faker->randomElement(['article', 'news'])
        ];
    }
}
