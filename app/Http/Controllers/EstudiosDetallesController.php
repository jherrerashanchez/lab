<?php


namespace App\Http\Controllers;


use App\Models\EstudioDetalles;

class EstudiosDetallesController {

    public function store(){

        $this->requestValidate();
        foreach (request()->estudios_id as $estudio_id){
            EstudioDetalles::create([
                'consulta_id' => request()->consulta_id,
                'estudio_id' => $estudio_id
            ]);
        }
    }

    private function requestValidate(){
        return request()->validate([
            'consulta_id' => 'required',
            'estudios_id' => 'required|array',
        ]);
    }
}
