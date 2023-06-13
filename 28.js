
<script type="text/javascript">
    $('#years').change(function(){
        $.ajax({
            type:"post",
            URL: '/smsapi/info/data',
            data:{
                year:$('#years').val()
            },
            success:function(data){
                dataChart = data[0];
                months = data[1];
            }
        }).done(function (data){
            rawChart();
        })
    })
</script>