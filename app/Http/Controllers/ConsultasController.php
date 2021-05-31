<?php

namespace App\Http\Controllers;

use App\Models\Consulta;

class ConsultasController extends Controller{


    public function index(){
        return view('consultas.consultas_index');
    }

    public function store(){
         Consulta::create($this->requestValidate());
         return redirect('/consultas');
    }

    public function update(Consulta $consulta){
        $consulta->update($this->requestValidate());
    }

    public function destroy(Consulta $consulta){
        $consulta->delete();
    }

    public function requestValidate(){
        return request()->validate([
            'paciente_id' => 'required'
        ]);
    }
}
