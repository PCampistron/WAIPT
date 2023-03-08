<?php
    session_start();

if (!isset($_SESSION['connecte']) ){
    $_SESSION['connecte'] = false;
}

?>