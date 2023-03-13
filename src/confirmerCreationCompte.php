<?php
  include "includes.php";
  include "connDb.php";
  include "TraiterBD.php";


  // Récupération des valeurs des champs de saisie
  $pseudo = htmlentities($_POST['identifiant']);
  $mdp = crypt($_POST['mdp'], $seed);
  $mail = $_POST['mail'];
  $dateInscription  = date("Y-m-d");
  $xpQuantite = 0;
  $types = 'utilisateur';

  // Préparation de la requête d'insertion
  $insertion = "INSERT INTO UTILISATEUR ( pseudo, mdp, mail, types, xpQuantite, dateInscription) VALUES ( :pseudo, :mdp, :mail, :types, :xpQuantite, :dateInscription)";
  $requete = $db->prepare($insertion);
  
  // Bind des valeurs
  $requete->bindParam(':pseudo', $pseudo);
  $requete->bindParam(':mdp', $mdp);
  $requete->bindParam(':mail', $mail);
  $requete->bindParam(':types',$types);
  $requete->bindParam(':xpQuantite', $xpQuantite);
  $requete->bindParam(':dateInscription', $dateInscription);
  
  // Exécution de la requête
  $result = $requete->execute();

  if (!$result) {
    $_SESSION['dejaExistant'] = true;
    header("location: creationCompte.php");
    exit;
} else {
    $_SESSION['connecte'] = true;
    $requete =  $db -> prepare ("SELECT id_utilisateur FROM UTILISATEUR u WHERE u.mail = '$mail'"); 
    $requete -> execute(); 
    $results= $requete->fetchAll(); 
    $_SESSION['id'] = $results[0]['id_utilisateur'];
    $_SESSION['dejaExistant'] = false;
    header("location: profil.php");
    exit;
}


    
    
  // Fermeture de la connexion à la base de données
  unset($db);
?>