<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TestimonioController extends Controller
{
    //


    public function getIndex(){

        return view('testimonio.index');
    }

    public function getCreate(){

        return view('testimonio.create');
    }

    public function postDebug(Request $request){

        $editor = $request->get('editor1');
        return view('testimonio.debug',compact('editor'));
    }
}
