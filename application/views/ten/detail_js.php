<div class="modal fade fill-in" id="modal-detail" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="pg-close"></i>
    </button>
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-left p-b-5"><span class="semi-bold">Data</span> Tender</h5>
            </div>
            <div class="modal-body">
                <div id="content-detail"></div>
                <div class="row p-t-10">
                    <div class="col-lg-12 sm-text-center">
                        <button type="button" class="btn btn-danger fs-15" data-dismiss="modal"><i
                                    class="fa fa-times m-r-10"></i> Tutup
                        </button>
                        <a href="" id="link-detail" class="btn btn-primary">Buka Tender <i
                                    class="fa fa-arrow-right m-l-10"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/plugins/canvasjs/jquery.canvasjs.min.js"></script>
<script>
    $(function () {
        var total = <?php echo count($sejarah); ?>,
            progress = <?php echo count($progress); ?>,
            menang = <?php echo count($menang); ?>,
            kalah = <?php echo count($kalah); ?>;

        var p_prog = (progress / total)* 100,
            p_men  = (menang / total) * 100,
            p_kal  = (kalah / total)* 100;

        var chart = new CanvasJS.Chart("chart", {
            animationEnabled: true,
            title: {
                text: "<?php echo $data->nama_klien ?>"
            },
            data: [{
                type: "pie",
                startAngle: 240,
                yValueFormatString: "##0.00'%'",
                indexLabel: "{label} {y}",
                dataPoints: [
                    {y: p_prog, label: "Dalam Proses"},
                    {y: p_men, label: "Menang"},
                    {y: p_kal, label: "Kalah"},
                ]
            }]
        });
        chart.render();

        $("[rel='tooltip']").tooltip({
            html: true,
            container: 'body'
        });

        $(".but-detail").click(function (e) {
            e.preventDefault();

            var id = $(this).data('id');

            $("#link-detail").attr('href', "tender/detail/" + id);

            $.get('tender/get_data/'+ id, function (data) {
                $("#content-detail").html(data);
            });

            $("#modal-detail").modal('show');
        });

    });

</script>