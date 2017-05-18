<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "Producto";
    public $timestamps = false;
    protected $primaryKey = 'id_producto';
}
