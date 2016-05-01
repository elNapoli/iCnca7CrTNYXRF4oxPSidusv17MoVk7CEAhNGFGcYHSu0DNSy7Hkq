<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class noticia extends Model
{
    protected $table = 'noticias';
    public $timestamps = true;
    protected $fillable = ['user',
                           'cuerpo',
                           'resumen',
                           'titulo',
                           'foto',
                           'carousel']; 



    //Una Noticia pertenece a un unico USER
    public function usuarioR()
    {
    	return $this->belongsTo('App\User','user'); //Id local
    }

}