<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class InternetController extends Controller
{


    public function getGaleria(){

        return view('guest.galeria');
    }

    public function getAlojamiento(){

        return view('guest.Alojamiento');

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



}
