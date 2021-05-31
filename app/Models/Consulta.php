<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{
    use HasFactory;

    static $route= '/consultas';
    protected $guarded = [];

    public function path(){
        return "/consultas/$this->id";
    }

    public function estudiosDetalles(){
        return $this->hasMany(EstudioDetalles::class);
    }
}
