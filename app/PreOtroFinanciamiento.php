<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreOtroFinanciamiento extends Model
{
    protected $table      = 'pre_otro_financiamiento';
    public $timestamps    = false;
    protected $primaryKey = 'pre_postulacion_universidad';
    protected $fillable   = ['descripcion'];

    // un Postulante esta en una ciudad
    public function prePostulacionUniversidad()
    {
        return $this->belongsTo('App\PrePostulacionUniversidad','pre_postulacion_universidad');
    }
}
