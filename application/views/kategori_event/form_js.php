<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $(".myform").validate({
            rules:{
                nama_ke:{
                    required: true,
                    minlength: 4
                }
            }
        });
    });
</script>