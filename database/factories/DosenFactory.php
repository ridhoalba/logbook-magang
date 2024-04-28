<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dosen>
 */
class DosenFactory extends Factory
{
    protected static ?string $password;
    /**
     * 
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'nip' => $this->faker->unique()->numerify('##########'),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            // 'name' => $this->faker->name,
        ];
    }

    public function gmail()
    {
        return $this->state(function (array $attributes) {
            return [
                'email' => $this->faker->unique()->email(), // Menggunakan safeEmail dengan gmail.com
            ];
        });
    }
}
