<?php

namespace App\Http\Controllers;

use App\Models\Estudio;
use Illuminate\Http\Request;

class EstudiosController extends Controller{

    public function index(){
        return view('estudios.estudios_index');
    }


    public function store(){
        Estudio::create($this->validateRequest());
        return redirect('/estudios');
    }

    public function validateRequest(){
        return request()->validate([
                'clave' => 'required',
                'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/',
                'nombre' => 'required'
            ]);
    }
}
