<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactoExtranjero extends Model
{
    protected $table = 'contacto_extranjero';
    public $timestamps = false;
    protected $fillable = ['conocido_extranjero',
                           'direccion',
                           'telefono_1',
                           'telefono_2',
                           'nombre_seguro',
                           'validez_seguro',
                           'numero_seguro',
                           'nombre_hospital',
                           'direccion_hospital'];

 

    public function PreUach()
    {
    	return $this->belongsTo('App\PreUach','postulante'); //Id local
    }

}
