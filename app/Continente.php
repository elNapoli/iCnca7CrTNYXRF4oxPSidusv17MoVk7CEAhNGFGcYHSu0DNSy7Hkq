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



    public static function gPostulantesByContinente(){

        $faker     = Faker::create();
        $continente = Continente::all();
        $total = [];

        foreach ($continente as $key => $value) {
            # code...
            $temp = $value->Pais;

            $sum = 0;
            foreach ($temp as $key2 => $value2) {
                # code...
                $sum+= $value2->postulantesR->count();
            }
            $total[] =$sum;

        }

 array_unshift($total,'Continentes');
        return $total;
    }

    public static function gUniversidadesByContinente(){

        $faker     = Faker::create();
        $continente = Continente::all();
        $total = [];

        foreach ($continente as $key => $value) {
            $temp = $value->universidadesR->count();


            $total[] = array(
                'label'=> $value->nombre,
                'value'=>$temp,
                'color' => $faker->hexcolor);

        }


        return $total;
    }

    public static function gPaisesByContinente(){
        $faker     = Faker::create();
        $continente = Continente::all();
        $total = [];

        foreach ($continente as $key => $value) {
            $temp = $value->Pais->count();


            $total[] = array(
                'label'=> $value->nombre,
                'value'=>$temp,
                'color' => $faker->hexcolor);

        }


        return $total;

    }

    public static function gCiudadesByContinente(){
        $faker     = Faker::create();
        $continente = Continente::all();
        $total = [];

        foreach ($continente as $key => $value) {
            $temp = $value->ciudadesR->count();


            $total[] = array(
                'label'=> $value->nombre,
                'value'=>$temp,
                'color' => $faker->hexcolor);

        }


        return $total;

    }


}
