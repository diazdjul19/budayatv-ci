<div class="modal fade slide-up disable-scroll" id="modal-bayar" tabindex="-1" role="dialog" aria-hidden="false">
    <div class="modal-dialog modal-xxl">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-body">
                    <h5>Pembayaran</h5>

                    <div class="row mt-4">
                        <div class="col">
                            <table class="table table-bordered">
                                <tbody>
                                <tr>
                                    <td>
                                        <p class="small bold">Nilai SPK</p>
                                        <span id="nilai"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="small bold">Detail</p>
                                        <span id="detail"></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p class="small bold">Realisasi</p>
                                        <span id="real"></span>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col">
                            <form action="pengawasan/pembayaran_save" method="post" class="myform" enctype="multipart/form-data">
                                <input type="hidden" name="id_progress">
                                <input type="hidden" name="id_proyek">
                                <div class="form-group form-group-default m-0">
                                    <label for="">Tanggal BAPP</label>
                                    <input type="text" name="bayar_progress" value="" class="form-control datep">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">Tanggal BAKP/BAST</label>
                                    <input type="text" name="approval_progress" value="" class="form-control datep">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">Nilai Pembayaran</label>
                                    <input type="text" name="nominal_bayar_progress" value="" class="form-control inputmask">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">Mata Anggaran</label>
                                    <input type="text" name="rek_progress" value="" class="form-control">
                                </div>
                                <div class="form-group form-group-default m-0">
                                    <label for="">Dokumen</label>
                                    <input type="file" name="file" value="" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-success mt-3"><i class="fa fa-check mr-2"></i> Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<script>
    $(function () {
        $('.datep').datepicker({ format: 'dd-mm-yyyy' });

        $('.inputmask').inputmask("numeric", {
            radixPoint: "-",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: false
        });

        $('.but-bayar').click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            $.ajax({
                url:'pengawasan/get_progress/'+ id,
                success:function(data){
                    var nom = (parseInt(data.nilai_spk) * data.real_progress)/ 100;

                    $("#nilai").html("Rp. " +parseInt(data.nilai_spk).toLocaleString('id'));
                    $("#detail").html(data.detail_progress);
                    $("#real").html(data.real_progress + "%");
                    $("[name=nominal_bayar_progress]").val(nom);
                    $("[name=id_progress]").val(data.id_progress);
                    $("[name=id_proyek]").val(data.proyek_id_progress);

                    $('#modal-bayar').modal('show');

                }
            });

        });


        $(".myform").validate({
            rules:{
                bayar_progress:{
                    required: true,
                },
                approval_progress:{
                    required: true,
                },
                rek_progress:{
                    required: true,
                },
            }
        });
    });
</script>