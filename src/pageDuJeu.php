<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" style="text/css" href="style.css" />
    <script src="script.js"></script>
    <title>WAIPT</title>
</head>

<body>
    <header>
        <?php
    include "menuNav.php";
  ?>
    </header>
    <main>

        <?php
  // Établit la connexion à la base de données
  include "connDb.php";

  // Récupération de l'identifiant du jeu
  $id_jeu = $_GET['id'];
  

 // Préparation de la requête SQL 
 $requete =  $db -> prepare ("SELECT * FROM JEU j JOIN DISPONIBILITE d on j.id_jeu = d.id_jeu JOIN PLATEFORME p on d.id_plateforme = p.id_plateforme 
   JOIN DEFI def on def.id_jeu = j.id_jeu 
 WHERE j.id_jeu = '$id_jeu'"); 
 $requete -> execute(); 
 $results= $requete->fetchAll(); 
 var_dump($results) ;

 // Parcoure chaque ligne du résultat et affiche les données du jeu 
 foreach ($results as $row) { 
  echo '<article class="cd">';
   echo '<div class="presentation">'; 
   echo '<img src="img/'. $row['id_jeu'].'_carre.jpg" height="400" width="420" alt="Pochette" class="Pochette">'; 
   echo '<h3 class="titre_desc"> Nom du jeu : ' . $row['nom_jeu']; 
   echo '<p class="info_desc"> Prix Conseille : ' . $row['prixConseille'] . ' €</p>';
    echo '<p class="info_desc"> Lien magasin : <a href='. $row['lienMagasin'] .'> Page du jeu </a href>'; 
    echo '<p class="info_desc"> Liste des defis : ' . $row['intitule'];
   }
 ?>

    </main>
</body>

</html>