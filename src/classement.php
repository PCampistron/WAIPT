<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" style="text/css" href="style.css" />
    <title>WAIPT</title>

    
    <header>
    <div id="gauche">
        <a href="index.php">
          <img src="img/Logo.jpg" alt="logo" height=50px width=50px> 
        </a>
      </div>
      <div id="centre">
        <nav>
          <ul>
            <li>
              <a href="catalogue.php">
                Catalogue
              </a>
            </li>
            <li>
              <a href="classement.php">
                Classement
              </a>
            </li>
          </ul>
        </nav>
      </div>
      <div id="droite">
        <a href="#">
          <p>Se connecter</p>
        </a>
      </div>

  </header>
  <main>
    <div class="container">
    <h1> Classement </h1>
<?php
   include "connDb.php" ; // Connexion à la BD


   // preparer la requete 
   $requete = $db -> prepare ("SELECT * FROM JEU ORDER BY reputation DESC LIMIT 10;");

   // executer la requête
   $requete -> execute();
   $results= $requete->fetchAll();  // organiser les résultats de la requête
 
   $i = 0;

   foreach ($results as $row) {
      $i++;
      echo '<article class="caseJeu">';
      // affciher le rang du jeu
      echo '<h3> ' . $i . ' : ' . $row['nom'] . ' </h3>' ;
      //afficher l'image
      echo '<img src="img/'.$row['id_jeu'].'_carre.jpg" height="180" width="220" alt="Pochette">';
      echo '</article>';
   }
?>