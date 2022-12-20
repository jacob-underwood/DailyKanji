<?php

include("includes/config.php");

session_abort();

include('includes/classes/Account.php');
include('includes/classes/Constants.php');

$account = new Account($connection);

include('includes/handlers/register-handler.php');
include('includes/handlers/login-handler.php');

include('includes/utilities.php');

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8">
    <title>DailyKanji</title>

    <link rel="stylesheet" type="text/css" href="assets/styles/register.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="assets/scripts/register.js"></script>

</head>

<body>

    <?php

    if (isset($_SESSION['loggedInUserEmail'])) {
        if ($_SESSION['loginMethod'] == 'register') {
            echo '<script>
                    $(document).ready(
                        function () {
                            $("#input_container").hide();
                            $("#register_greeting").show();
                        }
                    );
                </script>';
        } else if ($_SESSION['loginMethod'] == 'login') {
            echo '<script>
                    $(document).ready(
                        function () {
                            $("#input_container").hide();
                            $("#login_greeting").show();
                        }
                    );
                </script>';
        }
    }

    ?>

    <script src="assets/scripts/utilities.js"></script>

    <h1>DailyKanji</h1>

    <h2 id="open_register">Open Register</h2>
    <h2 id="open_login">Open Log In</h2>

    <div id="register_popup">
        <div id="popup_close">
            <span id="popup_close_button">Close</span>
        </div>
        <div id="input_container">
            <div id="register_text">
                <form id="register_form" action="index.php" method="POST">
                    <h2>Register a new account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$emailAlreadyExists); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailLength); ?>
                        <label for="submitted_register_email">Email:</label>
                        <input id="submitted_register_email" name="submittedEmail" type="email" autocomplete="email"
                            inputmode="email" value="<?php getPreviousValue('submittedEmail'); ?>" required />
                    </p>
                    <p id="register_password_line">
                        <?php echo $account->getError(Constants::$passwordInvalid); ?>
                        <?php echo $account->getError(Constants::$passwordLength); ?>
                        <label for="submitted_register_password">Password:</label>
                        <input id="submitted_register_password" name="submittedPassword" type="password"
                            autocomplete="new-password" required />
                        <input id="show_password" type="checkbox"
                            onclick="passwordReveal('submitted_register_password')">
                        <label for="show_password">Show Password</label>
                    </p>
                    <button type="submit" name="registerButton">Register</button>
                </form>
            </div>

            <div id="login_text">
                <form id="login_form" action="index.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginUnsuccessful); ?>
                        <label for="submitted_login_email">Email:</label>
                        <input id="submitted_login_email" name="submittedEmail" type="email" autocomplete="email"
                            inputmode="email" value="<?php getPreviousValue('submittedEmail'); ?>" required />
                    </p>
                    <p id="login_password_line">
                        <label for="submitted_login_password">Password:</label>
                        <input id="submitted_login_password" name="submittedPassword" type="password"
                            autocomplete="current-password" required />
                    </p>
                    <button type="submit" name="loginButton">Sign in</button>
                </form>
            </div>
        </div>

        <div id="register_greeting">
            <h2>Welcome to DailyKanji.</h2>
            <h3>Thank you for joining.</h3>
        </div>

        <div id="login_greeting">
            <h2>Welcome back to DailyKanji.</h2>
            <h3>It's nice to see you again.</h3>
        </div>
    </div>

</body>

</html>