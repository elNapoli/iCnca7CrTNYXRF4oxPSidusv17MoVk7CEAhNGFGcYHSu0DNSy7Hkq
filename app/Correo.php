<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class correo extends Model
{
    protected $table = 'correos';
    protected $primaryKey = 'codigo';
    public $timestamps = false;
    protected $fillable = ['nombre',
                           'email']; 

}