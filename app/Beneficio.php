<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    protected $table = 'beneficio';
    public $timestamps = false;
    protected $fillable = ['nombre'];



    public function detalleBeneficioR()
    {
    	return $this->belongsTo('App\DetalleBeneficio','id'); //Campo en tabla foranea
    }

}
