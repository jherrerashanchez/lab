<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estudio extends Model
{
    use HasFactory;

    public static $route = '/estudios';
    protected $table = 'estudios';
    protected $guarded = [];

    public function path(){
        return "/estudios/$this->id";
    }
}
