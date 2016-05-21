@extends('intranet.app')

@section('content')
 <div class="panel panel-default">
                     <div class="panel-body">
 

  <div id="sequence"></div>
  <div id="test"></div>
    <div id="explanation" style="visibility: hidden;">
          <p id="p1"></p>
          <span id="percentage"></span><br/>
          <p id="p2"></p>
          <span id="percentage2"></span><br/>
        </div>
  </div>
 
@endsection


@section('styles')
  
<style>

path {
  stroke: #fff;
}
#sequence text, #legend text {
  font-weight: 600;
  fill: #fff;
}
#explanation {
  position: absolute;
  top: 260px;
  left: 805px;
  width: 240px;
  text-align: center;
  color: #666;
  z-index: 1;
}

#percentage, #percentage2 {
  font-size: 3.5em;
}
</style>
@endsection

@section('scripts')
    {!! Html::Script('/plugins/d3/d3.js')!!}
 
<script>
var cant = {{$cant}};
// Breadcrumb dimensions: width, height, spacing, width of tip/tail.
var b = {
  w: 250, h: 60, s: 3, t: 10
};

// Mapping of step names to colors.
var colors = {
  "Tipo de estudio": "#5687d1",
  "Procedencia": "#7b615c",
  "Año de intercambio": "#de783b",
  "Universidad": "#6ab975",
  "Facultad": "#a173d1",
  "Continente": "#088A4B",
  "País": "#0B610B",
  "Ciudad": "#FF8000",
  "Género": "#642EFE",
  "Convenio": "#81F7BE",
  "Carrera": "#bbbbbb"
};

var width2 = 1060,
    width = 860,
    height = 600,
    radius = (Math.min(width, height) / 2)-50 ;

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
    .sort(null)
    .value(function(d) { return 1; });


var arc = d3.svg.arc()
    .startAngle(function(d) { return Math.max(0, Math.min(2 * Math.PI, x(d.x))); })
    .endAngle(function(d) { return Math.max(0, Math.min(2 * Math.PI, x(d.x + d.dx))); })
    .innerRadius(function(d) { return Math.max(0, y(d.y)); })
    .outerRadius(function(d) { return Math.max(0, y(d.y + d.dy)); });

var svg = d3.select("#test").append("svg:svg")
    .attr("width", 700)
    .attr("height", height)
    .append("svg:g")
    .attr("id", "micontenedor")
    .attr("transform", "translate(" + width / 2.5 + "," + (height / 2) + ")");
    

d3.json("/json_universidad.json", function(error, root) {
  if (error) throw error;
   initializeBreadcrumbTrail();

    svg.append("svg:circle")
      .attr("r", radius)
      .style("opacity", 0);




  svg.selectAll("path")
      .data(partition.nodes(root))
    .enter().append("path")
      .attr("d", arc)
      .style("fill", function(d) { return color((d.children ? d : d.parent).name); })
      .on("click", click)
      .on("mouseover", mouseover)
        .on("mousemove", function(d) {
          return tooltip
            .style("top", (d3.event.pageY-100)+"px")
            .style("left", (d3.event.pageX-150)+"px");
        })
        .on("mouseout", function(){return tooltip.style("opacity", 0);})

});
  // Add the mouseleave handler to the bounding circle.
  d3.select("#micontenedor").on("mouseleave", mouseleave);
// Given a node in a partition layout, return an array of all of its ancestor
// nodes, highest first, but excluding the root.
function getAncestors(node) {
  var path = [];
  var current = node;
  while (current.parent) {
    path.unshift(current);
    current = current.parent;
  }
  return path;
}



