<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    public static $route = '/pacientes';

    protected $table = 'pacientes';
    protected $guarded = [];

    public function path(){
        return "pacientes/$this->id";
    }
}
