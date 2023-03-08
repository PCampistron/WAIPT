<?php
include "includes.php";
include "connDb.php";


if (isset($_POST['mdp']) && isset($_POST['identifiant'])) 
{
    $identifiant = $_POST['identifiant'];
    $mdp = crypt($_POST['mdp'], $seed);
    
    
    // Requete de vérification
    var_dump($identifiant);
    var_dump($mdp);
    $requete = $db -> prepare ("SELECT * FROM UTILISATEUR WHERE pseudo ='$identifiant' and mdp ='$mdp'");
    $resultat =  $requete -> execute();
    var_dump($resultat);
    
    if ($requete) {
        echo 'CONENXION REUSSIE OUAISSSS !';
      } 
      else {
        echo "Les informations saisies sont incorrectes";
      }
    
}
else {
    echo 'Veuillez remplir tout les champs !';
}

?>
    