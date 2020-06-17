<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursale extends Model
{
    //
    protected $table = 'sucursales';

    protected $fillable = ['Nombre', 'Direccion', 'Telefono'];

    protected $primaryKey = 'Cv_Sucursal';
}
