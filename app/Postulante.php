<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $table    = 'postulante';
    protected $primaryKey = 'id';
    public $timestamps  = false;
    protected $fillable = ['apellido_paterno',
                            'apellido_materno',
                            'nombre',
                            'sexo',
                            'nacionalidad',
                            'nivel_de_español',
                            'como_se_entero',
                            'fecha_nacimiento',
                            'lugar_nacimiento',
                            'telefono',
                            'email_personal',
                            'ciudad',
                            'tipo_estudio',
                            'user_id',
                            'direccion'];


    public function ciudadR()
    {
        return $this->belongsTo('App\Ciudad','ciudad');
    }
    public function usuarioR()
    {
        return $this->belongsTo('App\User','user_id');
    }

    public function postgradosR()
    {
        return $this->belongsTo('App\Postgrado','id','postulante');
    }

    public function pregradosR()
    {
        return $this->belongsTo('App\Pregrado','id','postulante');  //local , Remota
    }                                            

    public function documentoIdentidadR()
    {
        return $this->hasMany('App\DocumentoIdentidad','postulante');
    }

    public function documentoAdjuntos()
    {
        return $this->hasMany('App\DocumentoAdjunto','postulante');
    }


    public function scopeNonima($query,$universidad, $campus, $facultad,$carrera,$procedencia){


         $query->leftJoin('pre_u_estudio_actual','pre_u_estudio_actual.postulante','=','postulante.id')
                     ->leftJoin('carrera','carrera.id','=','pre_u_estudio_actual.carrera')
                     ->leftJoin('facultad','facultad.id','=','carrera.facultad')
                     ->leftJoin('campus_sede','campus_sede.id','=','facultad.campus_sede')
                     ->leftJoin('universidad','universidad.id','=','campus_sede.universidad')


                     ->leftJoin('pre_nu_estudio_actual','pre_nu_estudio_actual.postulante','=','postulante.id')
                     ->leftJoin('campus_sede as campus2','campus2.id','=','pre_nu_estudio_actual.campus_sede')
                     ->leftJoin('universidad as universidad2','universidad2.id','=','campus2.universidad')

                     ->select('postulante.nombre','postulante.apellido_paterno','apellido_materno',
                                'postulante.fecha_nacimiento','postulante.telefono as telefono1',
                                'postulante.email_personal',

                                'pre_nu_estudio_actual.area', 'pre_nu_estudio_actual.anios_cursados',
                                'campus2.nombre as campus1','universidad2.nombre as universidad1',


                                'pre_u_estudio_actual.anio_ingreso',
                                'carrera.nombre as carrera','facultad.nombre as facultad','campus_sede.nombre as campus2',
                                'universidad.nombre as universidad2'
                                )
                     ->where('postulante.tipo_estudio','Pregrado');


        if($procedencia === 'UACH'){



            if($universidad != '0'){
                     $query->where('universidad.id',$universidad);

            }
            if($campus != '0'){

                     $query->where('campus_sede.id',$campus);

            }
            if($facultad != '0'){

                     $query->where('facultad.id',$facultad);

            }
            if($carrera != '0'){

                     $query->where('carrera.id',$carrera);

            }
        }
        else{
            if($universidad != '0'){
                     $query->where('universidad2.id',$universidad);

            }
            if($campus != '0'){

                     $query->where('campus2.id',$campus);

            }
        }
        return $query->get();

    }

}
