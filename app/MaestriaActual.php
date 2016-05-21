<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaestriaActual extends Model
{
    protected $table      = 'maestria_actual';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = [   'nombre',
                                'tipo',
                                'nombre_tutor_director',
                                'cargo_tutor_director',
                                'email_tutor_director',
                                'telefono_secretaria',
                                'nombre_secretaria',
                                'area',
                                'campus_sede'];

    // un Postulante esta en una ciudad
    public function postgrado()
    {
        return $this->belongsTo('App\Postgrado','postulante');
    }

    public function campusSedeR()
    {
        return $this->belongsTo('App\CampusSede','campus_sede');
    }


}
