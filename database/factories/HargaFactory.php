<?php
namespace Database\Factories;

use App\Models\Harga;
use Illuminate\Database\Eloquent\Factories\Factory;

class HargaFactory extends Factory
{
    protected $model = Harga::class;

    public function definition()
    {
        return [
            'harga' => $this->faker->numberBetween(1000, 10000),
            'bobot' => $this->faker->numberBetween(1, 5),
        ];
    }
}
