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
    <h1> Resultat de recherche : </h1>

<?php
    include_once "TraiterBD.php";
    include "connDb.php";

    $nbCritere = 0;
    $listeCriteres = (array) null;

    $nomSais = $_POST["query"];

    // requeteRecherche >> Extraction des critères de la requête >> listeCriteres, nbCriteres

    if (isset($_POST['crit1']))
    {
        $crit1 = $_POST["crit1"];
        $nbCritere++;
        array_push($listeCriteres, $crit1);
    }

    if (isset($_POST['crit2']))
    {
        $crit2 = $_POST["crit2"];
        $nbCritere++;
        array_push($listeCriteres, $crit2);
    }

    if (isset($_POST['crit3']))
    {
        $crit3 = $_POST["crit3"];
        $nbCritere++;
        array_push($listeCriteres, $crit3);
    } 

    if($nbCritere > 0)
    {
        $requete = new Requete($listeCriteres);

        $traiter = new TraiterBD($requete);

        $traiter->majBD();
    }

    // preparer la requete 
    switch($nbCritere)
    {
        case 0:
            $requete = $db -> prepare ("SELECT * FROM JEU WHERE nom LIKE '%$nomSais%' ORDER BY nom ASC");
            break;
        case 1:
            $requete = $db -> prepare ("SELECT * FROM JEU WHERE nom LIKE '%$nomSais%' ORDER BY $crit1 DESC, nom ASC");
            break;
        case 2:
            $requete = $db -> prepare ("SELECT * FROM JEU WHERE nom LIKE '%$nomSais%' ORDER BY $crit1 DESC, $crit2 DESC, nom ASC");
            break;
        case 3:
            $requete = $db -> prepare ("SELECT * FROM JEU WHERE nom LIKE '%$nomSais%' ORDER BY $crit1 DESC, $crit2 DESC, $crit3 DESC, nom ASC");
            break;
    }
    

    // executer la requête
    $requete -> execute();
    $results= $requete->fetchAll();  // organiser les résultats de la requête

   

    foreach ($results as $row) {
        echo '<article class="caseJeu">';
        // affciher le rang du jeu
        echo '<h3> ' .$row['nom'] . ' </h3>' ;
        //afficher l'image
        echo '<img src="img/'.$row['id_jeu'].'_carre.jpg" height="180" width="220" alt="Pochette" class="Pochette">';
        echo '</article>';
     }

?>