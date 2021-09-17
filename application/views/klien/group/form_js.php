<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $(function () {

        $.validator.addMethod("textPermission", function (value, element) {
            var isSuccess = false,
                id = '<?php echo $this->uri->segment(3); ?>';

            $.ajax({
                type: 'post',
                data: {nama : value, id : id},
                url: "klien_group/cek_nama/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "nama sudah digunakan");


        $(".myform").validate({
            rules:{
                nama_group_klien:{
                    textPermission: true,
                    minlength: 4
                }
            }
        });
    });
</script>