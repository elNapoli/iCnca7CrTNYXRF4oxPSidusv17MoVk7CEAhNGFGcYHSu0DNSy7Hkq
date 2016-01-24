<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinda extends Model
{
    protected $table = 'cinda';
    public $timestamps = false;
    protected $fillable = ['codigo_universidad',
                           'nombre_responsable_academico',
                           'telefono_responsable_academico',
                           'email_responsable_academico'];

 
    ########### N:1 ###########

    //Un Convenio pertenece a una Universidad
    public function PreNoUach()
    {
    	return $this->belongsTo('App\PreNoUach','postulante'); //Id local
    }

}
