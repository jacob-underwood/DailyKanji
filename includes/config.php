<?php

session_start();
$_SESSION['loggedInUser'] = '?';

ob_start();
date_default_timezone_set('Europe/London');

$connection = mysqli_connect('localhost', 'root', '', 'daily_kanji');

?>