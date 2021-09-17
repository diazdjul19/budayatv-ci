<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>

<script>
    $(function () {
        $("#panel-pass").hide();

        $(".myform").validate({
            rules: {
                foto_user: {
                    required: true
                }
            }
        });

        $("[name='ganti_pass']").change(function () {
            var v = $(this).val();
            $('.myform').validate().resetForm();

            var settings = $('.myform').validate().settings;

            if(v == 1){
                $("#panel-pass").slideDown();

                $.extend(true, settings, {
                    rules: {
                        pass_lama:{
                            required: true
                        },
                        pass_user:{
                            required: true,
                            minlength: 5
                        },
                        pass1_user:{
                            required: true,
                            minlength: 5,
                            equalTo: "[name='pass_user']"
                        },
                        foto_user:{
                            required: false
                        }
                    }
                });
            }else{
                $("#panel-pass").slideUp();

                $.extend(true, settings, {
                    rules: {
                        pass_lama:{},
                        pass_user:{},
                        pass1_user:{},
                        foto_user:{
                            required: true
                        }
                    }
                });
            }
        });



    });
</script>