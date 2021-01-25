<?php

namespace Database\Factories;

use App\Models\Dosen;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DosenFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dosen::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nip' => $this->faker->numberBetween(1999420, 1999440),
            'name' => $this->faker->name,
            'matkul_id' => $this->faker->randomElement(['1', '2', '3']),
            'alamat' => $this->faker->address,
            'slug' => Str::slug($this->faker->sentence())
        ];
    }
}
