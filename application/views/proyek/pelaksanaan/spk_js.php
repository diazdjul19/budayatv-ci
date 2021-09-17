<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>

<script>
    $(function () {
        $('.datep').datepicker({ format: 'dd-mm-yyyy' });

        $('.inputmask').inputmask("numeric", {
            radixPoint: "-",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: false
        });

        $(".myform").validate({
            rules:{
                nama_spk:{
                    required: true,
                    minlength: 3
                },
                nilai_spk:{
                    required: true
                }
            }
        });
    });
</script>