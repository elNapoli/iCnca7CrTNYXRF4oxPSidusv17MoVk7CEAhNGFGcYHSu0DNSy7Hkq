<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
class Continente extends Model
{
    protected $table = 'continente';
    public $timestamps = false;
    protected $fillable = ['nombre'];


    public function Pais()
    {
    	return $this->hasMany('App\Pais','continente','id'); //Campo en tabla foranea
    }

    public function ciudadesR(){

        return $this->hasManyThrough('App\Ciudad', 'App\Pais', 'continente', 'pais');
    }
    public function universidadesR(){

        return $this->hasManyThrough('App\Universidad', 'App\Pais', 'continente', 'pais');
    }

    public function getChildrenAttribute(){

        $temp = $this->Pais;
        $sum = 0;
        foreach ($temp as $key => $value) {
            # code...
            $sum += $value->children;
        }

        return $sum;
    }

    public function getChildrenUniversidadAttribute(){

        return $this->universidadesR->count();
    }




    public function scopeTodo($query){

        return $query->join('pais','pais.continente','=','continente.id')
                        ->join('ciudad','ciudad.pais','=','pais.id')
                        ->join('postulante','postulante.ciudad','=','ciudad.id')
                        ->leftJoin('pregrado','pregrado.postulante','=','postulante.id')
                        ->leftJoin('pre_uach','pre_uach.postulante','=','postulante.id')
                        ->leftJoin('ciudad as ciudad2','ciudad2.id','=','pre_uach.ciudad')
                        ->leftJoin('pre_u_estudio_actual','pre_u_estudio_actual.postulante','=','postulante.id')
                        ->leftJoin('carrera','carrera.id','=','pre_u_estudio_actual.carrera')
                        ->leftJoin('facultad','facultad.id','=','carrera.facultad')
                        ->leftJoin('campus_sede','campus_sede.id','=','facultad.campus_sede')
                        ->leftJoin('universidad','universidad.id','=','campus_sede.universidad')
                        ->leftJoin('pre_nu_estudio_actual','pre_nu_estudio_actual.postulante','=','postulante.id')
                        ->leftJoin('campus_sede as campus2','campus2.id','=','pre_nu_estudio_actual.campus_sede')
                        ->leftJoin('universidad as uni2','uni2.id','=','campus2.universidad')
                        ->leftJoin('pre_postulacion_universidad','pre_postulacion_universidad.postulante','=','postulante.id')
                        ->leftJoin('carrera as carrera2','carrera2.id','=','pre_postulacion_universidad.carrera')
                        ->leftJoin('facultad as facultad2','facultad2.id','=','carrera2.facultad')
                        ->leftJoin('campus_sede as campus3','campus3.id','=','facultad2.campus_sede')
                        ->leftJoin('universidad as universida2','universida2.id','=','campus_sede.universidad')
                        ->leftJoin('postgrado','postgrado.postulante','=','postulante.id')
                        ->leftJoin('maestria_actual','maestria_actual.postulante','=','postulante.id')
                        ->leftJoin('post_postulacion_universidad','post_postulacion_universidad.postulante','=','postulante.id')
                        ->leftJoin('facultad as fafafa','fafafa.id','=','post_postulacion_universidad.facultad')
                        ->leftJoin('campus_sede as campus5','campus5.id','=','fafafa.campus_sede')
                        ->leftJoin('universidad as universidad5','universidad5.id','=','campus5.universidad')



                        ->select('continente.nombre as Continente',
                                'pais.nombre as País',
                                "ciudad.nombre as Ciudad","ciudad.codigo_postal",
                                'postulante.apellido_paterno','postulante.apellido_materno',
                                'postulante.nombre','postulante.sexo','postulante.nacionalidad','postulante.fecha_nacimiento',
                                'postulante.lugar_nacimiento','postulante.telefono','postulante.email_personal',
                                'postulante.direccion','postulante.tipo_estudio',
                                'pregrado.procedencia as p1',
                                'pre_uach.email_institucional','pre_uach.grupo_sanguineo','pre_uach.enfermedades','pre_uach.telefono as t2',
                                'pre_uach.direccion as d2','ciudad2.nombre as Ciu2',
                                'universidad.nombre as Universidad','campus_sede.nombre as Campus','facultad.nombre as facultad',
                                'carrera.nombre as carrera','pre_u_estudio_actual.anio_ingreso','pre_u_estudio_actual.ranking',
                                'pre_u_estudio_actual.beneficios',
                                'uni2.nombre as uni2','campus2.nombre as campus2','pre_nu_estudio_actual.area',
                                'pre_nu_estudio_actual.anios_cursados',
                                'universida2.nombre as uni3', 'campus3.nombre as campusss','facultad2.nombre as facul',
                                'carrera2.nombre as carr', 'pre_postulacion_universidad.anio as annio', 'pre_postulacion_universidad.desde',
                                'pre_postulacion_universidad.hasta',
                                'postgrado.procedencia as proce','postgrado.titulo_profesional',
                                'maestria_actual.nombre as nomTitulo','maestria_actual.nombre_tutor_director',
                                'maestria_actual.cargo_tutor_director','maestria_actual.email_tutor_director','maestria_actual.telefono_secretaria',
                                'maestria_actual.area as arrrr','post_postulacion_universidad.anio','post_postulacion_universidad.duracion','post_postulacion_universidad.desde as dede',
                                'post_postulacion_universidad.hasta as haaas','post_postulacion_universidad.tipo','universidad5.nombre as uni5',
                                'campus5.nombre as campus5')
                        ->get();


    }



}
