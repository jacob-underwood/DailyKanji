<?php

include("includes/config.php");

if (isset($_SESSION['loggedInUserEmail'])) {
    $userLoggedIn = $_SESSION['loggedInUserEmail'];
} else {
    header("Location: welcome.php");
}

?>

<!DOCTYPE html>

<html lang="en" dir="ltr">

<head>

    <meta charset="utf-8">
    <title>Home | DailyKanji</title>

</head>

<body>

    <h1>DailyKanji</h1>

</body>

</html>