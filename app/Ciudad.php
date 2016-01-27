<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';
    public $timestamps = false;
    protected $fillable = ['nombre',
    					   'codigo_postal',
                           'pais']; 



    public function paisR()
    {
    	return $this->belongsTo('App\Pais','pais'); //Id local
    }

    public function preUach()
    {
        return $this->hasMany('App\PreUach','postulante'); //Campo en tabla foranea
    }

    public function campusSede()
    {
        return $this->hasMany('App\CampusSede','id'); //Campo en tabla foranea
    }

    public function postulante()
    {
        return $this->hasMany('App\Postulante','id'); //Campo en tabla foranea
    }


    public static function getAllRelation($id =NULL){
    //dd($name);

        if(empty($id)){
        return Ciudad::join('pais','pais.id','=','ciudad.pais')
                            ->join('continente','continente.id','=','pais.continente')
                            ->select('ciudad.id as ciudadID',
                                    'ciudad.nombre as ciudadNombre',
                                    'pais.id as paisID',
                                    'pais.nombre as paisNombre',
                                    'continente.id as continenteID',
                                    'continente.nombre as continenteNombre')
                            ->orderby('continente.id')
                            ->get();


        }
        else{

        return Ciudad::join('pais','pais.id','=','ciudad.pais')
                            ->join('continente','continente.id','=','pais.continente')
                            ->select(
                                    'ciudad.id',
                                    'continente.id as continente',
                                    'pais.id as pais',
                                    'ciudad.nombre',
                                    'ciudad.codigo_postal'
                                    )
                            ->orderby('continente.id')
                            ->where('ciudad.id','=', $id)
                            ->first();
        }
    //name($request->get('name'))->paginate(4)

    }
}
