$(document).ready(function() {
    setInterval(function() {
        $.ajax({
            url: "admin/config/variable.php",
            type: "GET",
            dataType: "json",
            success: function(result) {
                $("#variable1").text(result.variable1);
                $("#variable2").text(result.variable2);
                $("#variable3").text(result.variable3);
            }
        });
    }, 5000);
});