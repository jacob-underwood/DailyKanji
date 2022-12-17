<?php

include("includes/handlers/welcome-handler.php");

?>

<!DOCTYPE html>

<html lang="eng" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Welcome | DailyKanji</title>
</head>

<body>

    <script src="includes/scripts/utilities.js"></script>

    <div id="text_container">
        <form id="welcome_form" action="welcome.php" method="POST">
            <h1>Welcome to DailyKanji!</h1>

            <!--TODO: Temporary uses a form to check for button click. Change to AJAX or something similar.-->
            <p>
                <button type="submit" id="sign_up_button" name="signUpButton">Sign up</button>
            </p>
            <p>
                <button type="submit" id="sign_in_button" name="signInButton">Sign in</button>
            </p>
        </form>
    </div>

</body>

</html>