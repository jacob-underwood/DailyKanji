<?php

if (isset($_POST['loginButton'])) {

    $email = $_POST['submittedEmail'];
    $password = $_POST['submittedPassword'];

    $successfulLogin = $account->login($email, $password);

    if ($successfulLogin) {
        $_SESSION['loggedInUserEmail'] = $email;
        header('Location: index.php');
    }

}

?>