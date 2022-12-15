<?php

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Register | Daily Kanji</title>
</head>

<body>

    <script src="includes/JavaScript/utilities.js"></script>

    <div id="inputContainer">
        <form action="" method="POST">
            <p>
                <label>Email:
                    <input name="submitted-email" type="email" autocomplete="email" inputmode="email" required />
                </label>
            </p>
            <p>
                <label>Password:
                    <input id="submitted-password" name="submitted-password" type="password" autocomplete="new-password"
                        required />
                    <input type="checkbox" onclick="passwordReveal()">Show Password
                </label>
            </p>
            <button>Register</button>
        </form>
    </div>

</body>

</html>