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
                           'foto']; 



    //Una Noticia pertenece a un unico USER
    public function carreraR()
    {
    	return $this->belongsTo('App\Users','user'); //Id local
    }

}