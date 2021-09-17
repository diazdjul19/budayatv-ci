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

<script>
    $(function () {
        $(".table-pembayaran").hover(function () {
            $(".hapus-pembayaran").toggle();
        });

        $(".but-del").click(function (e) {
            e.preventDefault();
            var id = $(this).data('id');

            $(".but-hapus").data('id', id);
            $("#modal-del").modal('show');
        });

        $('.but-hapus').click(function (e) {
            e.preventDefault();
            var send_id = $(this).data('id');

            $.ajax({
                url:'penagihan/hapus_pembayaran',
                method: 'post',
                data:{id:send_id},
                success:function(){
                    location.reload();
                }
            });
        });

        $('.datep').datepicker({ format: 'dd-mm-yyyy' });

        $('.inputmask').inputmask("numeric", {
            radixPoint: "-",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: false
        });

        $(".pembayaran-penagihan").dblclick(function () {
            $(this).children('table').addClass('hide');
            $(this).children(".form-pembayaran-penagihan").removeClass('hide');
        });

        $(".realisasi-penagihan").dblclick(function () {
            $(".realisasi-penagihan").find('table').removeClass('hide');
            $(this).find('table').addClass('hide');

            $(".form-realisasi-penagihan ").addClass('hide');

            $(this).children('table').addClass('hide');
            $(this).children(".form-realisasi-penagihan").removeClass('hide');
        });

        $(".ttp").dblclick(function () {
            $(this).children('table').addClass('hide');
            $(this).children(".form-ttp").removeClass('hide');
        });

        $(".edit--input").keypress(function( event ) {
            if ( event.which == 13 ) {
                $.ajax({
                    url:'proyek/stlp4_revisi',
                    method:"post",
                    data:{
                        val: $(this).val(),
                        id: $(this).data('id'),
                        jenis: $(this).data('jenis')
                    },
                    success: function () {
                        location.reload();
                    }
                });
            }
        });

        $(".edit--date")
            .datepicker({format: 'dd-mm-yyyy'})
            .on('hide', function(e) {
                $.ajax({
                    url:'proyek/stlp4_revisi',
                    method:"post",
                    data:{
                        val: $(this).val(),
                        id: $(this).data('id'),
                        jenis: $(this).data('jenis')
                    },
                    success: function () {
                        location.reload();
                    }
                });
            });


        $("[name='check_pph_penagihan']").change(function () {
            var formnya = $(this).parents("form");
            $("#ppn_penagihan").addClass('hide');

            if ($(this).is(':checked')) {
                formnya.find("#ppn_penagihan").removeClass('hide');
                var invoice = formnya.find("input[name='invoice_nominal_penagihan']").val().split('.').join("");
                create_ppn(invoice);
            } else {
                $("[name=invoice_ppn_nominal_penagihan], [name=invoice_total_nominal_penagihan]").val('');
            }
        });

        $("[name=invoice_nominal_penagihan]").change(function () {
            var invoice = $(this).val().split('.').join("");
            create_ppn(invoice);
        });

        $("[name='ppn_penagihan']").change(function () {
            if ($(this).is(':checked')) {

                $("#ppn_pembayaran_penagihan").removeClass('hide');

                var nilai1 =  $("[name='bayar_nominal_penagihan']").val(),
                    nilai = nilai1.replace(/\./g, ''),

                    in_ppn = nilai / 1.1,
                    ppn = in_ppn * 0.1;

                $("[name='ppn_pembayaran_penagihan']").val(ppn);

            } else {
                $("#ppn_pembayaran_penagihan").addClass('hide');
                $("[name='ppn_pembayaran_penagihan']").val(0);
            }
            net_pembayaran_penagihan();
        });

        $("[name='pph_penagihan']").change(function () {
            if ($(this).is(':checked')) {
                $("#pph_pembayaran_penagihan").removeClass('hide');
            } else {
                $("#pph_pembayaran_penagihan").addClass('hide');
                $("[name='pph_pembayaran_penagihan']").val(0);
            }
            net_pembayaran_penagihan();
        });

        $("[name='pph_persen_pembayaran_penagihan']").change(function () {
            var  v = $(this).val();

            if (v == 3)
            {
                var nilai1 =  $("[name='bayar_nominal_penagihan']").val(),
                    nilai = nilai1.replace(/\./g, ''),

                    in_ppn = nilai / 1.1,
                    pph = in_ppn * 0.03;

                $("[name='pph_pembayaran_penagihan']").val(pph);

            }else if (v == 2)
            {
                var nilai1 =  $("[name='bayar_nominal_penagihan']").val(),
                    nilai = nilai1.replace(/\./g, ''),

                    in_ppn = nilai / 1.1,
                    pph = in_ppn * 0.02;

                $("[name='pph_pembayaran_penagihan']").val(pph);
            }else{
                $("[name='pph_pembayaran_penagihan']").val(0);
            }
            net_pembayaran_penagihan();
        });

        $("[name='pbank_penagihan']").change(function () {
            if ($(this).is(':checked')) {

                $("#potongan_bank_pembayaran_penagihan").removeClass('hide');
                $("[name='potongan_bank_pembayaran_penagihan']").on('input',function () {
                    net_pembayaran_penagihan();
                });

            } else {
                $("#potongan_bank_pembayaran_penagihan").addClass('hide');
                $("[name='potongan_bank_pembayaran_penagihan']").val(0);
            }
            net_pembayaran_penagihan();
        });

        $("[name='plain_penagihan']").change(function () {
            if ($(this).is(':checked')) {

                $("#potongan_lain_pembayaran_penagihan").removeClass('hide');
                $("[name='potongan_lain_pembayaran_penagihan']").on('input',function () {
                    net_pembayaran_penagihan();
                });

            } else {
                $("#potongan_lain_pembayaran_penagihan").addClass('hide');
                $("[name='potongan_lain_pembayaran_penagihan']").val(0);
            }
            net_pembayaran_penagihan();
        });
        
        function create_ppn(invoice) {
            // var invoice = $("[name=invoice_nominal_penagihan]").val().split('.').join("");

            var ppn = (invoice * 0.1);
            var total = +invoice + +ppn;

            $("[name=invoice_ppn_nominal_penagihan]").val(ppn);
            $("[name=invoice_total_nominal_penagihan]").val(total);
        }

        function net_pembayaran_penagihan() {
            var gross1 = $("[name='bayar_nominal_penagihan']").val(),
                gross = gross1.replace(/\./g, '');
            var ppn1 = $("[name='ppn_pembayaran_penagihan']").val(),
                ppn = ppn1.replace(/\./g, '');
            var pph1 = $("[name='pph_pembayaran_penagihan']").val(),
                pph = pph1.replace(/\./g, '');
            var bank1 = $("[name='potongan_bank_pembayaran_penagihan']").val(),
                bank = bank1.replace(/\./g, '');
            var lain1 = $("[name='potongan_lain_pembayaran_penagihan']").val(),
                lain = lain1.replace(/\./g, '');

            var net = gross - ppn - pph - bank - lain;
            $("[name='nett_pembayaran_penagihan']").val(net);

        }
    });
</script>