<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PinsFactory extends Factory
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
            'user_id' => $this->faker->numberBetween(1,100),
            'latitude' => $this->faker->latitude(35,38),
            'longitude' => $this->faker->longitude(136, 138),
            'picture' => 'samplePicture.jpg',
            'pin_name' => $this->faker->streetName(),
            'genre' => $this->faker->numberBetween(1,5),
            'detail' => $this->faker->realText(15),
            'pin_flag' => $this->faker->numberBetween(0,1),
            'like_count' => $this->faker->numberBetween(1,100),
            
        ];
    }
}
