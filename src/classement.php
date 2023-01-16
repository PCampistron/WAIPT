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
    echo '<h3> ' . $i . ' :' . $row['nom'] . ' </h3>' ;
    //afficher l'image
    echo '<img src="img/'.$row['id_jeu'].'_carre.jpg" height="20%" width="10%" alt="Pochette">';
    echo '</article>';

 }
?>