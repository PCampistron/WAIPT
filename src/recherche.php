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

    $i = 0;

    foreach ($results as $row) {
        echo '<article class="caseJeu">';
        // affciher le rang du jeu
        echo $row['nom'] . ' </h3>' ;
        //afficher l'image
        echo '<img src="img/'.$row['id_jeu'].'_carre.jpg" height="20%" width="10%" alt="Pochette">';
        echo '</article>';
     }

?>