<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostOtroFinanciamiento extends Model
{
    protected $table      = 'post_otro_financiamiento';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['descripcion'];


    // una postulación postgrado, solo puede tener una descripción de otros financiamientos
    public function postgrado()
    {
        return $this->belongsTo('App\Postgrado','postulante');
    }
}
