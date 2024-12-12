<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ArticleFactory extends Factory
{
    protected $model = \App\Models\Article::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'prix' => $this->faker->randomFloat(2,10,100),
            'stock' => $this->faker->numberBetween(0, 1000000),
        ];
    }
}
