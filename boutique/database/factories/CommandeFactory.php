<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CommandeFactory extends Factory
{
    protected $model = \App\Models\Commande::class;

    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
