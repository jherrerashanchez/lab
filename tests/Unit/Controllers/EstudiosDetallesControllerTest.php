<?php


namespace Controllers;


use App\Models\Consulta;
use App\Models\Estudio;
use App\Models\EstudioDetalles;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EstudiosDetallesControllerTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    public function a_consulta_detalle_can_be_created() {

        $consulta = Consulta::factory()->make();
        $consulta->save();
        $estudio = Estudio::factory()->make();
        $estudio->save();

        $this->post(EstudioDetalles::$route, [
            'consulta_id' => $consulta->id,
            'estudios_id' => [$estudio->id]
        ]);
        $this->assertCount(1,Consulta::all());
    }

    /** @test */
    public function many_consulta_detalle_can_be_created() {

        $consulta = Consulta::factory()->make();
        $consulta->save();
        $estudios = Estudio::factory()->count(5)->make();

        $estudios_id = [];
        foreach ($estudios as $estudio){
            $estudio->save();
            $estudios_id[] = $estudio->id;
        }

        $this->post(EstudioDetalles::$route, [
            'consulta_id' => $consulta->id,
            'estudios_id' => $estudios_id
        ]);
        $this->assertCount(5,EstudioDetalles::all());
    }

    /** @test */
    public function a_consulta_detalle_can_be_deleted(){

        $estudiosDetalle = EstudioDetalles::factory()->make();
        $estudiosDetalle->save();
        $this->assertCount(1,EstudioDetalles::all());


    }
}
