
<script>
    $(function () {
        $('.fpg').blur(function () {
            var idp = $(this).data('id');
            var pg = $(this).data('pg');
            var v = $(this).val();
            var vt = v - pg;
            var t = parseFloat(vt).toFixed(4);
            $.ajax({
                url:'pelaksanaan/progress_update',
                method:"post",
                data:{
                    val: v,
                    id: idp,
                    deviasi: t
                },
                success: function () {
                    $(".deviasi[data-id="+idp+"]").html(t +" %");

                }
            });
        });
    });
</script>