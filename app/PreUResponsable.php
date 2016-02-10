<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreUResponsable extends Model
{
    protected $table    = 'pre_u_responsable';
    public $timestamps  = false;
    protected $fillable = ['tipo',
                            'postulante',
                            'nombre',
                            'telefono_1',
                            'telefono_2',
                            'parentesco',
                            'email',
                            'direccion'];

    // un Postulante esta en una ciudad
    public function preUach()
    {
        return $this->belongsTo('App\PreUach','postulante');
    }
}
