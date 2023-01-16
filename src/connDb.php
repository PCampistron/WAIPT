<?php
// Établit la connexion à la base de données
$dbname="pcampistron_bd"; // Base de données
$dsn="mysql:host=lakartxela;dbname=$dbname";
$user="pcampistron_bd"; // Utilisateur
$pass="pcampistron_bd"; // mp


try {
    // se connecter à mysql
    $db = new PDO ($dsn, $user, $pass);
    } catch (PDOException $exc) {          // Vérification connexion -> affichage message d'erreur si nécessaire
      echo $exc->getMessage();
      exit();
    }
?>