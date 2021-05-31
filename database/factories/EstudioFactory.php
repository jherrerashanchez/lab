<?php


namespace Database\Factories;


use App\Models\Estudio;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudioFactory extends Factory{

    protected $model = Estudio::class;

    public function definition()
    {
        return [
            'clave' => $this->faker->hexColor,
            'precio' => $this->faker->numberBetween(1,10000),
            'nombre' => $this->faker->name
        ];
    }
}
