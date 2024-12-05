<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\offer>
 */
class offerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'info' =>$this->faker->realText($maxNbChars=100),
            'company'=>$this->faker->name(),
            'logo' =>$this->faker->image(),
            'state' =>$this->faker->boolean(),
        ];
    }
}