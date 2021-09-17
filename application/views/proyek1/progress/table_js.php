<script>
    $(function(){
        $('.ubah').dblclick(function () {
            var id = $(this).data('id');
            $("form[data-id='"+ id +"']").removeClass('hide');
            $("tr[data-id='"+ id +"']").removeClass('hide');
        });

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
    })
</script>