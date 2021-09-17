<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script>
    $(function () {
        $(".summernote").summernote({
            height:100,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });


        $(".but-nama").click(function (e) {
            e.preventDefault();

            var nm = $("#n_nama").html();
            $("#modal-nama h5").html("Edit <span class='semi-bold'> Nama Perusahaan</span>");
            $("#modal-nama label").html("Nama Perusahaan");
            $("#isi").attr('name', 'nama_profil');

            $("#isi").val(nm);
            $("#modal-nama").modal('show');
        });

        $(".but-slogan").click(function(e){
            e.preventDefault();

            var nm = $("#n_slogan").html();
            $("#modal-nama h5").html("Edit <span class='semi-bold'> Slogan</span>");
            $("#modal-nama label").html("Slogan");
            $("#isi").attr('name', 'slogan_profil');

            $("#isi").val(nm);
            $("#modal-nama").modal('show');
        });

        $(".but-visi").click(function(e){
            e.preventDefault();

            var nm = $("#n_visi").html();
            $("#modal-text h5").html("Edit <span class='semi-bold'> Visi</span>");
            $("#modal-text label").html("Visi");
            $("#nmisi").attr('name', 'visi_profil');

            $("#nmisi").summernote('code', nm);

            $("#modal-text").modal('show');
        });

        $(".but-misi").click(function(e){
            e.preventDefault();

            var nm = $("#n_misi").html();
            $("#modal-text h5").html("Edit <span class='semi-bold'> Misi</span>");
            $("#modal-text label").html("Misi");
            $("#nmisi").attr('name', 'misi_profil');

            $("#nmisi").summernote('code', nm);
            $("#modal-text").modal('show');
        });

        $(".but-detail").click(function(e){
            e.preventDefault();

            var nm = $("#n_detail").html();
            $("#modal-text h5").html("Edit <span class='semi-bold'> Detail</span>");
            $("#modal-text label").html("Detail");
            $("#nmisi").attr('name', 'detail_profil');

            $("#nmisi").summernote('code', nm);
            $("#modal-text").modal('show');
        });

        $("#namaform").submit(function(e){
            e.preventDefault();
            var np = $("#isi").val(),
                nm = $("#isi").attr('name');

            $.ajax({
                url:'profil/save_nama',
                method: 'post',
                data:$(this).serialize(),
                success:function(){
                    $('#modal-nama').modal('hide');

                    if(nm == 'nama_profil'){
                        $("#n_nama").html(np);
                        toastr.success('Nama Perusahaan Terupdate');
                    }else if(nm == 'slogan_profil'){
                        $("#n_slogan").html(np);
                        toastr.success('Slogan Terupdate');
                    }
                }
            });
        });

        $("#form-text").submit(function(e){
            e.preventDefault();
            var np = $("#nmisi").summernote('code'),
            nm = $("#nmisi").attr('name');

            $.ajax({
                url:'profil/save_nama',
                method: 'post',
                data:$(this).serialize(),
                success:function(){
                    $('#modal-text').modal('hide');

                    if(nm == 'visi_profil'){
                        $("#n_visi").html(np);
                        toastr.success('Visi Terupdate');
                    }else if(nm == 'misi_profil'){
                        $("#n_misi").html(np);
                        toastr.success('Misi Terupdate');
                    }else if(nm == 'detail_profil'){
                        $("#n_detail").html(np);
                        toastr.success('Detail Terupdate');
                    }
                }
            });
        });

        function get_alamat(){
            $.ajax({
                url: "profil/get_alamat",
                success: function(data){
                    $("#list-alamat").html(data);

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
                    
                    $(".but-edit").click(function(e){
                        e.preventDefault();

                        var id = $(this).data('id');
                        
                        $.ajax({
                            url: 'profil/get_edit/'+ id,
                            success:function(data){
                                $("[name='id_alamat']").val(data.id_alamat);
                                $("[name='nama_alamat']").val(data.nama_alamat);
                                $("[name='detail_alamat']").val(data.detail_alamat);
                                $("[name='detail2_alamat']").val(data.detail2_alamat);
                                $("[name='kota_alamat']").val(data.kota_alamat);
                                $("[name='provinsi_alamat']").val(data.provinsi_alamat);
                                $("[name='telp_alamat']").val(data.telp_alamat);
                                $("[name='fax_alamat']").val(data.fax_alamat);
                                $("[name='email_alamat']").val(data.email_alamat);

                                $("#modal-alamat").modal('show');
                                $("#modal-alamat h5").html("Edit <span class='semi-bold'>Alamat</span>");
                            }
                        });
                        
                    });

                    $(".but-pusat").click(function(e){
                        e.preventDefault();

                        var id = $(this).data('id');
                        $.ajax({
                            url: 'profil/set_pusat/'+ id,
                            success:function(){
                                get_alamat();
                            }
                        });
                    });
                }
            });
        }

        get_alamat();

        $(".but-add-alamat").click(function(e){
            e.preventDefault();

            $("#modal-alamat h5").html("Tambah <span class='semi-bold'>Alamat</span>");
            $("#alamatform input").val('');

            $("#modal-alamat").modal('show');
        });

        $("#alamatform").validate({
            rules:{
                nama_alamat:{
                    required: true
                }
            },
            submitHandler: function(form) {
                $.ajax({
                    url: "profil/save_alamat",
                    type: 'post',
                    data: $(form).serialize(),
                    success: function() {
                        toastr.success('Data Tersimpan');
                        $("#modal-alamat").modal('hide');

                        get_alamat();
                    }
                });
            }
        });

        $('.but-hapus').click(function (e) {
            e.preventDefault();
            var send_id = $(this).data('id');

            $.ajax({
                url:'profil/hapus',
                method: 'post',
                data:{id:send_id},
                success:function(){
                    toastr.warning('Data terhapus');
                    $('#modal-del').modal('hide');
                    get_alamat();

                }
            });
        });

    });
</script>