<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstudioDetalles extends Model {

    use HasFactory;

    public static $route = 'estudios_detalles';
    protected $table = 'estudios_detalles';
    protected $guarded = [];

    public function path(){
        return "/estudios_detalles/$this->id";
    }

    public function consulta(){
        return $this->belongsTo(Consulta::class);
    }

    public function estudio(){
        return $this->hasOne(Estudio::class,'id','estudio_id');
    }
}
