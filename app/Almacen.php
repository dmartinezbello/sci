<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Almacen extends Model
{
    protected $table = "Almacen";
    public $timestamps = false;
    protected $primaryKey= "id_almacen";
}