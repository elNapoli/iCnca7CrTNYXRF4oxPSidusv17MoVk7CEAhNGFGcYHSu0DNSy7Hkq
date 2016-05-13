<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AnioIntercambio extends Model
{
    protected $table = 'anio_intercambio';
    public $timestamps = false;
    protected $fillable = ['id',
    					   'nombre']; 


	public function pregradoPostulaciones()
    {
        return $this->hasMany('App\PrePostulacionUniversidad','anio','id'); // nombre del campo en la otra tabla 
    }

/*  mala por integridad de keys, la query que realiza es la siguiente para la sentencia 
AnioIntercambio::find(1992)->pregradoR->toArray() es 
:

    select pregrado.*,pre_postulacion_universidad.anio 
    from pregrado 
    join pre_postulacion_universidad 
    on pre_postulacion_universidad.id = pregrado.postulante where pre_postulacion_universidad.anio = 1992 
    public function pregradoR()
    {

        return $this->hasManyThrough('App\Pregrado', 'App\PrePostulacionUniversidad', 'anio', 'postulante');

    }*/
    public function postgradoPostulaciones()
	{
        return $this->hasMany('App\MaestriaPostulacion','anio','id'); // nombre del campo en la otra tabla 
    }
}
