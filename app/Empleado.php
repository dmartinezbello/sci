<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected $table = "Empleado";
    public $timestamps = false;
    protected $primaryKey = 'id_empleado';
}

