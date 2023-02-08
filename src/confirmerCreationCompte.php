<?php
include "connDb.php";

// Attempt insert query execution
try {
  // Récupération des valeurs des champs de saisie
  $identifiant = $_POST['identifiant'];
  $motDePasse = $_POST['mdp'];
  $email = $_POST['mail'];
  $dateInscription  = date("Y-m-d");
  var_dump($dateInscription);
  $xpQuantite = 0;
  $id_utilisateur = 'U52';
  $types = 'utilisateur';


  // Préparation de la requête d'insertion
  $insertion = "INSERT INTO UTILISATEUR (id_utilisateur, pseudo, mdp, mail, types, xpQuantite, dateInscription) VALUES (:id_utilisateur, :pseudo, :mdp, :mail, :types, :xpQuantite, :dateInscription)";
  $requete = $db->prepare($insertion);
  
  // Bind des valeurs
  $requete->bindParam(':id_utilisateur',$id_utilisateur);
  $requete->bindParam(':pseudo', $pseudo);
  $requete->bindParam(':mdp', $mdp);
  $requete->bindParam(':mail', $mail);
  $requete->bindParam(':types',$types);
  $requete->bindParam(':xpQuantite', $xpQuantite);
  $requete->bindParam(':dateInscription', $dateInscription);
  
  // Exécution de la requête
  $requete->execute();

  // Message de succès
  echo "Le compte a été créé avec succès.";
} catch(PDOException $e) {
  die("ERROR: Could not able to execute $insertion. " . $e->getMessage());
}

// Fermeture de la connexion à la base de données
unset($db);
?>
