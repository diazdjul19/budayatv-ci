
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
            'ajax':{
                url: 'laporan/invoice_lunas_table',
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
                { className: "text-right", "targets": [ 6 ] }
            ],
            "drawCallback": function(data) {
                var api = this.api();

                $(api.column(6).footer()).html(data.json.total);

                $("[rel='tooltip']").tooltip({
                    html: true,
                    container: 'body'
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