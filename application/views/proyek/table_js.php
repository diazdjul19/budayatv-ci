<script src="assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" ></script>
<script src="assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" ></script>
<script src="assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" ></script>
<script src="assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" ></script>
<script src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>

<script>
    $(function () {

        var datatable = $('#mytable').DataTable({
            'processing' : true,
            'serverSide' : true,
            'bLengthChange': false,
            "sDom": "<'table-responsive't><'row'<p i>>",
            "destroy": true,
            "scrollCollapse": true,
            "oLanguage": {
                "sLengthMenu": "_MENU_ ",
                "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries",
                "sProcessing": "loading data..."
            },
            "iDisplayLength": 10,
            "ordering": false,
            'ajax':{
                url: 'proyek/table',
                type: 'post',
                error: function(){  // error handling
                    $(".table-error").html("");
                    $("#mytable").append('<tbody class="table-error"><tr><td colspan="4" class="text-center">Tidak ada data</td></tr></tbody>');
                },
                data:function (data) {
                    data.tipe = $('#tipe').val();
                    data.tahun = $('#tahun').val();
                }
            },
            "drawCallback": function() {
                $("[rel='tooltip']").tooltip({
                    html: true,
                    container: 'body'
                });
            }
        });

        $('#search-table').keyup(function() {
            datatable.search(this.value).draw();
        });

        $('#tipe').change(function () {
            datatable.ajax.reload(null,false);
        });

        $('#tahun').change(function () {
            datatable.ajax.reload(null,false);
        });

    });

</script>