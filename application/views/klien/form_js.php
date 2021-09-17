<div class="modal fade fill-in" id="modal-grup-klien"  role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="pg-close"></i>
    </button>
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-left p-b-5"><span class="semi-bold">Data Klien</span> Baru</h5>
            </div>
            <div class="modal-body">
                <form action="" class="klien_form">
                    <div class="row">
                        <div class="col-lg-12">
                            <input name="nama_group_klien" id="nama_group_klien" autofocus type="text" placeholder="Input Nama Grup Klien" class="form-control input-lg" id="icon-filter" name="icon-filter">
                        </div>
                    </div>
                    <div class="row p-t-10">
                        <div class="col-lg-12 sm-text-center">
                            <button type="submit" class="btn btn-primary btn-lg btn-large fs-15">Simpan</button>
                            <button type="button" class="btn btn-danger btn-lg btn-large fs-15" data-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script>
    $(function () {

        $('.select-group-klien').select2({
            formatNoMatches: function(term) {
                $('.select2-input').keyup(function(e) {
                    if(e.keyCode == 13) {
                        var v = $(this).val();
                        $('#modal-grup-klien').modal('show');

                        $("[name='nama_group_klien']").val(v);
                        $("[name='nama_group_klien']").focus();

                        $(".select2-drop").css({'display': 'none'});
                    }
                });
                return "Tekan Enter untuk menambah Klien";
            }
        });

        $.validator.addMethod("textPermission", function (value, element) {
            var isSuccess = false,
                id = '<?php echo $this->uri->segment(3); ?>';

            $.ajax({
                type: 'post',
                data: {nama : value, id : id},
                url: "klien/cek_nama/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "nama sudah digunakan");


        $(".myform").validate({
            rules:{
                nama_klien:{
                    textPermission: true,
                    minlength: 4
                }
            }
        });
    });
</script>