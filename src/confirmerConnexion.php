<?php
include "includes.php";
include "connDb.php";

if (isset($_POST['mdp']) && isset($_POST['mail'])) 
{
    $mail = $_POST['mail'];
    $mdp = crypt($_POST['mdp'], $seed);

    // Requete de vérification
    $requete = $db -> prepare ("SELECT * FROM UTILISATEUR WHERE mail ='$mail' and mdp ='$mdp'");
    $requete -> execute();
    
    if ($requete->rowCount() == 1) {
        $_SESSION['connecte'] = true;
        $requete =  $db -> prepare ("SELECT id_utilisateur FROM UTILISATEUR u WHERE u.mail = '$mail'"); 
        $requete -> execute(); 
        $results= $requete->fetchAll(); 
        $_SESSION['id'] = $results[0]['id_utilisateur'];
        header("location: profil.php");
        exit;
      } 
      else {
        header("location: connexion.php");
        exit;
      }
    
}
else {
    header("location: connexion.php");
    exit;
}

?>
    