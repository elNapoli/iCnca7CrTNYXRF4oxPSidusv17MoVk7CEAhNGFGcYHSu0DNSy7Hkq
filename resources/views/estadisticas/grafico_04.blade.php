
@extends('intranet.app')


@section('content')

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
    <div id="chart"></div>

                      </div>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->

    {!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}


@endsection
@endsection

@section('styles')

    {!! Html::Style('d3/lib/c3/c3.css')!!}


@endsection

@section('scripts')
    {!! Html::Script('d3/d3.js')!!}
    {!! Html::Script('d3/lib/c3/c3.js')!!}
 <script>



        var generate = function () { return c3.generate({
            data: {
                columns: [],
                type: 'bar',
                groups: []
                },
                axis: {
                    x: {
                        type: 'category',
                    },
                    rotated: false,
                    },
            }); 
        }, 

        chart = generate();

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

chart.load({        
                columns:[['data4', 100, 50, 150, -200, 300, -100]]
            });
               console.log(json.content)
                     
                    },
                    error: function (xhr, status, err) {
                        alert(status);
                    }
            });
        });



        function update1() {
            chart.groups([['data1', 'data2', 'data3']])
        chart.categories(['perro', 'cat2', 'cat3', 'cat4', 'cat5', 'cat6']);
        }

        function update2() {
            chart.load({
                columns: [['data4', 100, 50, 150, -200, 300, -100]]
            });
        }

        function update3() {
            chart.groups([['data1', 'data2', 'data3', 'data4']])
        }




    </script>


@endsection

