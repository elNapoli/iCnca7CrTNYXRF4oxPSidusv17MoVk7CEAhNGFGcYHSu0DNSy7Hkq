    <div id="cab">1 - DATOS PERSONALES</div>
    	<div class="datos">

    	<table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="18" class="no">Apellido paterno</th>
            <th colspan="32" class="desc">{{$p->apellido_paterno}}</th>
            <th colspan="18" class="no">Aepllido materno</th>
            <th colspan="32" class="desc">{{$p->apellido_materno}}</th>
          </tr>
          <tr>
            <th colspan="10" class="no">Nombres</th>
            <th colspan="50" class="desc">{{$p->nombre}}</th>
            <th colspan="22" class="no">Fecha de Nacimiento</th>
            <th colspan="18" class="desc">{{$p->fecha_nacimiento}}</th>
          </tr>
          <tr>
            <th colspan="22" class="no">Documento Nacional</th>
            <th colspan="46" class="desc">{{$p->documentoIdentidadR[0]->numero}}</th>
            <th colspan="10" class="no">Edad</th>
            <th colspan="6" class="desc">{{$edad}}</th>
            <th colspan="10" class="no">Sexo</th>
            @if($p->sexo = 'm')
              <th colspan="6" class="desc">M</th>
            @elseif($p->sexo = 'f')
              <th colspan="6" class="desc">F</th>
              @endif
          </tr>
          <tr>
            <th colspan="18" class="no">Nacionalidad</th>
            <th colspan="28" class="desc">{{$p->nacionalidad}}</th>
            <th colspan="22" class="no">Lugar de nacimiento</th>
            <th colspan="32" class="desc">{{$p->lugar_nacimiento}}</th>
          </tr>
          <tr>
            <th colspan="17" class="no">Direccion actual</th>
            <th colspan="45" class="desc">{{$p->pregradosR->preUachsR->direccion}}</th>
            <th colspan="15" class="no">Ciudad</th>
            <th colspan="23" class="desc">{{$p->pregradosR->preUachsR->ciudadR->nombre}}</th>
          </tr>
           <tr>
            <th colspan="17" class="no">Direccion origen</th>
            <th colspan="45" class="desc">{{$p->direccion}}</th>
            <th colspan="15" class="no">Ciudad</th>
            <th colspan="23" class="desc">{{$p->ciudadR->nombre}}</th>
          </tr>
          <tr>
            <th colspan="20" class="no">E-mail personal</th>
            <th colspan="30" class="desc">{{$p->email_personal}}</th>
            <th colspan="20" class="no">E-mail institucional</th>
            <th colspan="30" class="desc">{{$p->pregradosR->preUachsR->email_institucional}}</th>
          </tr>
          <tr>
            <th colspan="20" class="no">Telefono casa</th>
            <th colspan="30" class="desc">{{$p->telefono}}</th>
            <th colspan="20" class="no">Telefono movil</th>
            <th colspan="30" class="desc">{{$p->pregradosR->preUachsR->telefono}}</th>
          </tr> 
          <tr>
            <th colspan="20" class="no">Enfermedades</th>
            <th colspan="45" class="desc">{{$p->pregradosR->preUachsR->enfermedades}}</th>
            <th colspan="20" class="no">Grupo sanguineo</th>
            <th colspan="15" class="desc">{{$p->pregradosR->preUachsR->grupo_sanguineo}}</th>
          </tr>            
        </tbody>
      </table>
    	</div>
    <div id="cab">1.1 - CONTACTO EN CASO DE EMERGENCIA</div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="15" class="no">Nombre</th>
            <th colspan="35" class="desc">{{$p->pregradosR->preUachsR->preURespnsablesR[0]->nombre}}</th>
            <th colspan="15" class="no">Parentesco</th>
            <th colspan="35" class="desc">{{$p->pregradosR->preUachsR->preURespnsablesR[0]->parentesco}}</th>            
          </tr>
          <tr>
            <th colspan="20" class="no">Direccion</th>
            <th colspan="80" class="desc">{{$p->pregradosR->preUachsR->preURespnsablesR[0]->direccion}}</th>
          </tr>              
          <tr>
            <th colspan="15" class="no">E-mail</th>
            <th colspan="35" class="desc">{{$p->pregradosR->preUachsR->preURespnsablesR[0]->email}}</th>
            <th colspan="20" class="no">Telefono</th>
            <th colspan="30" class="desc">{{$p->pregradosR->preUachsR->preURespnsablesR[0]->telefono_1}}</th>
          </tr>
        </tbody>
      </table>
    <div id="cab">2 - ESTUDIOS</div>
