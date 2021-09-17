<script>
    $(function () {
        $('.datep').datepicker({
            format: 'dd-mm-yyyy'
        });

        $('.inputmask').inputmask("numeric", {
            radixPoint: "-",
            groupSeparator: ".",
            digits: 0,
            autoGroup: true,
            rightAlign: false
        });
    });
</script>