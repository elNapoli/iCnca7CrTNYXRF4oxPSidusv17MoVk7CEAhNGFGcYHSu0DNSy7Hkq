<?php namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Guard;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Postulante;
use App\DocumentoAdjunto;
use Illuminate\Http\Request;

class DocumentosAdjuntosController extends Controller {

	//


    public function postUpload(Request $request,Guard $auth){
        $postulante = Postulante::where('user_id',$auth->id())->first();
        $pathUser = 'postulante_'.$postulante->id;
        \Storage::makeDirectory($pathUser);


        $Documentos = $request->file('documentosAdjuntos');
        $count = 0;

        foreach($Documentos as $archivo) {

            $nombre = $archivo->getClientOriginalName();
            $nombre_input = $request->get('new_'.$count);
            $fullPath = $pathUser.'/'.$nombre;

            $docAdjunto = DocumentoAdjunto::firstOrNew(['path' => $fullPath]);;

            $docAdjunto->nombre = $nombre_input;
            $docAdjunto->postulante = $postulante->id;
            $docAdjunto->save();


            \Storage::disk('local')->put($fullPath,  \File::get($archivo));
            $count++;
        }
       return response()->json([
                'message'=> 'Conexión  realizada ctm'
                ]);
    }


}
