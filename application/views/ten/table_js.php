

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
                {"width": "30%"},
                {"width": "20%"},
                {"width": "25%"},
                {"width": "25%"}
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
            "ordering": false,
            'ajax':{
                url: 'tender/table',
                type: 'post',
                error: function(){  // error handling
                    $(".table-error").html("");
                    $("#mytable").append('<tbody class="table-error"><tr><td colspan="3">No data found in the server</td></tr></tbody>');
                },
                data:function (data) {
                    data.tahap = $('#tahap').val();
                    data.urutan = $('#urutan').val();
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
            $('#mytable').DataTable().search(this.value).draw();
        });

        $('#tahap').change(function () {
            datatable.ajax.reload(null,false);
        });

        $('#urutan').change(function () {
            datatable.ajax.reload(null,false);
        });

        $('.but-hapus').click(function (e) {
            e.preventDefault();
            var send_id = $(this).data('id');

            $.ajax({
                url:'tender/hapus',
                method: 'post',
                data:{id:send_id},
                success:function(){
                    $('.page-content-wrapper').pgNotification({
                        style: 'flip',
                        message: "Data Terhapus",
                        position: 'top-right',
                        timeout: 4000,
                        type: 'danger'
                    }).show();

                    $('#mytable').DataTable().draw();
                    $('#modal-del').modal('hide');
                }
            });
        });



    });

</script>