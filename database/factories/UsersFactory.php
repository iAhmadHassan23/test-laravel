<?php

namespace Database\Factories;
use App\Models\Users;

use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Users::class;
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'image' => $this->faker->imageUrl(620, 480)
        ];
    }
}
