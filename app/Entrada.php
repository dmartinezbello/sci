<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = "Entrada";
    public $timestamps = false;
    protected $primaryKey = 'id_entrada';
}
