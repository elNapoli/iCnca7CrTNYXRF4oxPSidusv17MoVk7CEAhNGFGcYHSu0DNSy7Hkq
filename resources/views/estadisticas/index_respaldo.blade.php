
@extends('intranet.app')

@section('Dashboard') Departamentos @endsection
@include('estadisticas.partials.style')

@section('content')
<div id="test"></div>
@endsection

@section('scripts')
    {!! Html::Script('d3/d3.js')!!}
<script type="text/javascript">
    $(document).ready(function() {

        //Width and height
        var w = 500;
        var h = 100;
        var barPadding = 1;

        var dataset = [ 5, 10, 13, 19, 21, 25, 22, 18, 15, 13,
            11, 12, 15, 20, 18, 17, 16, 18, 23, 25 ];

        var svg = d3.select("#test")
            .append("svg")
            .attr("width", w)
            .attr("height", h);
        
        svg.selectAll("rect")
            .data(dataset)
            .enter()
            .append("rect")
            .attr("fill", function(d) {
                    return "rgb(0, 0, " + (d * 10) + ")";
                    })
            .attr("x", 0)
            .attr("y", 0)
            .attr("width", w / dataset.length - barPadding)
            .attr("height", function(d) {
                    return d*4;  //Solo el dato
                    })
            .attr("y", function(d) {
                    return h - d*4;  //Altura menos el dato
                     })
            .attr("x", function(d, i) {
                    return i * (w / dataset.length);
                     });

        svg.selectAll("text")  //etiquetas
            .data(dataset)
            .enter()
            .append("text")
            .text(function(d) {
                    return d;
                    })
            .attr("font-family", "sans-serif")
            .attr("font-size", "11px")
            .attr("fill", "white")
            .attr("text-anchor", "middle")
            .attr("x", function(d, i) {
                    return i * (w / dataset.length) + (w / dataset.length - barPadding) / 2;
                })
                .attr("y", function(d) {
                    return h - (d * 4) + 15;              // +15
                });

  
    });
    </script>
@endsection

