<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Universidad extends Model
{
    protected $table     = 'universidad';
    public $timestamps   = false;
    protected $fillable = ['nombre'];

    public function convenios()
    {
        return $this->hasMany('App\Convenio','universidad');
    }

    public function campusSedes()
    {
        return $this->hasMany('App\CampusSede','universidad');
    }


    public static getInformacionUniversidad($idUniversidad){

        return Ciudad::join('campsus_sede','universidad.id','campsus_sede.universidad')->get();
    }
}
