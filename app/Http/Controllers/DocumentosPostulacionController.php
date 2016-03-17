<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Asignatura;
use App\DocumentoAdjunto;
use App\Postulante;
use App\Universidad;
use App\CampusSede;
use App\Facultad;
use App\Carrera;
use App\User;
use App\Convenio;

class DocumentosPostulacionController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function getPrueba(Guard $auth)
	{
		$post = Postulante::where('user_id',$auth->id())->get(); //objeto post con informacion extra
		$postulante = Postulante::findOrFail($post[0]->id); //individualizo al postulante

		dd($postulante->pregradosR->prePostulacionUniversidadesR->semestre);
			foreach($postulante->documentoIdentidadR as $item)
			{
			}





}
    public function getUpload(Guard $auth){

        $postulante = Postulante::where('user_id',$auth->id())->first();

        $documentos = DocumentoAdjunto::where('postulante',$postulante->id)->get();
 


        return view('documentospostulacion.uploadFile');
    }
	public function getIndex(Guard $auth)
	{
		if(!$auth->id())
		{
			dd('No esta logeado');
		}
		else{
			$post = Postulante::where('user_id',$auth->id())->get(); //objeto post con informacion extra
			$postulante = Postulante::findOrFail($post[0]->id); //individualizo al postulante
			$procedencia = $postulante->pregradosR->procedencia;
			return view('documentospostulacion.index',compact('procedencia'));
		}

	}
    public function getAllFiles(Guard $auth){

        $postulante = Postulante::where('user_id',$auth->id())->first(); 

        $documentos = DocumentoAdjunto::where('postulante', $postulante->id)->get();
        return $documentos->toJson();
    }


    public function postFileDestroy(Request $request){
        $documentoP = DocumentoAdjunto::findOrFail($request->get('key'));
        \Storage::delete($documentoP->path);


        $documentoP->delete();

        return response()->json([
                        'message'=> 'El documento se ha eliminado exitosamente.'
                        ]);
    }
	public function postStorageFiles(Request $request,Guard $auth){
     /*   $postulante = Postulante::where('user_id',$auth->id())->first();


        $Documentos = $request->file('documentosAdjuntos');
        $count = 0;

        $destino_path = public_path().'\documentos\postulante_'.$postulante->id;
        foreach($Documentos as $archivo) {

            $url_imagen = \Hash::make($archivo->getClientOriginalName());
            $path_file = $url_imagen.'.'.$archivo->guessExtension();
            //$path_file = str_replace('/', '0', $path_file);
       
            $subir = $archivo->move($destino_path, $destino_path);

            dd($path_file);
            //dd($url_imagen.'__________'.$path_file);
            
            $nombre_input = $request->get('new_'.$count);


            $docAdjunto = DocumentoAdjunto::firstOrNew(['nombre' => $nombre_input,'postulante'=>$postulante->id]);;
            $docAdjunto->path = $path_file;
            $docAdjunto->save();



            $count++;
        }
       return response()->json([
                'message'=> 'Conexión  realizada ctm'
                ]);*/


        $postulante = Postulante::where('user_id',$auth->id())->first();
        $pathUser = 'postulante_'.$postulante->id;


        \Storage::makeDirectory($pathUser);
        $Documentos = $request->file('documentosAdjuntos');
        $count = 0;


        foreach($Documentos as $archivo) {
            $nombre = \Hash::make($archivo->getClientOriginalName());
            $nombre = str_replace('/', 'Y', $nombre);
            $nombre = $nombre.'.'.$archivo->guessExtension();

            
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