<?php


namespace Controllers;


use App\Models\Estudio;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EstudiosControllerTest extends TestCase {

    use DatabaseMigrations;

    /** @test */
    public function a_estudios_view_can_see() {

        $response = $this->get(Estudio::$route);
        $response->assertViewIs('estudios.estudios_index');
    }

    /** @test */
    public function a_estudio_can_be_created() {

        $response = $this->post(Estudio::$route, [
            'clave' => 123,
            'precio' => 4356,
            'nombre' => 'soy el nombre del estudio'
        ]);

        $this->assertCount(1, Estudio::all());
        $response->assertRedirect(Estudio::$route);
    }

    /** @test */
    public function a_clave_is_required() {

        $response = $this->post(Estudio::$route, [
            'clave' => null,
            'precio' => 4356,
            'nombre' => 'soy el nombre del estudio'
        ]);

        $response->assertSessionHasErrors('clave');
    }

    /** @test */
    public function a_precio_is_required() {

        $response = $this->post(Estudio::$route, [
            'clave' => '432423',
            'precio' => null,
            'nombre' => 'soy el nombre del estudio'
        ]);

        $response->assertSessionHasErrors('precio');
    }

    /** @test */
    public function a_nombre_is_required() {

        $response = $this->post(Estudio::$route, [
            'clave' => '432423',
            'precio' => 123,
            'nombre' => null
        ]);

        $response->assertSessionHasErrors('nombre');
    }

    /** @test */
    public function a_estudio_can_be_updated() {

        $this->post(Estudio::$route, [
            'clave' => 'soy la clave',
            'precio' => 123,
            'nombre' => 3434
        ]);

        $estudio = Estudio::first();
        $response = $this->patch($estudio->path(), [
            'clave' => 'clave nueva',
            'precio' => 123,
            'nombre' => 3434
        ]);

        $this->assertEquals('clave nueva',$estudio->fresh()->clave);
        $response->assertRedirect($estudio->path());
    }

    /** @test  */
    public function a_estudio_can_be_deleted(){

        $this->post(Estudio::$route,[
            'clave' => 'clave nueva',
            'precio' => 123,
            'nombre' => 3434
        ]);

        $estudio = Estudio::first();
        $this->assertCount(1, Estudio::all());

        $response = $this->delete($estudio->path());
        $this->assertCount(0, Estudio::all());
        $response->assertRedirect(Estudio::$route);
    }
}
