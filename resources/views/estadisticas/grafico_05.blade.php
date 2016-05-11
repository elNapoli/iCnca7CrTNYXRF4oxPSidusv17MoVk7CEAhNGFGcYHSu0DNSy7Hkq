
@extends('intranet.app')

@section('content')
  <div id="test"></div>
@endsection


@section('styles')

<style>

path {
  stroke: #fff;
}

</style>
@endsection

@section('scripts')
    {!! Html::Script('d3/d3.js')!!}
 
<script>

var width = 960,
    height = 700,
    radius = (Math.min(width, height) / 2) - 10;

var formatNumber = d3.format(",d");
  var tooltip = d3.select("#test")
    .append("div")
    .attr("class", "tooltip")
    .style("z-index", "10")
    .style("border-radius", "5px")
    .style("border", "2px solid #fff")
    .style("background", "#000")
    .style("color", "#fff")
    .style("font-weight", "bold")
    .style("padding", "10px")
    .style("opacity", 0);
var x = d3.scale.linear()
    .range([0, 2 * Math.PI]);

var y = d3.scale.sqrt()
    .range([0, radius]);

var color = d3.scale.category20c();

var partition = d3.layout.partition()
    .value(function(d) { return d.size; });

var arc = d3.svg.arc()
    .startAngle(function(d) { return Math.max(0, Math.min(2 * Math.PI, x(d.x))); })
    .endAngle(function(d) { return Math.max(0, Math.min(2 * Math.PI, x(d.x + d.dx))); })
    .innerRadius(function(d) { return Math.max(0, y(d.y)); })
    .outerRadius(function(d) { return Math.max(0, y(d.y + d.dy)); });

var svg = d3.select("#test").append("svg")
    .attr("width", width)
    .attr("height", height)
  .append("g")
    .attr("transform", "translate(" + width / 2 + "," + (height / 2) + ")");

d3.json("/flare.json", function(error, root) {
  if (error) throw error;

  svg.selectAll("path")
      .data(partition.nodes(root))
    .enter().append("path")
      .attr("d", arc)
      .style("fill", function(d) { return color((d.children ? d : d.parent).name); })
      .on("click", click)
      .on("mouseover", function(d) {
          tooltip.html(function() {
               return d.name + " <spam style='color:red'>" + formatNumber(d.value)+"</spam>";
         });
          return tooltip.transition()
            .duration(50)
            .style("opacity", 0.7);
        })
        .on("mousemove", function(d) {
          return tooltip
            .style("top", (d3.event.pageY-80)+"px")
            .style("left", (d3.event.pageX-200)+"px");
        })
        .on("mouseout", function(){return tooltip.style("opacity", 0);})

});

function click(d) {
  svg.transition()
      .duration(750)
      .tween("scale", function() {
        var xd = d3.interpolate(x.domain(), [d.x, d.x + d.dx]),
            yd = d3.interpolate(y.domain(), [d.y, 1]),
            yr = d3.interpolate(y.range(), [d.y ? 20 : 0, radius]);
        return function(t) { x.domain(xd(t)); y.domain(yd(t)).range(yr(t)); };
      })
    .selectAll("path")
      .attrTween("d", function(d) { return function() { return arc(d); }; });
}

d3.select(self.frameElement).style("height", height + "px");
</script>
@endsection
