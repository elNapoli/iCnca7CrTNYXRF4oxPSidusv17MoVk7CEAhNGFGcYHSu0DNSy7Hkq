<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';
    public $timestamps = false;
    protected $fillable = ['nombre',
    					   'codigo_postal'
                           'pais']; 



    public function paisR()
    {
    	return $this->belongsTo('App\Pais','id'); //Id local
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
}
