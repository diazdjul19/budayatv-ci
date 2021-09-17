<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $(function () {

        $.validator.addMethod("textRole", function (value, element) {
            var isSuccess = false,
                id = '<?php echo $this->uri->segment(3); ?>';

            $.ajax({
                type: 'POST',
                data: {nama : value, id : id},
                url: "role/cek_text/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "nama sudah digunakan");

        $(".myform").validate({
            rules:{
                nama_role:{
                    textRole: true
                }
            }
        });
        

        
    });
</script>