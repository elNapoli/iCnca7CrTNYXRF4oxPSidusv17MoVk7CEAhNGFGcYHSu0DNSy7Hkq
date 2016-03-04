<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentoAdjunto extends Model
{
    protected $table = 'documento_adjunto';
    public $timestamps = false;
    protected $fillable = ['nombre',
    					   'path',
                           'postulante'];

 

    public function Postulante()
    {
    	return $this->belongsTo('App\Postulante','id'); //Id local
    }

}
