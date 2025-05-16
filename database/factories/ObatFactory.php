<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_obat'    => $this->faker->word(['paracetamol', 'amoxilin', 'vitamin']),
            'jenis'        => $this->faker->randomElement(['Tablet', 'Kapsul', 'Sirup', 'Salep']),
            'stok'         => $this->faker->numberBetween(10, 200),
            'harga'        => $this->faker->randomFloat(2, 1000, 100000),
            'expired_date' => $this->faker->dateTimeBetween('now', '+2 years')->format('Y-m-d'),
            'created_at'   => now(),
            'updated_at'   => now(),
        ];
    }
}
