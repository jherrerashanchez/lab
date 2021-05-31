<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacientesController extends Controller {

    public function index() {
        $pacientes = Paciente::get();
        return view('pacientes/pacientes_index', compact('pacientes'));
    }

    public function create() {
        return view('pacientes.pacientes_create');
    }

    public function store() {
        Paciente::create($this->validateRequest());
        return redirect('/pacientes');
    }

    public function show($id) {
        // TODO: Implement show() method.
    }

    public function edit($id) {
        // TODO: Implement edit() method.
    }

    public function update(Paciente $paciente) {
        $paciente->update($this->validateRequest());
        return redirect($paciente->path());
    }

    public function destroy(Paciente $paciente) {
        $paciente->delete();
    }

    /**
     * @param Request $request
     * @return array
     */
    private function validateRequest(): array {
        return request()->validate([
            'nombres' => 'required',
            'apellido_paterno' => '',
            'apellido_materno' => '',
            'edad' => '',
            'correo' => '',
            'telefono_celular' => '',
            'telefono_casa' => '',
        ]);
    }
}

