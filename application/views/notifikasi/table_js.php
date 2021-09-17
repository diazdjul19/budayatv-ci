<script src="assets/plugins/jquery-datatable/media/js/jquery.dataTables.min.js" ></script>
<script src="assets/plugins/jquery-datatable/extensions/TableTools/js/dataTables.tableTools.min.js" ></script>
<script src="assets/plugins/jquery-datatable/media/js/dataTables.bootstrap.js" ></script>
<script src="assets/plugins/jquery-datatable/extensions/Bootstrap/jquery-datatable-bootstrap.js" ></script>
<script src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>

<script>
    $(function () {

        var datatable = $('#mytable').DataTable({
            "columns": [
                {"width": "80%"},
                {"width" : "20%"}
            ],
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
            'ajax':{
                url: 'notifikasi/table',
                type: 'post',
                error: function(){  // error handling
                    $(".table-error").html("");
                    $("#mytable").append('<tbody class="table-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
                }
            },
            "columnDefs": [
                {
                    "targets": [ -1 ],
                    "orderable": false,
                }
            ],
            "drawCallback": function() {
                $("[rel='tooltip']").tooltip({
                    html: true,
                    container: 'body'
                });

            }
        });

    });

</script>