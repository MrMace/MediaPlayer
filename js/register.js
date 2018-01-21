//show and hide the reg or login screen on click.
$(document).ready(function () {


    $("#hideLogin").click(function () {
        $("#loginForm").hide();
        $("#registerForm").show();

    });
    $("#hideReg").click(function () {
        $("#loginForm").show();
        $("#registerForm").hide();
    });
});