<?php


namespace Controllers;


use App\Models\Paciente;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PacientesControllerTest extends TestCase {

    use DatabaseMigrations;

    /** @test */
    public function a_estudios_view_can_see(){

        $response = $this->get(Paciente::$route);
        $response->assertViewIs('pacientes.pacientes_index');
    }

    /** @test */
    public function a_paciente_can_be_created() {

        $response = $this->post(Paciente::$route, [
            "nombres" => "Soy el nombre"
        ]);

        $this->assertCount(1, Paciente::all());
        $response->assertRedirect(Paciente::$route);
    }

    /** @test */
    public function a_nombres_is_required() {

        $response = $this->post(Paciente::$route, [
            "nombres" => ""
        ]);

        $response->assertSessionHasErrors('nombres');
    }

    /** @test */
    public function a_paciente_can_be_updated() {

        $this->post(Paciente::$route, [
            "nombres" => "nombre"
        ]);

        $paciente = Paciente::first();
        $response = $this->patch($paciente->path(), [
            "nombres" => "nombre cool"
        ]);
        $this->assertEquals('nombre cool', $paciente->fresh()->nombres);
        $response->assertRedirect($paciente->path());
    }

    /** @test */
    public function a_paciente_can_be_deleted() {

        $this->post(Paciente::$route,[
            "nombres" => "Soy el nombre"
        ]);
        $this->assertCount(1,Paciente::all());

        $paciente = Paciente::first();
        $this->delete($paciente->path());
        $this->assertCount(0,Paciente::all());
    }


}
