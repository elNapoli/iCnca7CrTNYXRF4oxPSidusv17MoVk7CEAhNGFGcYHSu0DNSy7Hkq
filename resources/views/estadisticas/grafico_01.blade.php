
@extends('intranet.app')


@section('content')

  <!-- BASIC FORM ELELEMNTS -->
            <div class="row mt">
              <div class="col-lg-12">
                  <div class="form-panel">
                      <h4 class="mb"><i class="fa fa-angle-right"></i> Form Elements</h4>
                      <div class="form-horizontal style-form" method="get">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Default</label>
                              <div class="col-sm-10">
                                  <select name="filtro_1" class="form-control" id="filtro_1">
                                    <option value=""> Seleccione primer filtro principal</option>
                                    <option value="1">Continente</option>
                                    <option value="2">País</option>
                                    <option value="3">Ciudad</option>
                                    <option value="4">Universidad de origen</option>
                                    <option value="5">Facultad de origen</option>
                                    <option value="6">Carrera de origen</option>
                                    <option value="7">Universidad de destino</option>
                                    <option value="8">Facultad de destino</option>
                                    <option value="9">Carrera de destino</option>
                                    <option value="10">Ciudad</option>
                                    <option value="11">Postulante</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Default</label>
                              <div class="col-sm-10">
                                  <select name="filtro_2" class="form-control" id="filtro_2">
                                    <option value=""> Seleccione primer filtro principal</option>
                                    <option value="1">Continente</option>
                                    <option value="2">País</option>
                                    <option value="3">Ciudad</option>
                                    <option value="4">Universidad de origen</option>
                                    <option value="5">Facultad de origen</option>
                                    <option value="6">Carrera de origen</option>
                                    <option value="7">Universidad de destino</option>
                                    <option value="8">Facultad de destino</option>
                                    <option value="9">Carrera de destino</option>
                                    <option value="10">Ciudad</option>
                                    <option value="11">Postulante</option>
                                  </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <a href="#!" id='btn_graficar' class="btn btn-primary">graficar</a>
                          </div>
<div id="pieChart"></div>

                      </div>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->

    {!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}


@endsection

@section('styles')


@endsection

@section('scripts')

    {!! Html::Script('d3/d3.js')!!}

<script src="https://raw.githubusercontent.com/benkeen/d3pie/0.1.8/d3pie/d3pie.min.js"></script>

<script>

  $(document).on('ready',function(){


var data = [
  { label: "0", value: 1 }
];
var pie = new d3pie("pieChart", {
  "header": {
    "title": {
      "text": "Lots of Programming Languages",
      "fontSize": 24,
      "font": "open sans"
    },
    "subtitle": {
      "text": "A full pie chart to show off label collision detection and resolution.",
      "color": "#999999",
      "fontSize": 12,
      "font": "open sans"
    },
    "titleSubtitlePadding": 9
  },
  "footer": {
    "color": "#999999",
    "fontSize": 10,
    "font": "open sans",
    "location": "bottom-left"
  },
  "size": {
    "canvasWidth": 590,
    "pieOuterRadius": "90%"
  },
data: {
    content: data
  },
  'tooltips': {
    enabled: true,
    type: "placeholder",
    string: "{label}: {percentage}% ({value})",
    placeholderParser: function(index, data) {
      data.label = data.label;
      data.percentage = data.percentage.toFixed(2);
      data.value = data.value.toFixed(5);
    }
  },
  "labels": {
    "outer": {
      "pieDistance": 32
    },
    "inner": {
      "hideWhenLessThanPercentage": 3
    },
    "mainLabel": {
      "fontSize": 11
    },
    "percentage": {
      "color": "#ffffff",
      "decimalPlaces": 0
    },
    "value": {
      "color": "#adadad",
      "fontSize": 11
    },
    "lines": {
      "enabled": true
    },
    "truncation": {
      "enabled": true
    }
  },
  "effects": {
    "pullOutSegmentOnClick": {
      "effect": "linear",
      "speed": 400,
      "size": 8
    }
  },
  "misc": {
    "gradient": {
      "enabled": true,
      "percentage": 100
    }
  }
});

  $('#btn_graficar').on('click',function(){

    $.ajax({
            type: 'POST',
            async:false,
            url: '/estadisticas/graficar',
            data:{
              '_token':$('#_token').val(),
              'filtro1' : $('#filtro_1').val(),
              'filtro2' : $('#filtro_2').val()
            },
            dataType: "json",
            success: function (json) {
                var datos = [];
                 $.each(json.content, function(index, subCatObj){

                    datos.push({
                      label: subCatObj.label,
                      value: subCatObj.value,
                      color: subCatObj.color
                    });

                 });


                pie.updateProp("header.title.text", $('#filtro_2 :selected').text()+ ' por '+ $('#filtro_1 :selected').text());
                pie.updateProp("data.content", datos);
            
             
            },
            error: function (xhr, status, err) {
                alert(status);
            }
        });
  })
});
</script>
@endsection