<table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="10" class="no">Carrera</th>
            <th colspan="90" class="desc">{{$p->pregradosR->preUachsR->preUEstudioActualesR->carreraR->nombre}}</th>
          </tr>
          <tr>
            <th colspan="20" class="no">Ranking</th>
            <th colspan="45" class="desc">{{$p->pregradosR->preUachsR->preUEstudioActualesR->ranking}}</th>
          	<th colspan="15" class="no">Año ingreso</th>
            <th colspan="20" class="desc">{{$p->pregradosR->preUachsR->preUEstudioActualesR->anio_ingreso}}</th>
          </tr>
          <tr>
            <th colspan="25" class="no">Director/a de Carrera</th>
            <th colspan="75" class="desc">{{$p->pregradosR->preUachsR->preUEstudioActualesR->carreraR->director}}</th>
          </tr>              
          <tr>
            <th colspan="20" class="no">Becas y beneficios vigentes</th>
            <th colspan="80" class="desc">{{$p->pregradosR->preUachsR->preUEstudioActualesR->beneficios}}</th>
          </tr>
        </tbody>
      </table>
    <div id="cab">3 - INFORMACION INTERCAMBIO ESTUDIANTIL</div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <!-- agregar condiciones como a todo lo demas xD 4 casos (sem1 o sem2) (ambos) y (desde hasta)-->
            <th colspan="20" class="no">Semestre(s)</th>
            @if($p->pregradosR->prePostulacionUniversidadesR->semestre == 'otro')
              <th colspan="80" class="desc">No aplica</th>
            @else
                @if($p->pregradosR->prePostulacionUniversidadesR->semestre == 'ambos')
                      <th colspan="80" class="desc">{{'Semestre 1 y 2 del '.$p->pregradosR->prePostulacionUniversidadesR->anio}}</th>
                @else
                      <th colspan="80" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->semestre.' del '.$p->pregradosR->prePostulacionUniversidadesR->anio}}</th>
                @endif
            @endif
          </tr>            
        </tbody>
      </table>
    <div id="cab">3.1 - OTRO PERIODO DE INTERCAMBIO</div>
      <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            @if($p->pregradosR->prePostulacionUniversidadesR->semestre != 'otro')
                <th colspan="20" class="no">Desde</th>
                <th colspan="30" class="desc"> No aplica </th>
                <th colspan="20" class="no">Hasta</th>
                <th colspan="30" class="desc"> No aplica </th>
            @elseif($p->pregradosR->prePostulacionUniversidadesR->semestre == 'otro')
                <th colspan="20" class="no">Desde</th>
                <th colspan="30" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->desde}}</th>
                <th colspan="20" class="no">Hasta</th>
                <th colspan="30" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->hasta}}</th>
            @endif
          </tr>            
        </tbody>
      </table>     
    <div id="cab">4 - CONVENIO</div>
          <table border="0" cellspacing="0" cellpadding="0">
        <tbody>
          <tr>
            <th colspan="25" class="no">Universidad Extranjera</th>
            <th colspan="75" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->universidadR->nombre}}</th>
          </tr> 
         <tr>
            <th colspan="25" class="no">Carrera</th>
            <th colspan="75" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->carreraR->nombre}}</th>
          </tr> 
          <tr>
            <th colspan="20" class="no">Financiamiento</th>
            @if($p->pregradosR->prePostulacionUniversidadesR->financiamiento <= 3)
              <th colspan="40" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->financiamientoR->nombre}}</th>
            @else  
              <th colspan="40" class="desc">{{$p->pregradosR->prePostulacionUniversidadesR->preOtroFinanciamientosR->first()->descripcion}}</th>
            @endif
                
            <th colspan="20" class="no">Convenio</th>
            @if($p->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->universidadR->conveniosR->toArray() == null)
              <th colspan="20" class="desc">No</th>
             @else
                <th colspan="20" class="desc"> 
                  @foreach($p->pregradosR->prePostulacionUniversidadesR->carreraR->facultadR->campusSedesR->universidadR->conveniosR as $item) 
                  {{$item->nombre}}
                  @endforeach   <!-- Consultar si se muestra solo el convenio que usa el estudiante o todos los que tenga la institucion -->
                </th>
             @endif       
          </tr>             
        </tbody>
      </table> 

      <div id="decl">
        <div id="cab">4 - CONVENIO</div>
        <p>Yo afirmo que la información que he entregado en esta solicitud es verdadera, completa y precisa. Además me he informado de lo siguiente:</p>
        <ul>
          <li>Haber cursado y aprobado los primeros dos años de la carrera.</li>
          <li>Tener situación académica REGULAR y no haber reprobado asignaturas durante los últimos semestres.</li>
          <li>Estar matriculado/a al momento de postular, al momento de iniciar y terminar el intercambio.</li>
        </ul>
        <strong>Compromisos:</strong>

        <ul>
          <li>El estudiante se compromete a <strong>cancelar</strong> matrícula y arancel en la universidad de origen mientras se encuentre de intercambio, de lo contrario no se reconocerá ninguna actividad académica que realice en la universidad de destino <spam class="text-danger">(Escepción: Becarios DAAD que solo deben cancelar matrícula).</spam></li>

          <br></br>  
          <ul>
          <strong>Persona que me matriculará en mi ausencia: {{$p->pregradosR->preUachsR->declaracionR->persona_matricula}}</strong>
          </ul>
          <ul>
          <strong>Fecha en que me matriculará: {{$p->pregradosR->preUachsR->declaracionR->fecha_matricula}}</strong>
          </ul>
          <br>

          <li class="text-danger"><strong>El estudiante se compromete a enviar todos los documentos que se requieren una vez que se encuentre en el extranjero, si modifica asignaturas que estas sean autorizadas por la Dirección de Escuela y modificar su inscripción de asignaturas a través  de info-alumnos en los períodos informados por la UACh. Esta modificación debe realizarse de acuerdo al documento de homologación que ha firmado con su director/a de escuela.</strong></li>




      <li>El estudiante ha sido informado de los documentos necesarios para realizar estudios en el país de destino <strong><u>(Carta de aceptación original, visa de estudiante, seguro medico </u></strong>y otros documentos necesarios por lo que se aconseja comunicarse con la embajada del país en el que realizará estudios).</li>

      <li>El estudiante se ha comunicado con la <strong>Asistente Social a cargo de estudios de Movilidad Estudiantil</strong>, y fue informado(a) respecto a los trámites que debe realizar para no perder ningún beneficio(becas y/o créditos) y/p los requisitos que se deben cumplir durante su intercambio en caso de querer postular a becas en el futuro. Documento firmado por el asistente, <spam class='text-danger'>Apoderado </spam> Asistente Social y Movilidad Estudiantil.</li>

      <li> El estudiante deja un <strong class='text-danger'>poder notarial</strong> a alguna persona cercana en caso de trámites del estudiante mientras se encuentre fuera de Chile.</li>

      <li>El estudiante se compromete a enviar el documento de <strong>"llegada y contacto en el extranjero"</strong> una vez que se encuentre en el país extranjero iniciando su intercambio estudiantil.</li>

      <li>El estudiante se compromete a <strong>participar</strong> activamente en las actividades de bienvenida, orientación y otros que la universidad extranjera ofrezca a estudiantes internacionales de intercambio.</li>

      <li>El estudiante se compromete a responder a <strong>encuesta</strong> de satisfacción que la UACh le envíe.</li>

      <li class='text-danger'>El estudiante se compromete a preparar la presentción en power point dando cuenta de la experiencia vivida entregando información de la universiad y la ciudad de destino y dando consejos, datos a futuros estudiantes interesados en realizar el mismo intercambio.</li>

      <li>El estudiante se compromete a mantener <strong>contacto con Movilidad Estudiantil</strong> vía correo electrónico mientras se encuentre de intercambio en el extranjero y se compromete a estar pendiente de cualquier información que esta unidad pudiera hacerle llegar.</li>
    </ul>
  </div>
    <div id="cab">Fecha de emision: {{ $date }}</div>