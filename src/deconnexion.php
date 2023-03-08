<?php
    include "includes.php";
    $categoriePage = "DECONNEXION";
    $_SESSION['connecte']=false;
    $_SESSION['id']=NULL;
    header("location: connexion.php");
    exit;
?>
