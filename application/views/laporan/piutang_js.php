<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/fixedcolumns/3.2.6/js/dataTables.fixedColumns.min.js"></script>
<script>
    $(function () {

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
                url: 'laporan/piutang_table',
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
                { className: "text-right", "targets": [ 4,5,6 ] },
                { width: "5%", "targets": 1 }
            ],
            "drawCallback": function(data) {
                var api = this.api();

                $(api.column(6).footer()).html(data.json.totalKeseluruhan);

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