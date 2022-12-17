<?php

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
            <p>
                <label>Email:
                    <input id="submitted_email" name="submittedEmail" type="email" autocomplete="email" inputmode="email" required />
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