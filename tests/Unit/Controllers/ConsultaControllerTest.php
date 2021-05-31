<?php


namespace Controllers;


use App\Models\Consulta;
use App\Models\Paciente;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConsultaControllerTest extends TestCase {
    use RefreshDatabase;


    /** @test  */
    public function a_consulta_view_can_see(){
        $response = $this->get(Consulta::$route);
        $response->assertViewIs('consultas.consultas_index');
    }

    /** @test  */
    public function a_consulta_can_be_created(){

        $paciente = Paciente::factory()->make();
        $paciente->save();
        $response = $this->post(Consulta::$route,[
            'paciente_id' => $paciente->id,
        ]);
        $this->assertCount(1,Consulta::all());
        $response->assertRedirect(Consulta::$route);
    }

    /** @test  */
    public function a_consulta_can_be_updated(){
        $this->withoutExceptionHandling();

        //create 2
        $pacientes = Paciente::factory()->count(2)->make();
        $pacientes[0]->save();
        $pacientes[1]->save();
        $this->post(Consulta::$route,[
            'paciente_id' => $pacientes[0]->id,
        ]);
        $this->assertCount(1,Consulta::all());

        //update to second item
        $consulta = Consulta::first();
        $responce = $this->patch($consulta->path(),[
            'paciente_id' => $pacientes[1]->id
        ]);

        $this->assertEquals($pacientes[1]->id,$consulta->refresh()->paciente_id);
    }

    /** @test  */
    public function a_consulta_can_be_deleted(){
        $this->withoutExceptionHandling();

        //create
        $paciente = Paciente::factory()->make();
        $paciente->save();
        $this->post(Consulta::$route,[
            'paciente_id' => $paciente->id,
        ]);
        $this->assertCount(1,Consulta::all());

        //delete
        $consulta = Consulta::first();
        $this->delete($consulta->path());
        $this->assertCount(0,Consulta::all());
    }
}
