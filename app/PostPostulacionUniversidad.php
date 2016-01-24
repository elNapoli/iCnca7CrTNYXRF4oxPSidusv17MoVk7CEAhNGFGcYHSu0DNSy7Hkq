<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostPostulacionUniversidad extends Model
{
    protected $table      = 'post_postulacion_universidad';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['campus_sede','celular','procedencia'];


    // una postulación postgrado, solo puede  ser postulada a una universidad
    public function postgrado()
    {
        return $this->belongsTo('App\Postgrado','postulante');
    }

    
    public function campusSede()
    {
        return $this->belongsTo('App\CampusSede','campus_sede');
    }
}
