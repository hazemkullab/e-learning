<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CourseFactory extends Factory
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
            'excerpt' => json_encode(['en' => $this->faker->sentence(20, true), 'ar' => $this->faker->sentence(20, true)], JSON_UNESCAPED_UNICODE),
            'content' => json_encode(['en' => $this->faker->paragraphs(5, true), 'ar' => $this->faker->paragraphs(5, true)], JSON_UNESCAPED_UNICODE),
            'image' => $this->faker->imageUrl(),
            'discount' => rand(0, 20),
            'category_id' => rand(1, 5)
        ];
    }
}
