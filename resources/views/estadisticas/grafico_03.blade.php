
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
<div id="test"></div>

                      </div>
                  </div>
              </div><!-- col-lg-12-->       
            </div><!-- /row -->

    {!!Form::hidden('_token', csrf_token(),array('id'=>'_token'));!!}


@endsection

@section('styles')
    <!-- Chart Styles -->
    {!! Html::Style('d3/lib/c3-master/css/c3.css')!!}

    <style>
        .c3.plot {
            font-family: sans-serif;
        }

        .c3.plot .layer.area path {
            fill-opacity: 0.75;
        }

        .c3.axis .tick line{
            stroke: darkgray;
        }
        .c3.axis line.grid {
            stroke-dasharray: 2,2;
        }
    </style>

@endsection

@section('scripts')
    {!! Html::Script('d3/d3.js')!!}
    {!! Html::Script('d3/lib/c3-master/lib/crossfilter.js')!!}
    {!! Html::Script('d3/lib/c3-master/js/c3.js')!!}
    {!! Html::Script('d3/lib/c3-master/js/c3-plot.js')!!}
    {!! Html::Script('d3/lib/c3-master/js/c3-layers.js')!!}
    {!! Html::Script('d3/lib/c3-master/js/c3-legend.js')!!}


    <!-- C3 -->
<script >

    $(document).on('ready',function(){

        var div_selection = d3.select('#test');
        var data = [
                { race: 'perro', northeast: 6111, midwest: 800, south: 0, west: 0 },
                { race: 'asian', northeast: 71853, midwest: 37443, south: 68215, west: 328879 },
                { race: 'black', northeast: 569686, midwest: 662679, south: 1940938, west: 288980 },
                { race: 'white', northeast: 5041763, midwest: 6159459, south: 8954636, west: 4890548 },
            ];
        var data_scalas = [data[0].race, data[1].race, data[2].race, data[3].race];
        var data_stacks = [
                        new c3.Plot.Layer.Stackable.Stack({
                            key: data[0].race,
                            y: function (d) { return d.northeast; }
                        }),
                        new c3.Plot.Layer.Stackable.Stack({
                            key: data[1].race,
                            y: function (d) { return d.midwest; },
                        }),
                        new c3.Plot.Layer.Stackable.Stack({
                            key: data[2].race,
                            y: function (d) { return d.south; },
                        }),
                        new c3.Plot.Layer.Stackable.Stack({
                            key: data[3].race,
                            y: function (d) { return d.west; },
                        }),
                    ];

        var race_scale = d3.scale.ordinal().domain(data_scalas);
        var region_color = d3.scale.category20();

        var expanded_bar_chart = new c3.Plot({
            anchor: div_selection.append('div').style('display', 'inline-block').node(),
            height: 300,
            width: 400,
            // Sometimes we _don't_ have fully **normalized data**.  Here we have a dataset with one
            // entry per x value (race), and each object contains the values for all of the stacks.
            data:data,
            // Setup **scales** and **x** accessor.
            // Note we are using an _ordinal_ horizontal scale and the default vertical scale.
            h: race_scale,
            x: function (d) { return d.race; },
            // Create the **stacked bar** layer.
            // Here we manually specify the set of stacks that are present.
            // Because we don't have a `stack_options.key` defined, each layer will get its own copy
            // of the data.However, each stack can have its own **y ** accessor to get its
            // particular value for that stack with the datum.
            layers: [

                new c3.Plot.Layer.Bar({
                    name: "Region",
                    bar_width: '75%',
                    stack_options: {
                        offset: 'expand',
                        styles: { 'fill': function (stack) { return region_color(stack.key); } },
                        title: function (stack) { return stack.key; },
                        name: function (key) { return key; },
                    },

                    stacks: data_stacks,
                }),
            ],
            // _Alternatively_, instead of specifying a y accessor for each stack above,
            // we could have just used this single **y accessor** for the layer:
            //        y: (d, i, stack) -> d[stack.key]
            // Add **margins ** and **axes ** to polish the example
            margins: { top: 10, right: 20 },
            axes: [
                new c3.Axis.X({
                    label: "Where People Die",
                    orient: 'top',
                    scale: false,
                }),
                new c3.Axis.Y({
                    label: "Postulantes",
                    tick_label: function (d) { return (d * 100) + '%'; },
                }),
                new c3.Axis.X({
                    label: "Años",
                }),
            ],
        }).render();

        new c3.Legend.PlotLegend({
            anchor: div_selection.append('div').node(),
            anchor_styles: {
                'display': 'inline-block',
                'vertical-align': '5em',
            },
            plot: expanded_bar_chart,
        }).render();


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
                      data.push({race: 'gato', northeast: 5041763, midwest: 6159459, south: 8954636, west: 4890548});
                      data_scalas.push(data[4].race);
                      expanded_bar_chart.asdfsfd(data_scalas);
                       expanded_bar_chart.redraw();
                    
                     
                    },
                    error: function (xhr, status, err) {
                        alert(status);
                    }
            });
        });




    })













</script>
@endsection


