
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $(".jam").mask("99:99");

        $('.datep').datepicker({ format: 'dd-mm-yyyy' });

        $('.inputmask').inputmask("numeric", {
            radixPoint: "-",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: false
        });




        $(".myform").validate({
            rules: {
                penawaran_tender:{
                    required: true
                },
                tgl_tender:{
                    required:true
                }
            }
        });
    });
</script>