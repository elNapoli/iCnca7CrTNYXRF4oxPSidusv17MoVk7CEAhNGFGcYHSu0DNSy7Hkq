<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreUach extends Model
{
    protected $table      = 'pre_uach';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['postulante',
                            'email_institucional',
                            'grupo_sanguineo',
                            'enfermedades',
                            'telefono',
                            'ciudad',
                            'direccion'];

    // un Postulante esta en una ciudad
    public function pregradoR()
    {
        return $this->belongsTo('App\Pregrado','postulante','postulante');
    }

    public function ciudadR()
    {
        return $this->belongsTo('App\Ciudad','ciudad');
    }

    public function cindas()
    {
        return $this->hasMany('App\Cinda','postulante');
    }


    public function confirmacionLlegadaR()
    {
        return $this->belongsTo('App\ConfirmacionLlegada','postulante');
    }

    public function contactoExtranjeroR()
    {
        return $this->belongsTo('App\ContactoExtranjero','postulante');
    }

    public function homologacionesR()
    {
        return $this->hasMany('App\Homologacion','postulante');
    }

     public function preUEstudioActualesR()
    {
        return $this->belongsTo('App\PreUEstudioActual','postulante','postulante');
    }

    public function preURespnsablesR()
    {
        return $this->hasMany('App\PreUResponsable','postulante','postulante');
    }


    public function asistentesR()
    {
        return $this->belongsTo('App\Asistente','postulante','postulante');
    }

        public function declaracionR()
    {
        return $this->belongsTo('App\Declaracion','postulante','postulante');
    }

    public function scopeNomina($query,$campus, $facultad){



        $query->leftJoin('postulante','postulante.id','=','pre_uach.postulante')
                ->leftJoin('pre_u_estudio_actual','pre_u_estudio_actual.postulante','=','pre_uach.postulante')
                ->leftJoin('carrera','carrera.id','=','pre_u_estudio_actual.carrera')
                ->leftJoin('facultad','facultad.id','=','carrera.facultad')
                ->leftJoin('pre_postulacion_universidad','pre_postulacion_universidad.postulante','=','pre_uach.postulante')
                ->leftJoin('carrera as cDestino','cDestino.id','=','pre_postulacion_universidad.carrera')
                ->leftJoin('facultad as fDestino','fDestino.id','=','cDestino.facultad')
                ->leftJoin('campus_sede','campus_sede.id','=','facultad.campus_sede')
                ->leftJoin('universidad','universidad.id','=','campus_sede.universidad')
                ->leftJoin('pais','pais.id','=','universidad.pais')
                ->select(
                        'postulante.nombre',
                        'postulante.apellido_paterno',
                        'postulante.apellido_materno',
                        'postulante.telefono as telefono_1',
                        'pre_uach.telefono as telefono_2',
                        'postulante.email_personal',
                        'pre_uach.email_institucional',
                        'postulante.tipo_estudio',
                        'facultad.nombre as facultad',
                        'carrera.nombre as carrera',
                        'pais.nombre as pais',
                        'universidad.nombre as universidad_destino',
                        'fDestino.nombre as facultad_destino',
                        'cDestino.nombre as carrera_destino',
                        'pre_postulacion_universidad.semestre',
                        'pre_postulacion_universidad.desde',
                        'pre_postulacion_universidad.hasta'

                        );
                

        if($campus != 0 ){
            $query->where('campus_sede.id',$campus);

        }

        if($facultad != 0 ){
            $query->where('facultad.id',$facultad);

        }



     
         
    }


}
