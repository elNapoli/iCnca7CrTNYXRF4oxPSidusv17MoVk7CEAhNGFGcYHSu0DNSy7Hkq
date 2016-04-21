@extends('intranet.app')

@section('Dashboard') Departamentos @endsection
@include('estadisticas.partials.style2')

@section('content')


                <div class="panel panel-default">
                    <div class="panel-body">

    @include('estadisticas.partials.menu')
</div>

<div id="test"></div>
{!!Form::hidden('getToken', csrf_token(),array('id'=>'getToken'));!!}
@endsection

@section('scripts')
    {!! Html::Script('d3/d3.js')!!}
    {!! Html::Script('js/funciones.js') !!}
<script type="text/javascript">
    $(document).ready(function() {


var width = 960,
    height = 570,
    radius = Math.min(width, height) / 2;

var x = d3.scale.linear()
    .range([0, 2 * Math.PI]);

var y = d3.scale.sqrt()
    .range([0, radius]);

var color = d3.scale.category20c();

var svg = d3.select('#test').append("svg")
    .attr("width", width)
    .attr("height", height+12)
  .append("g")
    .attr("transform", "translate(" + width / 2 + "," + (height / 2 + 10) + ")");

var partition = d3.layout.partition()
    .sort(null)
    .value(function(d) { return d.size; });

var arc = d3.svg.arc()
    .startAngle(function(d) { return Math.max(0, Math.min(2 * Math.PI, x(d.x))); })
    .endAngle(function(d) { return Math.max(0, Math.min(2 * Math.PI, x(d.x + d.dx))); })
    .innerRadius(function(d) { return Math.max(0, y(d.y)); })
    .outerRadius(function(d) { return Math.max(0, y(d.y + d.dy)); });

  var tooltip = d3.select("#test")
    .append("div")
    .attr("class", "tooltip")
    .style("position", "absolute")
    .style("z-index", "10")
    .style("opacity", 0);

  function format_number(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
  }


  function format_name(d) {
    var name = d.name;
        return  '<b>' + name + '</b><br> (' + format_number(d.value) + ')';
  }

d3.json("/flare.json", function(error, root) {


  var path = svg.selectAll("path")
      .data(partition.nodes(root))
    .enter().append("path")
      .attr("d", arc)
      .style("fill", function(d) { return color((d.children ? d : d.parent).name); })
      .on("click", click)
       .on("mouseover", function(d) {
          tooltip.html(function() {
              if(d.name == 'continente'){
                  var name = d.name+': cantidad total (por calcular)';
              }
              else{
                  var name = d.name+': '+d.size;
              }
              return name;
         });
          return tooltip.transition()
            .duration(50)
            .style("opacity", 0.9);
        })
        .on("mousemove", function(d) {
          return tooltip
            .style("top", (d3.event.pageY-80)+"px")
            .style("left", (d3.event.pageX-200)+"px");
        })
        .on("mouseout", function(){return tooltip.style("opacity", 0);});

 


  function click(d) {
    path.transition()
      .duration(750)
      .attrTween("d", arcTween(d));
  }
});

d3.select(self.frameElement).style("height", height + "px");

// Interpolate the scales!
function arcTween(d) {
  var xd = d3.interpolate(x.domain(), [d.x, d.x + d.dx]),
      yd = d3.interpolate(y.domain(), [d.y, 1]),
      yr = d3.interpolate(y.range(), [d.y ? 20 : 0, radius]);
  return function(d, i) {
    return i
        ? function(t) { return arc(d); }
        : function(t) { x.domain(xd(t)); y.domain(yd(t)).range(yr(t)); return arc(d); };
  };
}
////////////////////////////////////////
        $('#graf').on('click',function(e){
                alert('En construccion xD!');
        });

        $('#principal').on('change',function(e){
            if($(this).val() == 1){
                $('#test').show('slow');
                $('#op_univ').hide('fast');
                $('#op_post').show('slow');
                $('#graf').attr('disabled',false);
            }
            else if($(this).val() == 2){
                $('#test').show('fast');
                $('#op_post').hide('fast');
                $('#op_univ').show('slow');
                $('#graf').attr('disabled',false);

            }
            else if($(this).val() == 0){
                $('#op_post').hide('slow');
                $('#op_univ').hide('slow');
                $('#test').hide('slow');
                $('#graf').attr('disabled',true);

            }
            //var id = $(this).val() //paso la id del select por referencia
         });
    });
    </script>
@endsection