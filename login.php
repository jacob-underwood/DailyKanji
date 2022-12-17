<?php

?>

<!DOCTYPE html>
<html lang="eng" dir="ltr">

<head>
    <meta charset="uft-8">
    <title>Login | DailyKanji</title>
</head>

<body>
    <div id="input-container">
        <form id="login-form" action="login.php" method="POST">
            <p>
                <label>Email:
                    <input id="submitted-email" name="submitted-email" type="email" autocomplete="email" inputmode="email" required />
                </label>
            </p>
            <p>
                <label>Password:
                    <input name="submitted-password" type="password" autocomplete="current-password" required />
                </label>
            </p>
            <button type="submit" name="login-button">Sign in</button>
        </form>
    </div>
</body>

</html>