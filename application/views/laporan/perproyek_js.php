<script>
    $(function () {
        $('#proyek').change(function () {
            var id = $(this).val();
            if(id == ''){
                $("#tampil").html('');
            }else{
                $.ajax({
                    url: 'laporan/get_proyek/'+id,
                    success: function (data) {
                        $("#tampil").html(data);
                    }
                });
            }

        });
    });
</script>