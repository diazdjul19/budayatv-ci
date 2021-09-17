<div class="modal fade slide-up disable-scroll" id="modal-penagihan" tabindex="-1" role="dialog" aria-hidden="false">
    <div style="width: 900px;" class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">

            <div class="modal-content">
                <div class="p-1">
                    <h5>Detail Penagihan</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Nominal</th>
                                <th>Progress</th>
                                <th>Tanggal Penagihan</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade slide-up disable-scroll" id="modal-piutang" tabindex="-1" role="dialog" aria-hidden="false">
    <div style="max-width: 1200px; width: 1200px;" class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">

            <div class="modal-content">
                <div class="p-1">
                    <h5>Detail Piutang</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No Invoice</th>
                                <th>Tanggal Invoice</th>
                                <th>Jatuh Tempo</th>
                                <th>Pokok Invoice</th>
                                <th>PPN (10%)</th>
                                <th>Total Invoice</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="modal fade slide-up disable-scroll" id="modal-piutang-selesai" tabindex="-1" role="dialog" aria-hidden="false">
    <div style="max-width: 1200px; width: 1200px;" class="modal-dialog modal-lg">
        <div class="modal-content-wrapper">

            <div class="modal-content">
                <div class="p-1">
                    <h5>Detail Piutang yang sudah dibayar</h5>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Nama</th>
                                <th>No Invoice</th>
                                <th>Jatuh Tempo</th>
                                <th>Nomor Penerimaan Bank</th>
                                <th>Tanggal Pembayaran</th>
                                <th>Nominal (Nett)</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script>
    $(function () {

        // $('.wrapper1').on('scroll', function (e) {
        //     $('.wrapper2').scrollLeft($('.wrapper1').scrollLeft());
        // });
        // $('.wrapper2').on('scroll', function (e) {
        //     $('.wrapper1').scrollLeft($('.wrapper2').scrollLeft());
        // });

        // $(window).on('load', function (e) {
        //     $('.div1').width($('table').width());
        //     $('.div2').width($('table').width());
        // });

        var datatable = $('#mytable').DataTable({
            'processing' : true,
            'serverSide' : true,
            'bLengthChange': false,
            "sDom": "<t><'row'>",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries",
                "sProcessing": "loading data..."
            },
            "ordering": false,
            "pageLength": false,
            "scrollY": "300px",
            "scrollX": true,
            'fixedColumns':   {
                leftColumns: 1,
                leftColumns: 2
            },
            'ajax':{
                url: 'laporan/papan_status_table',
                type: 'post',
                error: function(){  // error handling
                    $(".table-error").html("");
                    $("#mytable").append('<tbody class="table-error"><tr><td colspan="3">No data found in the server</td></tr></tbody>');
                },
                data:function (data) {
                    data.status_selesai = $('#status_selesai').val();
                    data.mulai = $('#mulai').val();
                    data.selesai = $('#selesai').val();
                    data.klien = $('#klien').val();

                }
            },
            "columnDefs": [
                { className: "text-right", "targets": [ 2,3,4,5,6 ] }
            ],
            "drawCallback": function(data) {
                var api = this.api();

                $(api.column(3).footer()).html(data.json.totalPengeluaran);
                $(api.column(4).footer()).html(data.json.totalTagihan);
                $(api.column(5).footer()).html(data.json.totalPiutang);
                $(api.column(6).footer()).html(data.json.totalPendapatan);

                $("[rel='tooltip']").tooltip({
                    html: true,
                    container: 'body'
                });

                $(".penagihan").click(function () {
                    var id = $(this).data('id');
                    $("#modal-penagihan").modal('show');

                    $.ajax({
                        url: 'laporan/get_detail_penagihan',
                        method: 'post',
                        data: {'id_proyek': id},
                        success: function (data) {
                            $("#modal-penagihan table tbody").html(data);
                        }
                    })

                });

                $(".piutang").click(function () {
                    var id = $(this).data('id');
                    $("#modal-piutang").modal('show');

                    $.ajax({
                        url: 'laporan/get_detail_piutang',
                        method: 'post',
                        data: {'id_proyek': id},
                        success: function (data) {
                            $("#modal-piutang table tbody").html(data);
                        }
                    })
                });

                $(".piutang-selesai").click(function () {
                    var id = $(this).data('id');
                    $("#modal-piutang-selesai").modal('show');

                    $.ajax({
                        url: 'laporan/get_detail_piutang_selesai',
                        method: 'post',
                        data: {'id_proyek': id},
                        success: function (data) {
                            $("#modal-piutang-selesai table tbody").html(data);
                        }
                    })
                });

            }
        });



        $('#cari').keyup(function() {
            $('#mytable').DataTable().search(this.value).draw();
        });

        $('#status_selesai').change(function () {
            datatable.ajax.reload(null,false);
        });

        $('#klien').change(function () {
            datatable.ajax.reload(null,false);
        });

        $("#mulai")
            .datepicker({format: 'dd-mm-yyyy'})
            .on('hide', function(e) {
                datatable.ajax.reload(null,false);
                $("#p-mulai").html($(this).val());
            });

        $("#selesai")
            .datepicker({format: 'dd-mm-yyyy'})
            .on('hide', function(e) {
                datatable.ajax.reload(null,false);
                $("#p-selesai").html($(this).val());
            });

    });

</script>