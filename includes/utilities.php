<?php

function getPreviousValue($field)
{
    if (isset($_POST[$field])) {
        echo $_POST[$field];
    }
}

?>