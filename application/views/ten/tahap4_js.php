<div class="modal fade fill-in" id="modal-klien"  role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="pg-close"></i>
    </button>
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-left p-b-5"><span class="semi-bold">Data Pemenang</span> Baru</h5>
            </div>
            <div class="modal-body">
                <form action="" class="klien_form">
                    <div class="row">
                        <div class="col-lg-12">
                            <input name="nama_pemenang" id="nama_klien" autofocus type="text" placeholder="Input Nama Pemenang" class="form-control input-lg" id="icon-filter" name="icon-filter">
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
        $('.inputmask').inputmask("numeric", {
            radixPoint: "-",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: false
        });

        $('.select-klien').select2({
            formatNoMatches: function(term) {
                $('.select2-input').keyup(function(e) {
                    if(e.keyCode == 13) {
                        $('#modal-klien').modal('show');
                        $(".select2-drop").css({'display': 'none'});
                        $("#nama_klien").val('');
                    }
                });
                return "Tekan Enter untuk menambah Nama Pemenang";
            }
        });


        $.validator.addMethod("cekNama", function (value, element) {
            var isSuccess = false;

            $.ajax({
                type: 'post',
                data: {nama: value, id:''},
                url: "pemenang/cek_nama/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "nama sudah digunakan");



        $(".klien_form").validate({
            rules: {
                nama_pemenang: {
                    cekNama: true,
                    minlength: 3,
                    required: true
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "pemenang/tender_add",
                    data: $(form).serialize(),
                    success: function (data) {
                        $("#modal-klien").modal('hide');

                        var nama = $("[name='nama_pemenang']").val();

                        $("[name='pemenang_tender']")
                            .append($('<option>', { value : data })
                                .text(nama))
                            .val(data);
                    }
                });
                return false;
            }
        });



        $(".myform").validate({
            rules: {
                pemenang_tender:{
                    required: true
                },
                menang_tender:{
                    required:true
                }
            }
        });
    });
</script>