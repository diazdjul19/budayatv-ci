<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<script>
    $(function () {
        $(".myform").validate({
            rules:{
                nama_pustaka:{
                    required: true,
                    minlength: 4,
                },
                <?php if (!isset($data)) { ?>
                file:{
                    required:true
                }
                <?php } ?>
            }
        });
    });
</script>
