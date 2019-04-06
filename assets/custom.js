$("document").ready(function()
{
    (function get_sensor_data() {
        setTimeout(function(){
            $.ajax({
                type: "GET",
                url : "get_sensor_data.php",
                data : {'op': 'GET_SENSOR_DATA'},
                success: function(response){
                    $("#sensor_data1").html(response);
                    $("#sensor_data2").html(response);
                },
                error: function(x,t,e){
                    console.log(t);
                },
                complete: get_sensor_data,
            });
        }, 1000);
    })();
});