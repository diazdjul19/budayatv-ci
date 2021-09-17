<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $(function () {

        $(".myform").validate({
            rules:{
                nama_proyek:{
                    required: true,
                }
            }
        });
    });

</script>