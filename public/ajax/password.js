$(document).ready(function(){
    $("#submit").attr("disabled", 'disabled');
        $("#c_password").keyup(function() {
            var c_password = $(this).val();
            $.ajax({
                url: "password/create",
                type: "get",
                data: {
                    c_password: c_password
                },
                success: function(data) {
                    if (data == "matched") {
                        $(".icon").html("<i style='color:green;float: right;margin-top: -25px;' class ='fas fa-check-circle'></i>");
                        $("#submit").attr("disabled", 'disabled');
                        $("#n_password").removeAttr("disabled", 'disabled');
                        $("#r_password").removeAttr("disabled", 'disabled');

                        $("#r_password").keyup(function() {
                            var r_password = $(this).val();
                            var n_password = $("#n_password").val();

                            if (r_password != '' && r_password == n_password) {
                                $(".r-icon").html("<i style='color:green;float: right;margin-top: -25px;' class ='fas fa-check-circle'></i>");
                                $("#submit").removeAttr("disabled", 'disabled');
                            } else {
                                $(".r-icon").html("<i style='color:red;float: right;margin-top: -25px;' class ='fas fa-times-circle'></i>");
                                $("#submit").attr("disabled", 'disabled');
                            }
                        });

                    } else {
                        $(".icon").html("<i style='color:red;float: right;margin-top: -25px;' class ='fas fa-times'></i>");
                        $("#submit").attr("disabled", 'disabled');
                        $("#n_password").attr("disabled", 'disabled');
                        $("#r_password").attr("disabled", 'disabled');
                    }

                }

            })

        });
});

    $("#form").submit(function(e) {
        e.preventDefault();
        var password = $("#r_password").val();

        $.ajax({
            url     : "password/store",
            data    : {
                password:password
            },
            type    : "post",
            dataType: "json",
            success: function(data) {
                if(data.msgtype=="success") {
                  window.location.replace("/admin");
                }
            }  
        });
    });