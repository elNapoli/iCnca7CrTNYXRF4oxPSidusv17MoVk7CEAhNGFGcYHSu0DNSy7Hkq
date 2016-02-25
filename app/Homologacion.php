<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Homologacion extends Model
{
    protected $table = 'homologacion';
    public $timestamps = false;
    protected $fillable = ['pga',
    					   'motivo',
    					   'fecha',
    					   'postulante'];

 

    public function PreUach()
    {
    	return $this->belongsTo('App\PreUach','id'); //Id local
    }
    public function asignaturaHomologadaR()
    {
        return $this->hasMany('App\AsignaturaHomologada','homologacion'); //Id local
    }

}
