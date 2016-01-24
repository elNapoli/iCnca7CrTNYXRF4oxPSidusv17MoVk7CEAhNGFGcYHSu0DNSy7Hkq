<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudad';
    public $timestamps = false;
    protected $fillable = ['nombre',
    					   'codigo_postal']; 



    public function Pais()
    {
    	return $this->belongsTo('App\Pais','id'); //Id local
    }

    public function PreUach()
    {
        return $this->hasMany('App\PreUach','postulante'); //Campo en tabla foranea
    }

    public function CampusSede()
    {
        return $this->hasMany('App\CampusSede','id'); //Campo en tabla foranea
    }

    public function Postulante()
    {
        return $this->hasMany('App\Postulante','id'); //Campo en tabla foranea
    }
}
