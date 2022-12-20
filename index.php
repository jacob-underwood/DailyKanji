<?php

include("includes/config.php");

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

    <script src="assets/scripts/utilities.js"></script>

    <h1>DailyKanji</h1>

    <h2 id="open_register">Open Register</h2>
    <h2 id="open_login">Open Log In</h2>

    <div id="register_popup">
        <div id="input_container">
            <div id="register_text">
                <form id="register_form" action="register.php" method="POST">
                    <h2>Register a new account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$emailAlreadyExists); ?>
                        <?php echo $account->getError(Constants::$emailInvalid); ?>
                        <?php echo $account->getError(Constants::$emailLength); ?>
                        <label>Email:
                            <input id="submitted_register_email" name="submittedEmail" type="email" autocomplete="email"
                                inputmode="email" value="<?php getPreviousValue('submittedEmail'); ?>" required />
                        </label>
                    </p>
                    <p id="register_password_line">
                        <?php echo $account->getError(Constants::$passwordInvalid); ?>
                        <?php echo $account->getError(Constants::$passwordLength); ?>
                        <label>Password:
                            <input id="submitted_register_password" name="submittedPassword" type="password"
                                autocomplete="new-password" required />
                            <input type="checkbox" onclick="passwordReveal('submitted_password')">Show Password
                            <!-- TODO: Change text between show and hide. -->
                        </label>
                    </p>
                    <button type="submit" name="registerButton">Register</button>
                </form>
            </div>

            <div id="login_text">
                <form id="login_form" action="login.php" method="POST">
                    <h2>Login to your account</h2>
                    <p>
                        <?php echo $account->getError(Constants::$loginUnsuccessful); ?>
                        <label>Email:
                            <input id="submitted_login_email" name="submittedEmail" type="email" autocomplete="email"
                                inputmode="email" value="<?php getPreviousValue('submittedEmail'); ?>" required />
                        </label>
                    </p>
                    <p id="login_password_line">
                        <label>Password:
                            <input id="submitted_login_password" name="submittedPassword" type="password"
                                autocomplete="current-password" required />
                        </label>
                    </p>
                    <button type="submit" name="loginButton">Sign in</button>
                </form>
            </div>
        </div>
    </div>

</body>

</html>