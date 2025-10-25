<?php

namespace Modules\Lessons\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Lessons\Models\Lesson;

class LessonsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Lesson::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
         return [
            'title' => $this->faker->sentence(4),
            'content' => $this->faker->paragraphs(2, true),
            'video_url' => $this->faker->url(),
            'order' => $this->faker->numberBetween(1, 20),
            'duration' => $this->faker->numberBetween(5, 60),
        ];
    }
}

