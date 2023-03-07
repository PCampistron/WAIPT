<?php
  include "connDb.php";
  include "TraiterBD.php";
  include "constantes.php";

  

  // Récupération des valeurs des champs de saisie
  $pseudo = $_POST['identifiant'];
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
    
    throw new Exception("Erreur : " . $requete->errorInfo()[2]);
} else {
    echo 'Compte créé avec succes';
    
}


    
    
    

  // Fermeture de la connexion à la base de données
  unset($db);
?>