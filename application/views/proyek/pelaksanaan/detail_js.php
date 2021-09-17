<script src="assets/plugins/canvasjs/jquery.canvasjs.min.js" type="text/javascript"></script>
<script src="assets/plugins/interactjs/interact.min.js" type="text/javascript"></script>
<script src="assets/plugins/moment/moment1.js"></script>

<script>
    var dataPoints = [];
    var dataPointsReal = [];
    var options = {
        title:{
            text: "Kurva S Progress"
        },
        legend: {
            cursor: "pointer",
            verticalAlign: "top",
            horizontalAlign: "center",
            dockInsidePlotArea: true,
        },
        data: [
            {
                type: "line",
                name: 'deadline progress',
                showInLegend: true,
                markerSize: 0,
                yValueFormatString: "#%",
                dataPoints: dataPoints
            },
            {
                type: "line",
                name: 'real Progress',
                showInLegend: true,
                markerSize: 0,
                yValueFormatString: "#,###%",
                dataPoints: dataPointsReal
            }

        ]
    };

    $.getJSON("pelaksanaan/kurvas_progress/<?php echo $s->id_spk ?>", function(data) {
        $.each(data, function(key, value){
            dataPoints.push({x: key, y: parseInt(value[1])});
            dataPointsReal.push({x:key, y: parseInt(value[2])});
        });
        $("#kurvas").CanvasJSChart().render();
    });

   $("#kurvas").CanvasJSChart(options);


</script>