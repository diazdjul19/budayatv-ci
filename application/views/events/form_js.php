<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<script>
    $(function () {
        $('.datep').datepicker({ format: 'dd-mm-yyyy' });

        $(".myform").validate({
            rules:{
                nama_event:{
                    required: true,
                    minlength: 3
                },
                mulai_event:{
                    required: true
                }
            }
        });
    });
</script>