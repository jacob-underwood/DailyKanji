<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Register | Daily Kanji</title>
</head>

<body>

    <script src="includes/scripts/utilities.js"></script>

    <div id="input-container">
        <form id="register-form" action="register.php" method="POST">
            <p>
                <label>Email:
                    <input id="submitted-email" name="submitted-email" type="email" autocomplete="email" inputmode="email" required />
                </label>
            </p>
            <p>
                <label>Password:
                    <input id="submitted-password" name="submitted-password" type="password" autocomplete="new-password"
                        required />
                    <input type="checkbox" onclick="passwordReveal()">Show Password
                </label>
            </p>
            <button type="submit" name="register-button">Register</button>
        </form>
    </div>

</body>

</html>