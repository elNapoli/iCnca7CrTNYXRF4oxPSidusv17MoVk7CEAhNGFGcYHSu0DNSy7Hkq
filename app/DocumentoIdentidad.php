<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoIdentidad extends Model
{
    protected $table = 'documento_identidad';
    public $timestamps = false;
    protected $fillable = ['tipo',
    					   'numero'];

 

    public function Postulante()
    {
    	return $this->belongsTo('App\Postulante','id'); //Id local
    }

}
