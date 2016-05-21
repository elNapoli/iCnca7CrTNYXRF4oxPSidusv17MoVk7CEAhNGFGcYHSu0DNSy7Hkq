<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OtraMaestria extends Model
{
    protected $table      = 'otra_maestria';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['nombre',
                            'laboratorio',
                            'contacto_uach',
                            'instituto',
                            'facultad'];

    // un Postulante esta en una ciudad
  /*  public function maestriPostulacion()
    {
        return $this->belongsTo('App\MaestriaPostulacion','postulante');
    }*/

    public function FACULTAD()
    {
        return $this->belongsTo('App\Facultad','facultad');
    }
}
