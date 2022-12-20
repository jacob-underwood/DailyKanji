$(document).ready(
    function() {
        $("#open_register").click(
            function() {
                $("#register_popup").show();
                $("#register_text").show();
                $("#login_text").hide();
            }
        );

        $("#open_login").click(
            function() {
                $("#register_popup").show();
                $("#register_text").hide();
                $("#login_text").show();
            }
        );

        $("#popup_close_button").click(
            function() {
                $("#register_popup").hide();
            }
        )
    }
);