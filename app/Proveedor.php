<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "Proveedor";
    public $timestamps = false;
    protected $primaryKey = "id_proveedor";
}
