<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JobPost>
 */
class JobPostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'job_title' => $this->faker->word,
            'user_id' => $this->faker->numberBetween(1,2),
            'job_region_id' => $this->faker->numberBetween(1, 10),
            'job_type' => $this->faker->word,
            'job_location' => $this->faker->word,
            'vacancy' => $this->faker->numberBetween(1, 10),
            'experience' => $this->faker->word,
            'salary' => $this->faker->word,
            'gender' => $this->faker->word,
            'application_deadline' => $this->faker->date(),
            'job_description' => $this->faker->word,
            'responsibilities' => $this->faker->word,
            'education_requirements' => $this->faker->word,
            'other_benefits' => $this->faker->word,
            'image' => $this->faker->word,
            'category_id' => $this->faker->numberBetween(1, 10),


            
        ];
    }
}
