<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $table     = 'universidad';
    public $timestamps   = false;
    protected $fillable = ['nombre', 'convenio'];

    public function conveniosR()
    {
        return $this->hasMany('App\Convenio','universidad');
    }

    public function campusSedesR()

    {
        return $this->hasMany('App\CampusSede','universidad');
    }

    public function paisR()
    {
        return $this->belongsTo('App\Pais','pais');
    }
    public function getChildrenUniversidadAttribute(){

        return $this->campusSedesR->count();
    }

    public function facultadR(){
        return $this->hasManyThrough('App\Facultad', 'App\CampusSede', 'universidad', 'campus_sede');
    }


    public function ChildrenEstudio($anio, $procedencia){
        $universidad = $this->facultadR;
        //dd($universidad);
        $sum = 0;
        foreach ($universidad as $key => $value) {
            # code...
            $sum = $sum+ $value->pregradosR($anio,$procedencia)->count();
        }
        return ($sum);
    }


    public function scopePostulantes($query,$anio, $procedencia,$id, $tEstudio){


        if($tEstudio === 'Pregrado'){


            return $query->join('campus_sede','campus_sede.universidad','=','universidad.id')
                ->join('facultad','facultad.campus_sede','=','campus_sede.id')
                ->join('carrera','carrera.facultad','=','facultad.id')
                ->join('pre_postulacion_universidad','pre_postulacion_universidad.carrera','=','carrera.id')
                ->join('pregrado','pregrado.postulante','=','pre_postulacion_universidad.postulante')
                ->where('pre_postulacion_universidad.anio',$anio)
                ->where('universidad.id',$id)
                ->where('pregrado.procedencia',$procedencia);
        }
        else{
            return $query->join('campus_sede','campus_sede.universidad','=','universidad.id')
                ->join('facultad','facultad.campus_sede','=','campus_sede.id')
                            ->join('post_postulacion_universidad','post_postulacion_universidad.facultad','=','facultad.id')
                            
                ->join('postgrado','postgrado.postulante','=','post_postulacion_universidad.postulante')
                ->where('post_postulacion_universidad.anio',$anio)
                ->where('universidad.id',$id)
                ->where('postgrado.procedencia',$procedencia);


        }

    }


    public function scopeUniversidades($query,$anio, $tEstudio){



        if($tEstudio === 'Pregrado'){


            return $query->join('campus_sede','campus_sede.universidad','=','universidad.id')
                            ->join('facultad','facultad.campus_sede','=','campus_sede.id')
                            ->join('carrera','carrera.facultad','=','facultad.id')
                            ->join('pre_postulacion_universidad','pre_postulacion_universidad.carrera','=','carrera.id')
                            ->join('pregrado','pregrado.postulante','=','pre_postulacion_universidad.postulante')
                            ->select('universidad.id','universidad.nombre')
                            ->where('pre_postulacion_universidad.anio',$anio)
                            ->groupBy('universidad.id');
        }
        else{
            return $query->join('campus_sede','campus_sede.universidad','=','universidad.id')
                            ->join('facultad','facultad.campus_sede','=','campus_sede.id')
                            ->join('post_postulacion_universidad','post_postulacion_universidad.facultad','=','facultad.id')
                            ->join('postgrado','postgrado.postulante','=','post_postulacion_universidad.postulante')
                            ->select('universidad.id','universidad.nombre')
                            ->where('post_postulacion_universidad.anio',$anio)
                            ->groupBy('universidad.id');

        }
    }







}
