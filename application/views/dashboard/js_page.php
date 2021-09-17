<script src="assets/plugins/canvasjs/jquery.canvasjs.min.js" type="text/javascript"></script>
<script src="assets/plugins/interactjs/interact.min.js" type="text/javascript"></script>
<script src="assets/plugins/moment/moment1.js"></script>

<script src="assets/plugins/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/plugins/fullcalendar/locale/id.js"></script>


<script>
    $(function () {
        $('#calendar').fullCalendar({
            locale: 'es',
            events:  'dashboard/get_tanggal',
            eventRender: function(eventObj, $el) {
                $el.popover({
                    title: eventObj.title,
                    content: eventObj.description,
                    trigger: 'hover',
                    placement: 'top',
                    container: 'body'
                });

                if(eventObj.icons){
                    $el.find(".fc-title").prepend("<i class='fa fa-"+eventObj.icons+" mr-2'></i>");
                }
            },
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek,basicDay'
            },
            navLinks: true,
            height: 450,
            eventLimit: true,
        })
    });

    window.onload = function () {

        CanvasJS.addColorSet("greenShades",
            [
                "#008080",
                "#3CB371",
                "#90EE90",
                "#2E8B57",
            ]);

        var options2= {
            animationEnabled: true,
            title:{
                text: "Anggaran Investasi",
                fontFamily: "roboto",
            },
            colorSet: "greenShades",
            data: [{
                type: "pie",
                startAngle: 40,
                yValueFormatString: "##0.00'%'",
                indexLabel: "{label} {y}",
                toolTipContent: "{label} {nominal}",
                legendText: "{label}",
                indexLabelFontSize: 14,
                dataPoints: [
                    { y: <?php echo (($investasi->nominal_anggaran - $investasi->real_anggaran) / $investasi->nominal_anggaran)* 100 ?>, label: "Sisa Anggaran", nominal: "Rp. <?php echo number_format(($investasi->nominal_anggaran - $investasi->real_anggaran), 0, '.','.') ?>" },
                    { y: <?php echo ($investasi->real_anggaran / $investasi->nominal_anggaran)* 100 ?>, label: "Realisasi" , nominal:"Rp. <?php echo number_format($investasi->real_anggaran, 0, '.','.') ?>"}
                ]
            }]
        };

        var options = {
            title:{
                text: "Anggaran Operasional",
                fontFamily: "roboto",
            },
            animationEnabled: true,
            data: [{
                type: "pie",
                startAngle: 40,
                yValueFormatString: "##0.00'%'",
                indexLabel: "{label} {y}",
                toolTipContent: "{label} {nominal}",
                legendText: "{label}",
                indexLabelFontSize: 16,
                dataPoints: [
                    { y: <?php echo (($operasional->nominal_anggaran - $operasional->real_anggaran) / $operasional->nominal_anggaran)* 100 ?>, label: "Sisa Anggaran", nominal: "Rp. <?php echo number_format(($operasional->nominal_anggaran - $operasional->real_anggaran), 0, '.','.') ?>" },
                    { y: <?php echo ($operasional->real_anggaran / $operasional->nominal_anggaran)* 100 ?>, label: "Realisasi" , nominal:"Rp. <?php echo number_format($operasional->real_anggaran, 0, '.','.') ?>"}
                ]
            }]
        };
        $("#chartInvestasi").CanvasJSChart(options2);
        $("#chartOperasional").CanvasJSChart(options);

    }
</script>