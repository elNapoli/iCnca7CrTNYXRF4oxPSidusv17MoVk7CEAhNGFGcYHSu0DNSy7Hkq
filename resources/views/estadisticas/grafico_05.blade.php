
@extends('intranet.app')

@section('content')
  <div id="sequence"></div>
  <div id="test"></div>
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
#sequence {
  width: 600px;
  height: 70px;
}
</style>
@endsection

@section('scripts')
    {!! Html::Script('d3/d3.js')!!}
 
<script>

// Breadcrumb dimensions: width, height, spacing, width of tip/tail.
var b = {
  w: 150, h: 30, s: 3, t: 10
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

var width = 960,
    height = 700,
    radius = (Math.min(width, height) / 2)-100 ;

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

var svg = d3.select("#test").append("svg:svg")
    .attr("width", width)
    .attr("height", height)
  .append("svg:g")
  .attr("id", "micontenedor")
    .attr("transform", "translate(" + width / 2 + "," + (height / 2) + ")");

d3.json("/flare.json", function(error, root) {
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
            .style("top", (d3.event.pageY-80)+"px")
            .style("left", (d3.event.pageX-200)+"px");
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




          tooltip.html(function() {
               return d.name + " <spam style='color:red'>" + formatNumber(d.value)+"</spam>";
         });
           tooltip.transition()
            .duration(50)
            .style("opacity", 0.7);
        
  var sequenceArray = getAncestors(d);
  updateBreadcrumbs(sequenceArray, "");

  // Fade all the segments.
  d3.selectAll("path")
      .style("opacity", 0.3);

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
      .duration(1000)
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
      .attr("width", width)
      .attr("height", 50)
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
  points.push(b.w + ",0");
  points.push(b.w + b.t + "," + (b.h / 2));
  points.push(b.w + "," + b.h);
  points.push("0," + b.h);
  if (i > 0) { // Leftmost breadcrumb; don't include 6th vertex.
    points.push(b.t + "," + (b.h / 2));
  }
  return points.join(" ");
}

// Update the breadcrumb trail to show the current sequence and percentage.
function updateBreadcrumbs(nodeArray, percentageString) {

  // Data join; key function combines name and depth (= position in sequence).
  var g = d3.select("#trail")
      .selectAll("g")
      .data(nodeArray, function(d) { return d.breadCrum + d.depth; });

  // Add breadcrumb and label for entering nodes.
  var entering = g.enter().append("svg:g");
  entering.append("svg:polygon")
      .attr("points", breadcrumbPoints)
      .style("fill", function(d) { return colors[d.breadCrum]; });

  entering.append("svg:text")
      .attr("x", (b.w + b.t) / 2)
      .attr("y", b.h / 2)
      .attr("dy", "0.35em")
      .attr("text-anchor", "middle")
      .text(function(d) { return d.breadCrum; });

  // Set position for entering and updating nodes.
  g.attr("transform", function(d, i) {
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
