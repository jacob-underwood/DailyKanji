<?php

session_start();

ob_start();
date_default_timezone_set('Europe/London');

$connection = mysqli_connect('localhost', 'root', '', 'daily_kanji');

if (mysqli_connect_errno()) {
    echo "Failed to connect to database daily_kanji: " + mysqli_connect_errno();
}

?>