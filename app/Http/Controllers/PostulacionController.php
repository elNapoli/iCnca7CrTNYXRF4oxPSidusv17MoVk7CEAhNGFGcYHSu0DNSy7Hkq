<?php namespace App\Http\Controllers;

use App\Http\Requests\CretePostulacionRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Continente;
use Illuminate\Contracts\Auth\Guard;
use App\Postulante;
use App\PreUach;
use App\CampusSede;
use App\PreNoUach;
use App\PreUEstudioActual;
use App\PreNuEstudioActual;
use App\Postgrado;
use App\Pais;
use App\User;
use App\Ciudad;
use App\Pregrado;
use App\Facultad;
use App\DocumentoIdentidad;
use Illuminate\Http\Request;

class PostulacionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$continentes = Continente::lists('nombre','id')->all();

		return view('postulacion.index',compact('continentes'));
	}
	public function getIndexStep(Guard $auth){
		$indexStep = 0;
		$postulante = Postulante::where('user_id',$auth->id())->get();
		$indexStep = $postulante->count();
		//dd($postulante);
		if($indexStep != 0){
			//dd( (bool)(PreUEstudioActual::where('postulante',$postulante->first()->id)->get()->count()));
			$bool1 = (bool)(PreNUEstudioActual::where('postulante',$postulante->first()->id)->get()->count());
			$bool2 = (bool)(PreUEstudioActual::where('postulante',$postulante->first()->id)->get()->count());
			
			$indexStep = $indexStep +(int)($bool1 or $bool2);
		}

		return response()->json([
				'indexStep'=> $indexStep
				]);
	}

	public function getNomina()
	{
		$campus = CampusSede::where('universidad','1')->get()->lists('nombre','id')->toArray();
		return view('postulacion.view_admin.nomina',compact('campus'));
	}

	public function postGenerarNomina(Request $request){	
		
		$temp = PreUach::nomina($request->get('campusSede'),$request->get('facultad'))->get()->toArray();
		$arra = array('data'=>$temp);
		return json_encode($arra);

	}

	public function getCreateOrEdit(Guard $auth){
		$postulante = Postulante::with('ciudadR.paisR')->where('user_id',$auth->id())->first();
		$continentes = Continente::lists('nombre','id')->all();	
	
		//dd($postulante->toArray());
		$documentoIdentidad = 0;
		$status = 0;
		$paises = array(null=>'Seleccione un país');
		$ciudades = array(null=>'seleccione una ciudad');
		if($postulante){
			$paises = Pais::where('continente',$postulante->ciudadR->paisR->continente)->orderBy('nombre')->lists('nombre','id')->all();
			$ciudades = Ciudad::where('pais',$postulante->ciudadR->paisR->id)->orderBy('nombre')->lists('nombre','id')->all();
			$status	 = 1;
			$postulante->documentoIdentidades;
			$parametros = array(
								'id_postulante' => $postulante->id,
								'pais' => $postulante->ciudadR->paisR->id,
							    "tipo" => $postulante->documentoIdentidadR->first()->tipo,
							    'numero' =>  $postulante->documentoIdentidadR->first()->numero,
							    'continente' => $postulante->ciudadR->paisR->continente,							   
							);
			if($postulante->tipo_estudio ==='Pregrado'){

				$postulante->pregradosR;
				$parametros['procedencia'] = $postulante->pregradosR->procedencia;
				//verificar si el postulante es de la UACh o no.
				if($postulante->pregradosR->procedencia ==='UACH'){

					$postulante->pregradosR->preUachsR;
					$parametros['email_institucional'] = $postulante->pregradosR->preUachsR->email_institucional;
					$parametros['grupo_sanguineo'] = $postulante->pregradosR->preUachsR->grupo_sanguineo;
					$parametros['enfermedades'] = $postulante->pregradosR->preUachsR->enfermedades;
					$parametros['telefono_2'] = $postulante->pregradosR->preUachsR->telefono;
					$parametros['direccion_2'] = $postulante->pregradosR->preUachsR->direccion;
					$parametros['ciudad_2'] = $postulante->pregradosR->preUachsR->ciudad;

				

				}

			}
			else{
				$postulante->postgradosR;
				$parametros['procedencia'] = $postulante->postgradosR->procedencia;
				$parametros['titulo_profesional'] = $postulante->postgradosR->titulo_profesional;

				//en contrucción


			}



			$postulante = array_merge($postulante->toArray(),$parametros);  
			return view('postulacion.datos_personales.edit',compact('postulante','continentes','paises','ciudades'));
		}
		else{

			return view('postulacion.datos_personales.create',compact('continentes','paises','ciudades'));
		}

	}

	public function getViewAdmin(){

		return view('postulacion.view_admin.index');
	}
	public function postStore(CretePostulacionRequest $request,Guard $auth){

		//guardo el usuario en la tabla postulante.
		$postulante = new Postulante();
		$postulante->fill($request->all());
		$postulante->user_id = $auth->id(); 
		$postulante->save();

		// se almacena el númer de documento que posee el estudiante.
		$documento = new DocumentoIdentidad();
		$documento->postulante = $postulante->id;
		$documento->tipo = $request->get('tipo');
		$documento->numero = $request->get('numero');
		$documento->save();

		// se verifica si el alumno va a postular a una carrera de pregrado o postgrado.
		if($request->get('tipo_estudio') === 'Pregrado'){

			$pregrado = new Pregrado();
			$pregrado->postulante = $postulante->id;
			$pregrado->procedencia = $request->get('procedencia');
			$pregrado->save();

			// se verifica si el estudiante es un alumno entrante o saliente.
			if($request->get('procedencia')==='UACH'){
				$preUach = new PreUach();
				$preUach->postulante = $postulante->id;
				$preUach->email_institucional = $request->get('email_institucional');
				$preUach->grupo_sanguineo = $request->get('grupo_sanguineo');
				$preUach->enfermedades = $request->get('enfermedades');
				$preUach->telefono = $request->get('telefono_2');
				$preUach->ciudad = $request->get('ciudad_2');
				$preUach->direccion = $request->get('direccion_2');
				$preUach->save();
				$mensaje ='Su postulación se almacenó Exitosamente('.$request->get('procedencia').').';


			}
			else{
				$preNoUach = new PreNoUach();
				$preNoUach->postulante = $postulante->id;
				$preNoUach->save();

				$mensaje ='Su postulación se almacenó Exitosamente('.$request->get('procedencia').').';
			}
			
		}

		else{
			$postgrado = new Postgrado();
			$postgrado->postulante = $postulante->id;
			$postgrado->procedencia = $request->get('procedencia');
			$postgrado->titulo_profesional = $request->get('titulo_profesional');
			$postgrado->save();
			$mensaje ='Su postulación se almacenó Exitosamente('.$request->get('procedencia').').';
			

		}




		return response()->json([
				'message'=> $mensaje
				]);
	}

	public function getPrueba(){
		$continentes = Continente::lists('nombre','id')->all();

		return view('postulacion.prueba',compact('continentes'));
	
	}

	public function getDatosPersonales($postulante){

		$postulante = Postulante::find($postulante);
		$arrayFinal = [];

		$arrayFinal[] = array('parametro' => 'APELLIDO PATERNO', 'valor'=>$postulante->apellido_paterno, 'peso'=>'1');
		$arrayFinal[] = array('parametro' => 'APELLIDO MATERNO', 'valor'=>$postulante->apellido_materno, 'peso'=>'2');
		$arrayFinal[] = array('parametro' => 'NOMBRE', 'valor'=>$postulante->nombre, 'peso'=>'3');
		$arrayFinal[] = array('parametro' => 'FECHA DE NACIMIENTO', 'valor'=>$postulante->fecha_nacimiento, 'peso'=>'4');
		$arrayFinal[] = array('parametro' => 'E-MAIL PERSONAL', 'valor'=>$postulante->email_personal, 'peso'=>'5');
		$arrayFinal[] = array('parametro' => 'TELÉFONO CASA', 'valor'=>$postulante->telefono, 'peso'=>'6');
		$arrayFinal[] = array('parametro' => 'PAÍS', 'valor'=>$postulante->ciudadR->paisR->nombre, 'peso'=>'7');
		$arrayFinal[] = array('parametro' => 'CIUDAD DE PROCEDENCIA', 'valor'=>$postulante->ciudadR->nombre, 'peso'=>'7');
		$arrayFinal[] = array('parametro' => 'DIRECCIÓN DE PROCEDENCIA', 'valor'=>$postulante->direccion, 'peso'=>'8');
		$arrayFinal[] = array('parametro' => 'NACIONALIDAD', 'valor'=>$postulante->nacionalidad, 'peso'=>'9');
		$arrayFinal[] = array('parametro' => 'LUGAR DE NACIMIENTO', 'valor'=>$postulante->lugar_nacimiento, 'peso'=>'10');
		$arrayFinal[] = array('parametro' => 'TIPO DE ESTUDIOS', 'valor'=>$postulante->tipo_estudio, 'peso'=>'11');

		$arra = array('data'=>$arrayFinal);
		return json_encode($arra);

	}
	public function getEstudiosActuales($postulante){
		$postulante = Postulante::find($postulante);
		$arrayFinal = [];
		if($postulante->tipo_estudio === 'Pregrado'){
			if($postulante->pregradosR->procedencia == 'UACH'){

				if($postulante->pregradosR->preUachsR->preUEstudioActualesR){

					$arrayFinal[] = array('parametro' => 'FACULTAD', 'valor'=>$postulante->pregradosR->preUachsR->preUEstudioActualesR->carreraR->facultadR->nombre, 'peso'=>'1');
					$arrayFinal[] = array('parametro' => 'CARRERA', 'valor'=>$postulante->pregradosR->preUachsR->preUEstudioActualesR->carreraR->nombre, 'peso'=>'1');
					$arrayFinal[] = array('parametro' => 'AÑO DE INGRESO', 'valor'=>$postulante->pregradosR->preUachsR->preUEstudioActualesR->anio_ingreso, 'peso'=>'1');
					$arrayFinal[] = array('parametro' => 'RANKING', 'valor'=>$postulante->pregradosR->preUachsR->preUEstudioActualesR->ranking, 'peso'=>'1');
					$arrayFinal[] = array('parametro' => 'BENEFICIOS', 'valor'=>$postulante->pregradosR->preUachsR->preUEstudioActualesR->beneficios, 'peso'=>'1');
				}
			}
			else{
				if($postulante->pregradosR->preNoUachsR->preNuEstudioActualesR){

					$arrayFinal[] = array('parametro' => 'PAIS', 'valor'=>$postulante->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->universidadR->paisR->nombre, 'peso'=>'1');
					$arrayFinal[] = array('parametro' => 'NOMBRE UNIVERSIDAD', 'valor'=>$postulante->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->universidadR->nombre, 'peso'=>'1');
					$arrayFinal[] = array('parametro' => 'NOMBRE DEL CAMPUS', 'valor'=>$postulante->pregradosR->preNoUachsR->preNuEstudioActualesR->campusSedeR->nombre, 'peso'=>'1');
					$arrayFinal[] = array('parametro' => 'ÁREA DE ESTUDIO', 'valor'=>$postulante->pregradosR->preNoUachsR->preNuEstudioActualesR->area, 'peso'=>'1');
					$arrayFinal[] = array('parametro' => 'AÑOS CURSADOS', 'valor'=>$postulante->pregradosR->preNoUachsR->preNuEstudioActualesR->anios_cursados, 'peso'=>'1');

				}


			}
		}
		else{
			if($postulante->postgradosR->procedencia == 'UACH'){

			}
			else{

				
			}



		}
		$arra = array('data'=>$arrayFinal);
		return json_encode($arra);

	}

	public function getInformacionIntercambio($postulante){
		$postulante = Postulante::find($postulante);
		$arrayFinal = [];
		if($postulante->tipo_estudio === 'Pregrado'){
			if($postulante->pregradosR->prePostulacionUniversidadesR){


				$arrayFinal[] = array('parametro' => 'AÑO', 'valor'=>$postulante->pregradosR->prePostulacionUniversidadesR->anio, 'peso'=>'1');
				$arrayFinal[] = array('parametro' => 'SEMESTRE', 'valor'=>$postulante->pregradosR->prePostulacionUniversidadesR->semestre, 'peso'=>'1');
				$arrayFinal[] = array('parametro' => 'DESDE', 'valor'=>$postulante->pregradosR->prePostulacionUniversidadesR->desde, 'peso'=>'1');
				$arrayFinal[] = array('parametro' => 'HASTA', 'valor'=>$postulante->pregradosR->prePostulacionUniversidadesR->hasta, 'peso'=>'1');
				$arrayFinal[] = array('parametro' => 'CARRERA', 'valor'=>$postulante->pregradosR->prePostulacionUniversidadesR->carreraR->nombre, 'peso'=>'1');
			}	

		}
		else{


		}

		$arra = array('data'=>$arrayFinal);
		return json_encode($arra);

	}
	public function getDatosProcedencia($postulante){

		$postulante = Postulante::find($postulante);
		$arrayFinal = [];
		if($postulante->tipo_estudio === 'Pregrado'){
			if($postulante->pregradosR->procedencia == 'UACH'){

				$arrayFinal[] = array('parametro' => 'PROCEDENCIA', 'valor'=>$postulante->pregradosR->procedencia, 'peso'=>'1');
				$arrayFinal[] = array('parametro' => 'E-MAIL INSTITUCIONAL', 'valor'=>$postulante->pregradosR->preUachsR->email_institucional, 'peso'=>'1');
				$arrayFinal[] = array('parametro' => 'GRUPO SANGUÍNEO', 'valor'=>$postulante->pregradosR->preUachsR->grupo_sanguineo, 'peso'=>'1');
				$arrayFinal[] = array('parametro' => 'ENFERMEDADES', 'valor'=>$postulante->pregradosR->preUachsR->enfermedades, 'peso'=>'1');
				$arrayFinal[] = array('parametro' => 'TELÉFONO PERSONAL ', 'valor'=>$postulante->pregradosR->preUachsR->telefono, 'peso'=>'1');
				$arrayFinal[] = array('parametro' => 'CIUDAD ACTUAL', 'valor'=>$postulante->pregradosR->preUachsR->direccion, 'peso'=>'1');
				$arrayFinal[] = array('parametro' => 'DIRECCIÓN ACTUAL', 'valor'=>$postulante->pregradosR->preUachsR->ciudadR->nombre, 'peso'=>'1');

			}
			else{

				$arrayFinal[] = array('parametro' => 'PROCEDENCIA', 'valor'=>$postulante->pregradosR->procedencia, 'peso'=>'1');

			}

		}
		else{

			$arrayFinal[] = array('parametro' => 'PROCEDENCIA', 'valor'=>$postulante->postgradosR->procedencia, 'peso'=>'1');
			$arrayFinal[] = array('parametro' => 'TÍTULO PROFESIONAL', 'valor'=>$postulante->postgradosR->titulo_profesional, 'peso'=>'1');

		}

		$arra = array('data'=>$arrayFinal);
		return json_encode($arra);


	}
	public function postSearchPostulante(Request $request){
		
		$documento = DocumentoIdentidad::where('numero',$request->get('rut'))->first();
		if ($documento==null){
		    return response()->json([
                        'existe' => '0'
                        ]);
		} else {
		    return response()->json([
		    			'existe' => '1',
                        'user'=> $documento->Postulante->usuarioR,
                        'documentos'=> $documento->Postulante->documentoAdjuntos,
                        'postulante'=> $documento->Postulante->id
                        ]);
		}
		


	}
	public function putUpdate(CretePostulacionRequest $request,Guard $auth){

		$postulante = Postulante::firstOrNew(array('user_id'=> $auth->id()));
		$mensaje = '';
	

		if($postulante->tipo_estudio === 'Pregrado'){
			if($request->get('Postgrado')){

				Pregrado::find($postulante->id)->delete();
				
			}
			elseif($postulante->pregradosR->procedencia === 'UACH' and $request->get('procedencia') === 'NO UACH'){

				//dd('el WN SE CAMBIO de uach a no uach');
				PreUach::find($postulante->id)->delete();
				
			}
			elseif($postulante->pregradosR->procedencia === 'NO UACH' and $request->get('procedencia') === 'UACH'){
				
				PreNoUach::find($postulante->id)->delete();

			}


		}	
		elseif($postulante->tipo_estudio === 'Postgrado' and $request->get('Pregrado')){
			Postgrado::find($postulante->id)->delete();
			

		}


		$postulante->fill($request->all());
		$postulante->save();

		$documento = DocumentoIdentidad::where('postulante',$postulante->id)->first();
		$documento->fill($request->all());
		$documento->save();


		// se verifica si el alumno va a postular a una carrera de pregrado o postgrado.
		if($request->get('tipo_estudio') === 'Pregrado'){

			$pregrado =  Pregrado::firstOrNew(array('postulante'=> $postulante->id));
			$pregrado->procedencia = $request->get('procedencia');
			$pregrado->save();

			// se verifica si el estudiante es un alumno entrante o saliente.
			if($request->get('procedencia')==='UACH'){
				$preUach =  PreUach::firstOrNew(array('postulante'=> $postulante->id));
				$preUach->email_institucional = $request->get('email_institucional');
				$preUach->grupo_sanguineo = $request->get('grupo_sanguineo');
				$preUach->enfermedades = $request->get('enfermedades');
				$preUach->telefono = $request->get('telefono_2');
				$preUach->ciudad = $request->get('ciudad_2');
				$preUach->direccion = $request->get('direccion_2');
				$preUach->save();

			}
			else{
		
				$preNoUach =  PreNoUach::firstOrCreate(array('postulante'=> $postulante->id));
				//$preNoUach->save();

			}
			$mensaje = 'Su postulación se actualizó correctamente('.$request->get('tipo_estudio') .')';
			
		}

		else{

			$postgrado =  Postgrado::firstOrNew(array('postulante'=> $postulante->id));
			$postgrado->procedencia = $request->get('procedencia');
			$postgrado->titulo_profesional = $request->get('titulo_profesional');
			$postgrado->save();
			$mensaje = 'Su postulación se actualizó correctamente('.$request->get('tipo_estudio') .')';
			

		}
		return response()->json([
				'message'=> $mensaje
				]);

		
	}

}
