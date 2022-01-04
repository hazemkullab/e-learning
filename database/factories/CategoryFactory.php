<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => json_encode(['en' => $this->faker->words(2, true), 'ar' => $this->faker->words(2, true)], JSON_UNESCAPED_UNICODE),
            'slug' => Str::slug($this->faker->words(2, true)),
        ];
    }
}
