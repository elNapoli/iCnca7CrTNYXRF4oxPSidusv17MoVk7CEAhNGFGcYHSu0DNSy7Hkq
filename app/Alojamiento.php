<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class alojamiento extends Model
{
    protected $table = 'alojamiento';
    public $timestamps = false;
    protected $fillable = ['tipo',
                           'direccion',
                           'contacto',
                           'descripcion',
                           'precio',
                           'telefono']; 

}