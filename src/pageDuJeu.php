<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" style="text/css" href="style.css" />
    <script src="script.js"></script>
    <title>WAIPT</title>

    
    <header>
    <div id="gauche">
        <a href="index.php">
          <img src="img/Logo.jpg" alt="logo" height=50px width=50px>
        </a>
         <titre> What Am I Playing Today ? </titre>
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
     <form  action="connexion.php" method="post">
    <input type="submit" value="Se connecter">
    </form>
      </div>

  </header>
  <main>
    
<?php
  // Établit la connexion à la base de données
  include "connDb.php";

  // Récupération de l'identifiant du jeu
  $id_jeu = $_GET['id'];
  

  // Préparation de la requête SQL
  $requete =  $db -> prepare ("SELECT * FROM JEU WHERE id_jeu = '$id_jeu'");
  $requete -> execute();
  $results= $requete->fetchAll();
  
  echo '<h1> Page du jeu : ' . $results[0]['nom'] .' </h1>' ;
  
  // Affiche le jeu
  foreach ($results as $row) {
    //récupération des données de l'image originale
    echo '<img src="img/'. $row['id_jeu'].'_carre.jpg" height="400" width="420" alt="Pochette" class="Pochette">';
    echo '<h3 class="titre_desc"> Nom du jeu : ' . $row['nom'];
    echo '<p class="info_desc"> Prix : ' . $row['prixConseille'] . ' €</p>';
  }
 ?>