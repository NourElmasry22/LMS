<?php

namespace Modules\Courses\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Courses\Enums\CourseLevel;
use Modules\Courses\Models\Course;


/** 
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\Modules\Courses\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
         return [
            'title' => $this->faker->sentence(3),
            'image' => $this->faker->imageUrl(640, 480, 'education'),
            'level' => $this->faker->randomElement([
                CourseLevel::BEGINNER->value,
                CourseLevel::INTERMEDIATE->value,
                CourseLevel::ADVANCED->value,
            ]),
            'category' => $this->faker->word(),
            'description' => $this->faker->paragraph(),
            'no_of_lectures' => $this->faker->numberBetween(5, 50),
            'duration' => $this->faker->numberBetween(60, 600),
        ];
    }
}

