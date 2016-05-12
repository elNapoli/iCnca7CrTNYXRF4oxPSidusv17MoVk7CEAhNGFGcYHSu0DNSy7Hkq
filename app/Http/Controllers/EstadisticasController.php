<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Continente;
use App\Pais;
use App\Ciudad;
use App\Procedencia;
use App\Genero;
use App\Postulante;
use App\Universidad;
use App\Funciones\DataGraphic;


class EstadisticasController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function getIndex()
    {
        $algo = new DataGraphic();
       /*
        $arrayFinal = array('name'=> 'Postulantes',
                            'size' => Postulante::all()->count(),
                            'children'=> $algo->recursiva('continente','1','asdf','m'));
        dd(json_encode($arrayFinal));
      
        */
        $arrayFinal = array('name'=> 'Universidades',
                            'size' => Universidad::all()->count(),
                            'children'=> $algo->recursiva_universidad('continente','1','inicial'));
        dd(json_encode($arrayFinal));
        $arrayFinal = array('name'=> 'Postulantes',
                            'size' => Postulante::all()->count(),
                            'children'=> $algo->recursiva_estudio('tipo_estudio','1','inicio','inicio','inicio'));
        dd(json_encode($arrayFinal));
    }

    public function getPrueba(){



      //  dd(Ciudad::where('id','1')->first()->postulante()->where('sexo','f')->count());




        return view('estadisticas.grafico_05');
    }



    public function generarExcel(){



        


$deto = Continente::todo()->toArray();



$data = array(
    array('','','','Reporte estadístico de postulante'),
    array('Oficina de Movilidad Estudiantil'),
    array('Vicerrectoría Académica'),
    array('Universidad Austral de Chile'),
    array('Campus Isla Teja'),
    array('Av. Presidente Carlos Ibáñez del Campo S/N'),
    array('Vicerrectoría Académica, piso 2, Of. 5'),
    array('Valdivia  - Chile'),
    array(date("d-m-Y")),
    array(''),
    array(''),
    array(''),
    array('Datos de origen','','','','Datos personales','','','','','','','','','','Estudio de origen de Pregrado','','',''
        ,'','','','','','','','','','','','','','','','Información de estudios a postular','','','','','','','Información de postgrado'),
    array('','','','','','','','','','','','','','','','','Alumnos UACh','','','','','','','','','','','','','Alunos No UACh',
        '','','','','','','','','','','','Maestria actual','','','','','','','Maestria a postular'),
    array('Continente','País','Ciudad','Código Postal','Apellido paterno','Apellido materno,','Nombre','Género',
                'Nacionalidad','Fecha de nacimiento','Lugar de nacimiento','Teléfono','E-mail personal','Dirección',
                'Tipoi de estudio','Procedencia de Pregrado','E-mail institucional',' Grupo sanguíneo ','Enfermedades',
                'Teléfono de procedencia','Dirección de procedencia','Ciudad de procedencia',
                'Universidad','Campus/Sede','Facultad','Carrera','Año de ingreso','Ranking','Beneficios',
                'Universidad','Campus/sede','Área','Años cursados','Universidad de destino','Campus/sede','Facultad','Carrera',
                'Año de postulación','Desde','Hasta','Procedencia de Postgrado','Título profesional','Nombre Maestria','Nombre director/tutor',
                'Cargo director/tutor','E-mail director/tutor','Teléfono secretaria','área de la maestria ','Año de postulación',
                'Semestre','Desde','Hasta','tipo','Universidad','Campus')
);
\Excel::create('Estadisticas', function($excel) use($data,$deto) {



    $excel->setCreator('Sitio Web Movilidad Estudiantil')
            ->setTitle('Reporte estadístico')
            ->setCompany('Universidad Austral de Chile');


    $excel->sheet('Estadísticas', function($sheet) use($data,$deto) {

        $sheet->setHorizontalCentered(true);
        $sheet->setVerticalCentered(true);
        $sheet->setAutoFilter('A15:BC15');
        
        $sheet->mergeCells('A13:D14');
        $sheet->mergeCells('E13:N14');

        $sheet->mergeCells('O13:AG13');
        $sheet->mergeCells('Q14:AC14');

        $sheet->mergeCells('AD14:AG14');
        $sheet->mergeCells('AH13:AN14');

        $sheet->mergeCells('AO13:BC13');
        $sheet->mergeCells('AP14:AV14');
        $sheet->mergeCells('AW14:BC14');

        $sheet->setHeight(1, 40);
        $sheet->setFreeze('A16');
        $sheet->setAutoSize(true)->setBorder('A13:BC15','medium');



        $sheet->fromArray($data, null, 'A1', false, false);
        $sheet->fromArray($deto, null, 'A1', false, false);

        // Set auto size for sheet

        $sheet->setStyle(array(
    'font' => array(
        'name'      =>  'Calibri',
        'size'      =>  10,
        ''

    ),
    'styles'=> array(

        'background'=> '#000'
        )
));

        $sheet->cells('A2:B9', function($cells) {
            $cells->setFontSize(7);
            $cells->setFontWeight('bold');
        });
                
        $sheet->cells('D1', function($cells) {
            $cells->setFontWeight('bold');
            // Set font size
            $cells->setFontSize(16);
            
        });

        
        $sheet->cells('A13:BC15', function($cells) {
            $cells->setFontWeight('bold');
            $cells->setAlignment('center');
            $cells->setValignment('middle');
            
        });




    });


})->export('xls');
    }



  


}
