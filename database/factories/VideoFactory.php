<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VideoFactory extends Factory
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
            'path' => '16412261651099884249final laravel.webm',
            'type' => 'paid',
            'course_id' => $this->faker->numberBetween(1, 20)
        ];
    }
}
