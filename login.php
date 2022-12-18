<?php

include("includes/config.php");

include('includes/classes/Account.php');
include('includes/classes/Constants.php');

$account = new Account($connection);

include('includes/handlers/login-handler.php');

include('includes/utilities.php');

if (isset($_SESSION['loggedInUserEmail'])) {
    header("Location: index.php");
}

?>

<!DOCTYPE html>
<html lang="eng" dir="ltr">

<head>
    <meta charset="uft-8">
    <title>Login | DailyKanji</title>
</head>

<body>
    <div id="input_container">
        <form id="login_form" action="login.php" method="POST">
            <h2>Login to your account</h2>
            <p>
                <?php echo $account->getError(Constants::$loginUnsuccessful); ?>
                <label>Email:
                    <input id="submitted_email" name="submittedEmail" type="email" autocomplete="email" inputmode="email" value="<?php getPreviousValue('submittedEmail'); ?>" required />
                </label>
            </p>
            <p>
                <label>Password:
                    <input id="submitted_password" name="submittedPassword" type="password" autocomplete="current-password" required />
                </label>
            </p>
            <button type="submit" name="loginButton">Sign in</button>
        </form>
    </div>
</body>

</html>