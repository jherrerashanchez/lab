<?php


namespace Database\Factories;


use App\Models\Consulta;
use App\Models\Estudio;
use App\Models\EstudioDetalles;
use Illuminate\Database\Eloquent\Factories\Factory;

class EstudioDetallesFactory extends Factory {

    protected $model = EstudioDetalles::class;

    public function definition() {

        $consulta = Consulta::factory()->make();
        $consulta->save();

        $estudio = Estudio::factory()->make();
        $estudio->save();

        return [
            'consulta_id' => $consulta->id,
            'estudio_id' => $estudio->id
        ];
    }
}
