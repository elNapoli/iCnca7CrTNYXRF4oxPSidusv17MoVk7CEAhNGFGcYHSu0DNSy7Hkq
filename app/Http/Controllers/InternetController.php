<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Noticia;
use App\User;

class InternetController extends Controller
{


    public function getGaleria(){

        return view('guest.galeria');
    }

    public function getAlojamiento(){

        return view('guest.alojamiento');

    }

    public function getVisa(){
        return view('guest.visa');

    }

    public function getMision(){
        return view('guest.mision');


    }
    public function getVision(){
        return view('guest.vision');



    }

    public function getContacto(){

        return view('guest.contacto');



    }
    public function getTestimonios(){

        return view('guest.testimonios');

    }

    public function getNoticias(){

        $noticias = Noticia::all();
        $user = User::all();
        return view('guest.noticias.index', compact('noticias','user'));

    }
    public function getNoticiasView($id){

        dd($id);//vincular con vista de noticias guest dependiendo de la id (retornar vista)

    }

}
