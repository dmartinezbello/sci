<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Entrada extends Model
{
    protected $table = "Detalle_Entrada";
    public $timestamps = false;
    protected $primaryKey = 'id_detalle_entrada';
}
