<?php
    session_start();

if (!isset($_SESSION['connecte']) ){
    $_SESSION['connecte'] = false;
}

if (!isset($_SESSION['id']))
{
    $_SESSION['id'] = NULL;
}

?>