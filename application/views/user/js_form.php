<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('.select2').select2();

        $("[name='admin_user']").change(function () {

            if ($(this).is(':checked')) {
                $("#admin_alert").removeClass('hide');
                $("[name='role_user']").val('').change();
            } else {
                $("#admin_alert").addClass('hide');
            }
        });

        $("[name='role_user']").change(function () {
            if ($(this).val() != '') {
                $("[name='admin_user']").removeProp('checked').change();

                $(".switchery").css({
                    "box-shadow": "rgb(233,233,233) 0px 0px 0px 0px inset",
                    "border-color": "rgb(223, 223, 223)",
                    "background-color": "rgb(255,255,255)",
                    "transition": "border 0.4s, box-shadow 0.4s"
                });
                $(".switchery small").css("left", "0");
            }
        });

        $.validator.addMethod("textPermission", function (value, element) {
            var isSuccess = false,
                id = '<?php echo $this->uri->segment(3); ?>';

            $.ajax({
                type: 'post',
                data: {email : value, id : id},
                url: "user/cek_email/",
                async: false,
                success: function (data) {
                    isSuccess = data == 'true' ? true : false;
                }
            });

            return isSuccess;

        }, "nama sudah digunakan");

        $.validator.addMethod("userRole", function (value, element) {
            var isSuccess = false;

            if ($("[name='admin_user']").is(':checked')) {
                isSuccess = true;
                $("#role_user-error").hide();
            }

            if (value != '') {
                isSuccess = true;
                $("#role_user-error").hide();
            }


            return isSuccess;

        }, "Silahkan pilih role untuk user");

        $(".myform").validate({
            rules:{
                email_user:{
                    textPermission: true,
                    minlength: 4,
                    email: true
                },
                role_user: {
                    userRole: true
                },
                <?php if($edit == 0){?>
                pass_user:{
                    minlength: 5
                },
                pass1_user:{
                    minlength: 5,
                    equalTo: "[name='pass_user']"
                },
                <?php } ?>
                nama_user:{
                    required: true,
                    minlength: 4,

                }
            }
        });
    });
</script>