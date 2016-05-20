<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPostulacionUniversidad extends Model
{
    protected $table      = 'post_postulacion_universidad';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = [
                            'celular',
                            'tipo',
                            'duracion',
                            'anio',
                            'area',
                            'desde',
                            'hasta',
                            'nombre_maestria',
                            'laboratorio',
                            'contacto_uach',
                            'instituto',
                            'facultad'];


    // una postulación postgrado, solo puede  ser postulada a una universidad
    public function postgrado()
    {
        return $this->belongsTo('App\Postgrado','postulante');
    }
    public function facultadR()
    {
        return $this->belongsTo('App\Facultad','facultad');
    }
    public function financiamientoR()
    {
        return $this->belongsTo('App\Financiamiento','financiamiento');
    }

    

}
