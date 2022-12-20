$(document).ready(
    function() {
        $("#open_register").click(
            function() {
                $("#register_popup").show();
                $("#register_form").show();
                $("#login_form").hide();
            }
        );

        $("#open_login").click(
            function() {
                $("#register_popup").show();
                $("#register_form").hide();
                $("#login_form").show();
            }
        );
    }
);