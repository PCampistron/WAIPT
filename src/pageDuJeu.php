<?php
    include "includes.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"
        integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" style="text/css" href="style.css" />
    <script src="script.js"></script>
    <title>WAIPT</title>
</head>


<body>
    <header>
        <?php
        $categoriePage = "CATALOGUE";
        include "menuNav.php";
      ?>
    </header>
    <main>
        <div class="container">
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


            // Parcoure chaque ligne du résultat et affiche les données du jeu 
            foreach ($results as $row) { 
            echo '<article class="cd">';
            echo '<div class="presentation">'; 
            echo '<img src="img/jeux/'. $row['id_jeu'].'_carre.png" alt="Pochette" class="Pochette">'; 
            echo '<h3 class="titre_desc"> Nom du jeu : ' . $row['nom_jeu']; 
            echo '<p class="info_desc"> Prix Conseille : ' . $row['prixConseille'] . ' €</p>';
                echo '<p class="info_desc"> Lien magasin : <a href='. $row['lienMagasin'] .'> Page du jeu </a href>'; 
                echo '<p class="info_desc"> Liste des defis : ' . $row['intitule'];
            }
            ?>

        </div>

    </main>
</body>

</html>
  


  