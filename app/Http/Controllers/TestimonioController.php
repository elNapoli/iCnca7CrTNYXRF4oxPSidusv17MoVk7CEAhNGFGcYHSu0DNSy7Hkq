<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\postulante;
use App\DocumentoAdjunto;
use App\Testimonio;
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

    public function postUploadImage(Request $request, Guard $auth){
        $postulante = Postulante::where('user_id',$auth->id())->first();

        $pathUser = 'testimonios';
        \Storage::makeDirectory($pathUser);

        $Documento = $request->file('file');
        $nombre = $Documento->getClientOriginalName();

        $fullPath = $pathUser.'/'.$nombre;
        $docAdjunto = DocumentoAdjunto::firstOrNew(['path' => $fullPath]);

        $docAdjunto->nombre = $nombre;
        $docAdjunto->postulante = $postulante->id;
        $docAdjunto->save();
        \Storage::disk('local')->put($fullPath,  \File::get($Documento));


        return response()->json([
                'link'=>'/documentos/'.$fullPath
                ]);

    }


    public function postStore(Request $request, Guard $auth){
        
        $postulante = Postulante::where('user_id',$auth->id())->first();
        $testimonio = new Testimonio();

        $editor = $request->get('content');
        $testimonio->postulante =  $postulante->id;
        $testimonio->cuerpo = $editor;

        $testimonio->save();
        return view('testimonio.view',compact('editor'));

    }

    public function getImg(Guard $auth){
        $postulante = Postulante::where('user_id',$auth->id())->first();
        $docAdjunto = DocumentoAdjunto::where('postulante',$postulante->id)
                                        ->where('path', 'like', 'testimonios%')
                                        ->get();
        $arrayFinal = [];

        foreach ($docAdjunto as $item) {
            # code...
            $arrayFinal[] = array(
                    'url'=>'/documentos/'.$item->path,
                    'thumb'=>'/documentos/'.$item->path,
                    'tag'=> $item->nombre,
                    'id' => $item->id
                );
        }
       
        return json_encode($arrayFinal);

    }

    public function getDestroyImg(Request $request){
        $documentoP = DocumentoAdjunto::findOrFail($request->get('id'));
        \Storage::delete($documentoP->path);


        $documentoP->delete();

    }

        

}
