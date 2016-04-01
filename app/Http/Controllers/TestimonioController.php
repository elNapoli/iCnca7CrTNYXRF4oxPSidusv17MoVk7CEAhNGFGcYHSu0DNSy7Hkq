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

        $editor = $request->get('content');
        return view('testimonio.debug',compact('editor'));
    }

    public function postUploadImage(Request $request){
        $pathUser = 'testimonios';
        \Storage::makeDirectory($pathUser);

        $Documento = $request->file('file');
        $nombre = $Documento->getClientOriginalName();

        $fullPath = $pathUser.'/'.$nombre;

        \Storage::disk('local')->put($fullPath,  \File::get($Documento));


        return response()->json([
                'link'=>'/documentos/'.$fullPath
                ]);

    }

        

}
