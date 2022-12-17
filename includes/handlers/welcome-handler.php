<?php

if (isset($_POST['signUpButton'])) {
    header("Location: register.php");
}

if (isset($_POST['signInButton'])) {
    header("Location: login.php");
}

?>