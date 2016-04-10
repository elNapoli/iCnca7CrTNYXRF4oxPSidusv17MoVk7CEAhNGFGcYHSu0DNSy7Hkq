<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;
class Continente extends Model
{
    protected $table = 'continente';
    public $timestamps = false;
    protected $fillable = ['nombre'];


    public function Pais()
    {
    	return $this->hasMany('App\Pais','continente','id'); //Campo en tabla foranea
    }

    public function ciudadesR(){

        return $this->hasManyThrough('App\Ciudad', 'App\Pais', 'continente', 'pais');
    }
    public function universidadesR(){

        return $this->hasManyThrough('App\Universidad', 'App\Pais', 'continente', 'pais');
    }

    public function getChildrenAttribute(){

        $temp = $this->Pais;
        $sum = 0;
        foreach ($temp as $key => $value) {
            # code...
            $sum += $value->children;
        }

        return $sum;
    }


}
