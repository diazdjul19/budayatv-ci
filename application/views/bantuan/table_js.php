<div class="modal fade slide-up disable-scroll" id="modal-del" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-body text-center m-t-20">
                    <h4 class="no-margin p-b-10">Anda yakin menghapus data ini?</h4>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <a href="" class="btn btn-danger but-hapus" data-id="">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>

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
                <?php if (get_staff_user_id() == '6bmgy' || get_staff_user_id() == 'duji9') { ?>
                {"width": "70%"},
                {"width": "30%"}
                <?php }else{ ?>
                {"width": "100%"}
                <?php } ?>
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
            "iDisplayLength": 20,
            'ajax':{
                url: 'bantuan/table',
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

                $('.but-del').click(function(e){
                    e.preventDefault();
                    var del_link = $(this).data('id');

                    $(".but-hapus").data('id', del_link);
                    $('#modal-del').modal('show');
                });

                $(".detail").click(function (e) {
                    e.preventDefault();

                    var ud = $(this).attr('data-id');

                    $.ajax({
                        url: 'bantuan/detail/'+ ud,
                        success: function(data){
                            $("#tampil").html(data);
                        }
                    });
                });

            }
        });

        $('#search-table').keyup(function() {
            $('#mytable').DataTable().search(this.value).draw();
        });

        $('.but-hapus').click(function (e) {
            e.preventDefault();
            var send_id = $(this).data('id');

            $.ajax({
                url:'bantuan/hapus',
                method: 'post',
                data:{id:send_id},
                success:function(){
                    toastr.warning('Data terhapus');
                    $('#mytable').DataTable().draw();
                    $('#modal-del').modal('hide');
                }
            });
        });
    });

</script>