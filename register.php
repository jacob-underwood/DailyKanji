<?php

include("includes/config.php");

include('includes/classes/Account.php');
include('includes/classes/Constants.php');

$account = new Account($connection);

include('includes/handlers/register-handler.php');

include('includes/utilities.php');

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Register | Daily Kanji</title>
</head>

<body>

    <script src="includes/scripts/utilities.js"></script>

    <div id="input_container">
        <form id="register_form" action="register.php" method="POST">
            <h2>Register a new account</h2>
            <p>
                <?php echo $account->getError(Constants::$emailAlreadyExists); ?>
                <?php echo $account->getError(Constants::$emailInvalid); ?>
                <?php echo $account->getError(Constants::$emailLength); ?>
                <label>Email:
                    <input id="submitted_email" name="submittedEmail" type="email" autocomplete="email"
                        inputmode="email" value="<?php getPreviousValue('submittedEmail'); ?>" required />
                </label>
            </p>
            <p>
                <?php echo $account->getError(Constants::$passwordInvalid); ?>
                <?php echo $account->getError(Constants::$passwordLength); ?>
                <label>Password:
                    <input id="submitted_password" name="submittedPassword" type="password" autocomplete="new-password"
                        required />
                    <input type="checkbox" onclick="passwordReveal('submitted_password')">Show Password
                    <!-- TODO: Change text between show and hide. -->
                </label>
            </p>
            <button type="submit" name="registerButton">Register</button>
        </form>
    </div>

</body>

</html>