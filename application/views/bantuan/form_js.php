<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
<script>
    $(function () {
        $('.summernote').summernote({
            height: 500
        });

        $(".myform").validate({
            rules:{
                nama_bantuan:{
                    required: true
                }
            }
        });
    });
</script>