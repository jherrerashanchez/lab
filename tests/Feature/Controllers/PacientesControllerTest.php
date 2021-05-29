<?php


namespace Controllers;


use App\Models\Paciente;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class PacientesControllerTest extends TestCase {

    use DatabaseMigrations;

    /** @test */
    public function a_paciente_can_be_created() {

        $response = $this->post('/pacientes', [
            "nombres" => "Soy el nombre"
        ]);

        //302 Redireccion
        $response->assertStatus(302);
        $this->assertCount(1, Paciente::all());
    }

    /** @test */
    public function a_nombres_is_required() {

        $response = $this->post('/pacientes', [
            "nombres" => ""
        ]);

        $response->assertSessionHasErrors('nombres');
    }

    /** @test */
    public function a_paciente_can_be_updated() {
        $this->withoutExceptionHandling();

        $this->post('/pacientes', [
            "nombres" => "nombre"
        ]);

        $paciente = Paciente::first();
        $this->patch("/pacientes/$paciente->id", [
            "nombres" => "nombre cool"
        ]);
        $this->assertEquals('nombre cool', Paciente::first()->nombres);
    }


}
