<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Buku>
 */
class BukuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => mt_rand(1, 3),
            'kategori_id' => mt_rand(1, 3),
            'judul' => fake()->words(3, true),
            'slug' => fake()->words(1, true),
            'deskripsi' => fake()->sentence(3),
            'jumlah' => fake()->numberBetween(5, 100),
        ];
    }
}
