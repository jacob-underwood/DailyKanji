<?php

function sanitizePassword($password)
{
    $sanitizedPassword = strip_tags($password);

    return $sanitizedPassword;
}

function sanitizeEmail($email)
{
    $sanitizedEmail = strip_tags($email);
    $sanitizedEmail = str_replace(' ', '', $sanitizedEmail);

    return $sanitizedEmail;
}

if (isset($_POST['registerButton'])) {

    $sanitizedPassword = sanitizePassword($_POST['submittedPassword']);
    $sanitizedEmail = sanitizeEmail($_POST['submittedEmail']);

    $successfulRegister = $account->register($sanitizedEmail, $sanitizedPassword);

    if ($successfulRegister) {
        $_SESSION['loggedInUserEmail'] = $sanitizedEmail;
        $_SESSION['loginMethod'] = 'register';
        // header("Location: index.php");
    }

}

?>