<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Genero extends Model {

	//
    protected $table    = 'genero';
    protected $primaryKey = 'id';
    public $timestamps  = false;
    protected $fillable = ['id',
                            'nombre',];

    public function postulanteR()
    {
        return $this->hasMany('App\Postulante','sexo','id'); //Campo en tabla foranea
    }
    public function getChildrenAttribute(){

        return$this->postulanteR->count();
    }
    

}