// Fade all but the current sequence, and show it in the breadcrumb trail.
function mouseover(d) {

if(d.parent){
 var percentage = (100 * d.value / cant ).toPrecision(3);
  var percentageString = percentage + "%";
  if (percentage < 0.1) {
    percentageString = "< 0.1%";
  }


 var percentage2 = (100 * d.value / d.parent.value ).toPrecision(3);
  var percentageString2 = percentage2 + "%";
  if (percentage2 < 0.1) {
    percentageString2 = "< 0.1%";
  }    
}
else{
    d3.select("#explanation")
      .style("visibility", "hidden");
}


          tooltip.html(function() {
               return d.name + " <spam style='color:red'>" + formatNumber(d.value)+"</spam>";
         });
           tooltip.transition()
            .duration(50)
            .style("opacity", 0.7);
        
  var sequenceArray = getAncestors(d);
  updateBreadcrumbs(sequenceArray, "");

if(d.parent){
    d3.select("#percentage")
      .text(percentageString);

    d3.select("#p1")
        .text('De un total de '+cant+' universidades '+d.value+' se encuentran en '+d.name+' y equivalen  respecto al total en un');

    d3.select("#percentage2")
      .text(percentageString2);  

    d3.select("#p2")
        .text('El porcentaje de universidades en  '+d.name+' respecto a  '+d.parent.name+' equivalen   en un');

    d3.select("#explanation")
      .style("visibility", "");
}
else{
    d3.select("#explanation")
      .style("visibility", "hidden");  
}

  // Fade all the segments.
    d3.selectAll("path")
      .style("opacity", 0.1);

  // Then highlight only those that are an ancestor of the current segment.
  svg.selectAll("path")
      .filter(function(node) {
                return (sequenceArray.indexOf(node) >= 0);
              })
      .style("opacity", 1);
}
// Restore everything to full opacity when moving off the visualization.
function mouseleave(d) {

  // Hide the breadcrumb trail
  d3.select("#trail")
      .style("visibility", "hidden");

  // Deactivate all segments during transition.
  d3.selectAll("path").on("mouseover", null);

  // Transition each segment to full opacity and then reactivate it.
  d3.selectAll("path")
      .transition()
      .duration(500)
      .style("opacity", 1)
      .each("end", function() {
              d3.select(this).on("mouseover", mouseover);
            });

  d3.select("#explanation")
      .style("visibility", "hidden");
}

function initializeBreadcrumbTrail() {
  // Add the svg area.
  var trail = d3.select("#sequence").append("svg:svg")
      .attr("width", width2)
      .attr("height", 122)
      .attr("id", "trail");
  // Add the label at the end, for the percentage.
  trail.append("svg:text")
    .attr("id", "endlabel")
    .style("fill", "#000");
}

// Generate a string that describes the points of a breadcrumb polygon.
function breadcrumbPoints(d, i) {
  var points = [];
  points.push("0,0");
  points.push(b.w+ ",0");
  points.push(b.w+ b.t + "," + (b.h / 2));
  points.push(b.w + "," + b.h);
  points.push("0," + b.h);
  if (i > 0 &&  i != 4) { // Leftmost breadcrumb; don't include 6th vertex.
    points.push(b.t + "," + (b.h / 2));
  }
  return points.join(" ");
}

// Update the breadcrumb trail to show the current sequence and percentage.
function updateBreadcrumbs(nodeArray, percentageString) {

  // Data join; key function combines name and depth (= position in sequence).
  var g = d3.select("#trail")
      .selectAll("g")
      .data(nodeArray, function(d) { return d.breadCrum + d.name; });

  // Add breadcrumb and label for entering nodes.
  var entering = g.enter().append("svg:g");
  entering.append("svg:polygon")
      .attr("points", breadcrumbPoints)
      .style("fill", function(d) { return color((d.children ? d : d.parent).name); });

  entering.append("svg:text")
      .attr("x", (b.w + b.t) / 2)
      .attr("y", b.h / 4)
      .attr("dy", "0.2em")
      .attr("text-anchor", "middle")
      .text(function(d) { return d.breadCrum; });

    entering.append("svg:text")
      .attr("x", (b.w + b.t) / 2)
      .attr("y", b.h / 2)
      .attr("dy", "0.45em")
      .attr("text-anchor", "middle")
      .text(function(d) { return d.name; });

  // Set position for entering and updating nodes.
  g.attr("transform", function(d, i) {
    if(i>3){
      return "translate(" + (i-4) * (b.w + b.s) + ", 62)";
    }
    return "translate(" + i * (b.w + b.s) + ", 0)";
  });

  // Remove exiting nodes.
  g.exit().remove();

  // Now move and update the percentage at the end.
  d3.select("#trail").select("#endlabel")
      .attr("x", (nodeArray.length + 0.5) * (b.w + b.s))
      .attr("y", b.h / 2)
      .attr("dy", "0.35em")
      .attr("text-anchor", "middle")
      .text(percentageString);

  // Make the breadcrumb trail visible, if it's hidden.
  d3.select("#trail")
      .style("visibility", "");

}
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
