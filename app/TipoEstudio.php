<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEstudio extends Model {

    protected $table      = 'tipo_estudio';
    public $timestamps    = false;
    protected $primaryKey = 'id';
    protected $fillable   = ['id','nombre'];


    public function postulanteR()
    {
        return $this->hasMany('App\Postulante','tipo_estudio','id'); //Campo en tabla foranea
    }

    public function getChildrenEstudioAttribute(){

    	return $this->postulanteR->count();

    }

}
