<div class="modal fade fill-in" id="modal-detail" role="dialog" aria-hidden="true">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
        <i class="pg-close"></i>
    </button>
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="text-left p-b-5"><span class="semi-bold">Data</span> Tender</h5>
            </div>
            <div class="modal-body">
                <div id="content-detail"></div>
                <div class="row p-t-10">
                    <div class="col-lg-12 sm-text-center">
                        <button type="button" class="btn btn-danger fs-15" data-dismiss="modal"><i
                                class="fa fa-times m-r-10"></i> Tutup
                        </button>
                        <a href="" id="link-detail" class="btn btn-primary">Buka Tender <i
                                class="fa fa-arrow-right m-l-10"></i> </a>
                    </div>
                </div>
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
                    <a href="klien_group/hapus_e/<?php echo $data->id_group_klien ?>" class="btn btn-danger">Hapus</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function () {
        $("[rel='tooltip']").tooltip({
            html: true,
            container: 'body'
        });

        $('.but-del').click(function(e){
            e.preventDefault();

            $('#modal-del').modal('show');
        });

    });

</script>