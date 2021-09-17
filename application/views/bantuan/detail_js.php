<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $(function () {

        $(".myform").validate({
            rules:{
                isi_revisi:{
                    required: true
                }
            }
        });
    });
</script>