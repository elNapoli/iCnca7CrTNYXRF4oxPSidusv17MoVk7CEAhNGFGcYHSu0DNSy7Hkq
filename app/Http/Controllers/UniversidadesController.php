<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\CreateUniversidadRequest;
use App\Http\Requests\EditUniversidadRequest;
use App\Http\Requests\CreateCampusRequest;
use Illuminate\Contracts\Auth\Guard;
use App\Universidad;
use App\CampusSede;
use Illuminate\Http\Request;
use App\Continente;
use Faker\Factory as Faker;
use App\Ciudad;

class UniversidadesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */


	public function getDebug(Guard $user){
	 	
		        $universidad = Universidad::all();
        $faker = Faker::create();


        foreach ($universidad as $item){

            $numBeneficio = $faker->numberBetween($min = 1, $max = 5);
            for($i = 0; $i < $numBeneficio; $i++)
            {
                $CampusSede = new CampusSede();

                $CampusSede->nombre    		= $faker->firstName($gender = null|'male'|'female');
                $CampusSede->telefono   	= $faker->phoneNumber;
                $CampusSede->fax 			= $faker->phoneNumber;
                $CampusSede->sitio_web		= $faker->url;
                $CampusSede->universidad	= $item->id;

                $ciudades = Ciudad::where('pais',$item->pais)->get();
                $id_ciudad = array();
                foreach ($ciudades as $key ) {
                    $id_ciudad[] =$key->id;
             
                }

                $CampusSede->ciudad	= $id_ciudad[$faker->numberBetween($min = 0, $max = count($id_ciudad)-1)];

                
                $CampusSede->save();

            }
        }

	}
	public function getIndex()
	{
 		return view('universidades.index');
	}


	public function postUniversidadByPais(Request $request){

		if($request->ajax()){

		 	

			return Universidad::where('pais',$request->get('idBuscar'))->with('campusSedesR')->get()->toJson();
			
		}
		else{

			return "no ajax";
		}
	
	}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getUniversidadCampus()
	{
		$universidades = Universidad::with('campusSedesR.ciudadR')->orderBy("id")->get();
		
		$arra = array('data'=>$universidades->toArray());
		return json_encode($arra);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postStore(CreateUniversidadRequest $request)
	{
		if($request->ajax()){
			$universidad         = new Universidad();
			$universidadID = $universidad->insertGetId(array('nombre'=> $request->get('nombre_universidad'),'pais'=> $request->get('pais')));

			$campus_sede = new CampusSede($request->all());
			$campus_sede->universidad = $universidadID;
			$campus_sede->ciudad = $request->get('ciudad');
			$campus_sede->direccion = $request->get('direccion');

			$campus_sede->save();
			\Session::flash('message', 'se Guardó la universidad Correctamente');
			return response()->json([
				'message'=> 'se Guardó la universidad Correctamente'
				]);

		}
		else
		{

			return "no ajax";
		}




	}

	public function postStoreCampus(CreateCampusRequest $request){
		if($request->ajax()){
				$camp  = CampusSede::create($request->all());
				$campusByUniversidad = CampusSede::where('universidad',$request->get('universidad'))->orderBy('id','desc')->get();
			return $campusByUniversidad->toJson();

		}
		else
		{

			return "no ajax";
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getCreate()
	{
		$continentes = Continente::lists('nombre','id');
		return view('universidades.create',compact('continentes'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getEdit($id)
	{

		$continentes = Continente::lists('nombre','id');
		$idUniversidad = $id;
		//dd(Universidad::where('id',$id)->with('campusSedesR.ciudadR.paisR.continenteR')->get()->toArray());
		$infoUniversidad = Universidad::where('id',$id)->with('campusSedesR.ciudadR.paisR.continenteR')->get()->toJson();
		//return($infoUniversidad->toJson());
		return view('universidades.edit',compact('continentes','infoUniversidad','idUniversidad'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postUpdate(Request $request)
	{
		if($request->ajax()){
			$json =json_decode($request->get('infoUniversidad'));
			$id_universidad = $json[0]->id_universidad;
			$universidad = Universidad::findOrFail($id_universidad);
			$universidad->nombre =  $json[0]->nombre_universidad;
			$universidad->save();

			foreach ($json as $key => $value) {
				$campus_sede = CampusSede::findOrFail($json[$key]->id);

				$campus_sede->nombre    = $json[$key]->nombre;
				$campus_sede->telefono  = $json[$key]->telefono;
				$campus_sede->fax       = $json[$key]->fax;
				$campus_sede->sitio_web = $json[$key]->sitio_web;
				$campus_sede->ciudad    = $json[$key]->ciudad;
				$campus_sede->direccion = $json[$key]->direccion;

				$campus_sede->save();

			}
			return response()->json([
				'message'=> 'la Universidad se actualizó correctamente'
				]);

		}
		else
		{

			return "no ajax";
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteDestroy($id, Request $request)
	{
		//abort(500);
		$universidad = Universidad::findOrFail($id);
 		$universidad->delete();
 		$message = ' La universidad '.$universidad->nombre.' Fue eliminado';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);


		//return redirect()->route('paises.index');
		return redirect('universidades');

	}

	public function deleteDestroyCampus($id, Request $request)
	{
		//abort(500);
		$universidad = CampusSede::findOrFail($id);
 		$universidad->delete();
 		$message = ' El campus '.$universidad->nombre.' Fue eliminado';
 	//	dd($request->all());
		if($request->ajax()){
		//	return($message);
			return response()->json([
				'message'=> $message
				]);
		}
		
		
		\Session::flash('message', $message);


		//return redirect()->route('paises.index');
		return redirect('universidades');

	}

}
