<?php


namespace Database\Factories;


use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Database\Eloquent\Factories\Factory;

class ConsultaFactory extends Factory{

    protected $model = Consulta::class;

    public function definition(){
        return [
            'paciente_id' => $this->makePaciente()->id
        ];
    }

    private function makePaciente(){
        $paciente = Paciente::factory()->make();
        $paciente->save();
        return $paciente;
    }
}
