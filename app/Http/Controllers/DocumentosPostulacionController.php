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

		dd($postulante->pregradosR->preUachsR->homologacionesR[$postulante->pregradosR->preUachsR->homologacionesR
			->count()-1]->asignaturaHomologadaR);
			foreach($postulante->documentoIdentidadR as $item)
			{
			}




}
    public function getUpload(){

        return view('documentosPostulacion.uploadFile');
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

	public function postStorageFiles(Request $request,Guard $auth){
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