<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Declaracion extends Model
{
    protected $table = 'declaracion';
    protected $primaryKey = 'postulante';
    public $timestamps = false;
    protected $fillable = ['postulante',
    						'persona_matricula',
    					   'fecha_matricula'];

 

    public function PreUach()
    {
    	return $this->belongsTo('App\PreUach','postulante'); //Id local
    }

}
