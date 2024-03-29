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

        <div class="parent">
            <div class="gauche">

            </div>

            <div class="centre">

                    <h1> Catalogue </h1>

                    <?php
include "connDb.php";



 // preparer la requete col1, col2, col3
 $requete = $db -> prepare ("SELECT * FROM JEU");

 $requete -> execute();
 $results= $requete->fetchAll();


echo'<div class="row">';
 foreach ($results as $row) {
    // echo '<article class="cd">';
    // echo '<div class="presentation">';
    // echo '<h3>' . $row['nom_jeu'] ;
    // //CREATION D'ICONES
    // echo '<img src="img/jeux/'.$row['id_jeu'].'_carre.png" height="20%" width="10%" alt="Pochette" class="Pochette">';
    // echo '<p class="prix" > Prix : ' . $row['prixConseille'] . ' €</p>';
    // echo '</article>';
    
    echo '<div class="col-md-2">
            <div class="card">
              <img src="img/jeux/'.$row['id_jeu'].'_carre.png" class="card-img-top" alt="Nom du jeu">
              <div class="card-body">
                <h3 class="card-title">'.$row['nom_jeu'].'</h3>
                <p class="card-text prix">Prix : ' . $row['prixConseille'] . ' € </p>
                <a href="pageDuJeu.php?id=' . $row['id_jeu'] .'" class="btn btn-primary">Voir le jeu</a>
              </div>
            </div>
        </div>';
}

echo'</div>';

?>

            </div>

            <div class="droite">

            </div>
        </div>
    </main>
</body>

</html>