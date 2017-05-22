<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    protected $table = "Salida";
    public $timestamps = false;
    protected $primaryKey = 'id_salida';
}
