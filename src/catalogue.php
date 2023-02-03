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
    <h1> Catalogue </h1>

<?php
include "connDb.php";



 // preparer la requete col1, col2, col3
 $requete = $db -> prepare ("SELECT * FROM JEU");

 $requete -> execute();
 $results= $requete->fetchAll();



 foreach ($results as $row) {
    echo '<article class="cd">';
    echo '<div class="presentation">';
    echo '<h3>' . $row['nom'] ;
    //CREATION D'ICONES
    echo '<img src="img/'.$row['id_jeu'].'_carre.jpg" height="180" width="220" alt="Pochette" class="Pochette">';
    echo '<p class="prix" > Prix : ' . $row['prixConseille'] . ' €</p>';
    echo '</article>';
}

?>

</body>
</html>