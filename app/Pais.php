<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $table    = 'pais';
    public $timestamps  = false;
    protected $fillable = ['nombre','continente'];

    // un País esta en un Continente
    public function continenteR()
    {
        return $this->belongsTo('App\Continente','continente'); //id local
    }

    //un País tiene muchas Ciudades
    public function ciudades()
    {
        return $this->hasMany('App\Ciudad','pais'); // nombre del campo en la otra tabla 
    }
}
