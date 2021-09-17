<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script>
    $(function () {
        $('.inputmask').inputmask("numeric", {
            radixPoint: "-",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: false
        });

        $(".nominal").keypress(function () {
            var total = 0;
            $(".nominal").each(function () {
                var v = $(this).val();

                if(v != ''){
                    total += parseInt(rd(v));
                }
            });

            $(".total").val(total);
        });

        $(".real").keypress(function () {
            var total = 0;
            $(".real").each(function () {
                var v = $(this).val();

                if(v != ''){
                    total += parseInt(rd(v));
                }
            });

            $(".total_real").val(total);
        });


        function rd(str){
            return str.split('.').join('');
        }

        $(".myform").validate({
            rules:{
                nominal_anggaran:{
                    required: true,
                }
            }
        });
    });

</script>