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
            "columnDefs": [
                { className: "text-right", "targets": [ 1,2,3,4,5,6,7 ] }
            ],
            "ordering": false,
            "pageLength": false,
            "scrollY": "300px",
            "scrollX": true,
            'fixedColumns':   {
                leftColumns: 1
            },
            'ajax':{
                url: 'laporan/table',
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
            "drawCallback": function(data) {
                var api = this.api();

                console.log(data.json.totalPendapatan);
                $(api.column(1).footer()).html(data.json.totalNilaiRencana);
                $(api.column(2).footer()).html(data.json.totalPendapatan);
                $(api.column(3).footer()).html(data.json.totalBiayaRencana);
                $(api.column(4).footer()).html(data.json.totalBiayaReal);
                $(api.column(5).footer()).html(data.json.totalLabaRencana);
                $(api.column(6).footer()).html(data.json.totalLabaReal);
                $(api.column(7).footer()).html('');

                // var per = Number((data.json.totalLabaReal / data.json.totalLabaRencana)* 100),
                //     pes = per.toFixed(2);
                //
                // $(api.column(7).footer()).html(pes +' %');


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

    // $(window).on('load', function (e) {
    //     $('.div1').width($('table').width());
    //     $('.div2').width($('table').width());
    // });

</script>