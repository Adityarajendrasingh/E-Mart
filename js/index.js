$(document).ready(function () {

    //top sale
    $("#topsale.owl-carousel").owlCarousel({
        loop: true,
        nav: true,
        dots: false,
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 5
            }
        }
    });

    //product qty session
    let $qty_up = $(".qty.qty_up");
    let $qty_down = $(".qty.qty_down");
    let $input = $(".qty.qty_input");

    //click btn
    $qty_up.click(function (e) {
        if ($input.val() >= 1 && $input.val() <= 9) {
            $input.val(function (i, oldval) {
                return ++oldval;
            })
        }
    });
});
    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
            email
        );
    }
    function send_otp() {
        $("#email_msg").html("");
        var email = $("#useremail").val().trim();
        if (email == "") {
            $("#email_msg").css("color", "red");
            $("#email_msg").html("Please enter your email id ");
        } else if (!isEmail(email)) {
            $("#email_msg").css("color", "red");
            $("#email_msg").html("Please enter a valid email Id ");
        } else {
            $("#sendOtpBtn").html("Please wait!!");
            $("#sendOtpBtn").attr("disabled", true);
            $.ajax({
                url: "send_otp.php",
                type: "post",
                data: { email: email },
                success: function (response) {
                    var result = JSON.parse(response);

                    if (result.exists) {
                        $("#sendOtpBtn").html("Send OTP");
                        $("#sendOtpBtn").attr("disabled", false);
                        $("#email_msg").addClass("text-danger");
                        $("#email_msg").html("Email ID already exists");
                    } else if (result.success) {
                        $("input[name=uemail]").attr("readonly", true);
                        $("#emailOtpInput").attr("hidden", false);
                        $("#sendOtpBtn").attr("hidden", true);
                        $("#verifyOtpBtn").attr("hidden", false);
                    } else if (result.error) {
                        $("#sendOtpBtn").html("Send OTP");
                        $("#sendOtpBtn").attr("disabled", false);
                        $("#email_msg").addClass("text-danger");
                        $("#email_msg").html(jsonResponse.error);
                    } else {
                        $("#email_msg").html("");
                        $("#email_msg").removeClass("text-danger");
                        $("#email_msg").addClass("text-info");
                        $("#email_msg").html("Please try after sometime ");
                        $("#sendOtpBtn").html("Send OTP");
                        $("#sendOtpBtn").attr("disabled", false);
                    }
                },
            });
        }
    }
    function verify_otp() {
        $("#email_msg").html("");
        var otp = $("#emailOtpInput").val().trim();
        if (otp == "") {
            $("#email_msg").css("color", "red");
            $("#email_msg").html("Please enter your otp ");
        } else {
            $("#email_msg").html("");
            $.ajax({
                url: "check_otp.php",
                type: "post",
                data: { otp: otp },
                success: function (response) {
                    let result = JSON.parse(response);
                    if (result.success) {
                        $("#email_msg").html("");
                        $("input[name=uemail]").attr("readonly", true);
                        $("#emailOtpInput").attr("hidden", true);
                        $("#sendOtpBtn").attr("hidden", true);
                        $("#verifyOtpBtn").attr("hidden", true);
                        $("#email_msg").addClass("text-success");
                        $("#email_msg").html("Email id is verified");
                        $("#user_register").attr("disabled", false);
                        $("#user_register").attr("value", "Register");
                    } else {
                        $("#email_msg").html("");
                        $("#email_msg").css("color", "red");
                        $("#email_msg").html("Please enter  a valid otp ");
                    }
                },
            });
        }
    }

    function togglePassword() {
        var $passwordField = $("#password");
        var type = $passwordField.attr("type");
        if (type == "password") {
            $passwordField.attr("type", "text");
        } else {
            $passwordField.attr("type", "password");
        }
    }
