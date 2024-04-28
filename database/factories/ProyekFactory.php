<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyek>
 */
class ProyekFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal_mulai' => $this->faker->dateTimeThisMonth(),
            'tanggal_selesai' => $this->faker->dateTimeThisMonth(),
            'nama' => $this->faker->sentence(mt_rand(2, 20)),
            'deskripsi' => collect($this->faker->paragraphs(mt_rand(5, 10)))->map(fn($p) => "<p>$p</p>")->implode(''),
            'dokumentasi' => 'messi.jpg',
            'user_id' => mt_rand(1, 10)
        ];
    }
}
