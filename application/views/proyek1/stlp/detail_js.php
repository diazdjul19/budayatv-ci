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
        $('.but-del').click(function(e){
            e.preventDefault();
            var del_link = $(this).data('id');

            $(".but-hapus").attr('href', 'proyek/hapus/'+ del_link);
            $('#modal-del').modal('show');
        });

        $(".but-bq").click(function (e) {
            e.preventDefault();

            $('#modal-bq').modal('show');
        });
    });

    </script>