<?php
  include "includes.php";
  include "connDb.php";
  include "TraiterBD.php";

  // Attempt insert query execution
  try {
    // Récupération des valeurs des champs de saisie
    $pseudo = $_POST['identifiant'];
    $mdp = crypt($_POST['mdp'], $seed);
    $mail = $_POST['mail'];
    $dateInscription  = date("Y-m-d");
    $xpQuantite = 0;
    $types = 'utilisateur';

    // Préparation de la requête d'insertion
    $insertion = "INSERT INTO UTILISATEUR ( pseudo, mdp, mail, types, xpQuantite, dateInscription) VALUES (:pseudo, :mdp, :mail, :types, :xpQuantite, :dateInscription)";
    $requete = $db->prepare($insertion);
    
    // Bind des valeurs
    $requete->bindParam(':pseudo', $pseudo);
    $requete->bindParam(':mdp', $mdp);
    $requete->bindParam(':mail', $mail);
    $requete->bindParam(':types',$types);
    $requete->bindParam(':xpQuantite', $xpQuantite);
    $requete->bindParam(':dateInscription', $dateInscription);
    
    // Exécution de la requête
    if($requete->execute() == false)
    {
      echo "Echec lors de la création du compte.";
    }
    else
    {
      $_SESSION['connecte'] = true;

      // Message de succès
      echo "Le compte a été créé avec succès.";

      echo '<a href="index.php"> Accueil </a>'; 

      var_dump($_SESSION['connecte']);
    }
    
  } catch(PDOException $e) {
    die("ERROR: Could not able to execute $insertion. " . $e->getMessage());
  }

  // Fermeture de la connexion à la base de données
  unset($db);
?>