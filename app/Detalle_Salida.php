<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Salida extends Model
{
    protected $table = "Detalle_Salida";
    public $timestamps = false;
    protected $primaryKey = 'id_detalle_salida';
}
