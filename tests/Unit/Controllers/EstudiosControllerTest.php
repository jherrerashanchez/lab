<?php


namespace Controllers;


use App\Models\Estudio;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class EstudiosControllerTest extends TestCase {

    use DatabaseMigrations;

    /** @test */
    public function a_estudios_view_can_see(){
        $response = $this->get('/estudios');
        $response->assertViewIs('estudios.estudios_index');
    }

    /** @test */
    public function a_estudio_can_be_created(){
        $response = $this->post('/estudios',[
            'clave' => 123,
            'precio' => 4356,
            'nombre' => 'soy el nombre del estudio'
        ]);

        $response->assertStatus(302);
        $this->assertCount(1,Estudio::all());
    }

    /** @test */
    public function a_clave_is_required(){
        $response = $this->post('/estudios',[
            'clave' => null,
            'precio' => 4356,
            'nombre' => 'soy el nombre del estudio'
        ]);

        $response->assertSessionHasErrors('clave');
    }

    /** @test */
    public function a_precio_is_required(){
        $response = $this->post('/estudios',[
            'clave' => '432423',
            'precio' => null,
            'nombre' => 'soy el nombre del estudio'
        ]);

        $response->assertSessionHasErrors('precio');
    }

    /** @test */
    public function a_nombre_is_required(){
        $response = $this->post('/estudios',[
            'clave' => '432423',
            'precio' => 123,
            'nombre' => null
        ]);

        $response->assertSessionHasErrors('nombre');
    }
}
