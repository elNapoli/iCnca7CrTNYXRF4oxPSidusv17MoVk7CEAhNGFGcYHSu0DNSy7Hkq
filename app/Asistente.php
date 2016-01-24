<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    protected $table = 'asistente';
    public $timestamps = false;
    protected $fillable = ['nombre',
    					   'indicaciones']; 



    public function Beneficio()
    {
    	return $this->belongsTo('App\Beneficio','beneficio'); //Id local
    }

    public function PreUach()
    {
        return $this->belongsTo('App\PreUach','postulante'); //Id local
    }
}
