<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Contracts\Auth\Guard;
use App\DocumentoAdjunto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Noticia;
use App\NoticiasImg;
use App\User;

class NoticiasController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$noticias = Noticia::all();
		$user = User::all();
		return view('noticias.index', compact('noticias','user'));
		//return view('beneficios.index', compact('beneficios'));
	}

	public function getCrear()
	{
		return view('noticias.create');
	}

	public function postUploadImage(Request $request, Guard $auth)
	{
        $pathUser = 'noticias';
        \Storage::makeDirectory($pathUser);

        $Documento = $request->file('file');
        $nombre = $Documento->getClientOriginalName();

        $fullPath = $pathUser.'/'.$nombre;
        $noticiaImg = NoticiasImg::firstOrNew(['path' => $fullPath]);

        $noticiaImg->nombre = $nombre;
        $noticiaImg->autor = $auth->id();
        $noticiaImg->save();
        \Storage::disk('local')->put($fullPath,  \File::get($Documento));


        return response()->json([
                'link'=>'/documentos/'.$fullPath
                ]);

    }

    public function getDestroyImg(Request $request){
        $noticiaImg = NoticiasImg::findOrFail($request->get('id'));
        \Storage::delete($noticiaImg->path);


        $noticiaImg->delete();

    }

    public function postStore(Request $request, Guard $auth){
        
       	$noticia = new Noticia();
        
        $noticia->user = $auth->id();
        $noticia->titulo = $request->get('titulo');
        $noticia->resumen = $request->get('resumen');
        $noticia->cuerpo = $request->get('cuerpo_noticia');

        if (str_contains($noticia->cuerpo,'<img')){ //verifico que tenga imagen. de ser asi la identifico y la guardo en path
			$fullstring = $noticia->cuerpo;
    		$parsed = $this->get_string_between($fullstring, 'src="', '"');
    		$noticia->foto = $parsed;
        }
        else{
        	$noticia->foto = 'path';
        }

        $noticia->save();
        $message    = 'La noticia ha sido creada con éxito';
        \Session::flash('message1', $message);
        return redirect('/noticias')->with('message1', $message);

    }

    public function getEdit($id){

    	$id_noticia = $id;
    	$noticia = Noticia::findOrFail($id);
    	$titulo = $noticia->titulo;
    	$resumen = $noticia->resumen;
    	$cuerpo = $noticia->cuerpo;
        return view('noticias.edit',compact('titulo','resumen','cuerpo','id_noticia'));
    }

	public function getUpdate($id, Request $request){

        $noticia = Noticia::findOrFail($id);
        $noticia->titulo = $request->get('titulo');
        $noticia->resumen = $request->get('resumen');
        $noticia->cuerpo = $request->get('cuerpo_noticia');
        $noticia->save();
        $message    = 'La noticia ha sido editada con éxito';
        \Session::flash('message1', $message);
        return redirect('/noticias')->with('message1', $message);

    }

    public function getImg(Guard $auth){
        $noticiaImg = NoticiasImg::where('autor',$auth->id())
                                        ->where('path', 'like', 'noticias%')
                                        ->get();
        $arrayFinal = [];

        foreach ($noticiaImg as $item) {
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

function get_string_between($string, $start, $end){
    $string = ' ' . $string;
    $ini = strpos($string, $start);
    if ($ini == 0) return '';
    $ini += strlen($start);
    $len = strpos($string, $end, $ini) - $ini;
    return substr($string, $ini, $len);
}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
/*	public function getCreate()
	{
		return view('beneficios.create');
	}

	public function getBeneficios()
	{
		$beneficios = Beneficio::all();
		$arra = array('data'=>$beneficios->toArray());
		return json_encode($arra);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
/*	public function postStore(Request $request)
	{

		 $this->validate($request, [
        'nombre' => 'required|string|unique:beneficio,nombre',
    	]);
		 
		$beneficio = Beneficio::create($request->all());
		$message    = 'El beneficio '.$request->get('nombre').' se almacenó correctamente';
		return response()->json([
								'codigo' => 1,
								'message' => $message
								]);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
/*	public function postEdit($id)
	{
		$beneficio = Beneficio::findOrFail($id);
        return $beneficio->toJson();
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
/*	public function putUpdate($id,Request $request)
	{
	
		$this->validate($request, [
        'nombre' => 'required|string|unique:beneficio,nombre,'.$id,
    	]);

		$beneficio = Beneficio::findOrFail($id);
		$beneficio->nombre = $request->nombre;
        $beneficio->save();
		return response()->json([
								'codigo' => 1,
								'message'=> 'EL beneficio '.$request->nombre.' se editó correctamente'
								]);
        //return redirect()->route('beneficios.index');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postDestroy(Request $request)
	{
		//abort(500);
		$noticia = Noticia::findOrFail($request->get('id'));
 		$noticia->delete();
 		$message = ' La noticia '.$noticia->titulo.' ha sido eliminada';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);

		return redirect('noticias');

		//return redirect()->route('beneficios.index');
	}

}