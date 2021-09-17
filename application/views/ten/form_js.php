<div class="modal fade fill-in" id="modal-klien"  role="dialog" aria-hidden="true">
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
                            <input name="nama_klien" id="nama_klien" autofocus type="text" placeholder="Input Nama Klien" class="form-control input-lg" id="icon-filter" name="icon-filter">
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



<div class="modal fade fill-in" id="modal-perolehan"  role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="pg-close"></i>
    </button>
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-left p-b-5"><span class="semi-bold">Data Perolehan</span> Baru</h5>
            </div>
            <div class="modal-body">
                <form action="" class="perolehan_form">
                    <div class="row">
                        <div class="col-lg-12">
                            <input name="nama_lokasi" id="nama_lokasi" autofocus type="text" placeholder="Input Nama Perolehan" class="form-control input-lg" id="icon-filter" name="icon-filter">
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


<div class="modal fade slide-up disable-scroll" id="modal-del" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-sm">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-body text-center m-t-20">
                    <h4 class="no-margin p-b-10">Anda yakin menghapus data ini?</h4>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <?php if(isset($data)) {?>
                        <a href="tender/hapus/<?php echo $data->id_tender ?>" class="btn btn-danger" data-id="">Hapus</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('.but-del').click(function(e){
            e.preventDefault();
            var del_link = $(this).data('id');

            $(".but-hapus").data('id', del_link);
            $('#modal-del').modal('show');
        });

        $('.inputmask').inputmask("numeric", {
            radixPoint: "-",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            prefix: 'Rp ', //No Space, this will truncate the first character
            rightAlign: false
        });
        $(".jam").mask("99:99");

        $('.datep').datepicker({ format: 'dd-mm-yyyy' });

        $('.select-klien').select2({
            formatNoMatches: function(term) {
                $('.select2-input').keyup(function(e) {
                    if(e.keyCode == 13) {
                        $('#modal-klien').modal('show');

                        $("[name='nama_klien']").val('');
                        $("[name='nama_klien']").focus();

                        $(".select2-drop").css({'display': 'none'});
                    }
                });
                return "Tekan Enter untuk menambah Klien";
            }
        });


        $.validator.addMethod("cekNama", function (value, element) {
            var isSuccess = false;

            $.ajax({
                type: 'post',
                data: {nama: value, id:''},
                url: "klien/cek_nama/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "nama sudah digunakan");



        $(".klien_form").validate({
            rules: {
                nama_klien: {
                    cekNama: true,
                    minlength: 3,
                    required: true
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "klien/tender_add",
                    data: $(form).serialize(),
                    success: function (data) {
                        $("#modal-klien").modal('hide');

                        var nama = $("[name='nama_klien']").val();

                        $("[name='klien_id_tender']")
                            .append($('<option>', { value : data })
                                .text(nama))
                            .val(data)
                            .trigger('change');
                    }
                });
                return false;
            }
        });


        //-----//

        $('.select-perolehan').select2({
            formatNoMatches: function(term) {
                $('.select2-input').keyup(function(e) {
                    if(e.keyCode == 13) {
                        $('#modal-perolehan').modal('show');
                        $(".select2-drop").css({'display': 'none'});
                        $("#nama_lokasi").val('');
                    }
                });
                return "Tekan Enter untuk menambah Perolehan";
            }
        });


        $.validator.addMethod("cekNamaPerolehan", function (value, element) {
            var isSuccess = false;

            $.ajax({
                type: 'post',
                data: {nama: value, id:''},
                url: "perolehan/cek_nama/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "nama sudah digunakan");



        $(".perolehan_form").validate({
            rules: {
                nama_lokasi: {
                    cekNamaPerolehan: true,
                    minlength: 3,
                    required: true
                }
            },
            submitHandler: function (form) {
                $.ajax({
                    type: "POST",
                    url: "perolehan/tender_add",
                    data: $(form).serialize(),
                    success: function (data) {
                        $("#modal-perolehan").modal('hide');

                        var nama = $("[name='nama_lokasi']").val();

                        $("[name='perolehan_tender']")
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
                nama_tender:{
                    required: true,
                    minlength: 3
                },
                klien_id_tender:{
                    required:true
                }
            }
        });
    });
</script>