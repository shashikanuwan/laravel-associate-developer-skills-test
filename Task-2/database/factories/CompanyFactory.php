<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'telephone' => $this->faker->phoneNumber(),
            'website' => $this->faker->url(),
            'logo' => $this->faker->imageUrl(),
            'cover_image' => $this->faker->imageUrl(),
        ];
    }
}
