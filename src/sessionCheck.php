<?php
    session_start();

if (!isset($_SESSION['connecte']) ){
    $_SESSION['connecte'] = false;
}

if (!isset($_SESSION['id']))
{
    $_SESSION['id'] = NULL;
}

if(!isset($_SESSION['mdpErrone']))
{
    $_SESSION['mdpErrone'] = false;
}

if(!isset($_SESSION['dejaExistant']))
{
    $_SESSION['dejaExistant'] = false;
}

?>