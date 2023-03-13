<?php
include "includes.php";
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>

    <title>WAIPT</title>

</head>

<body>

    <header>
        <?php
        $categoriePage = null;
        include('menuNav.php');
        include "connDb.php";
        include "TraiterBD.php";

        ?>
    </header>

    <main>
        <div class="parent">
            <div class="gauche">

            </div>

            <div class="centre">

                <h1 id="titre_recherche"> Resultat de recherche : </h1>

                <?php


                $nbCritere = 0;
                $listeCriteres = (array) null;

                $nomSais = $_POST["query"];

                // requeteRecherche >> Extraction des critères de la requête >> listeCriteres, nbCriteres

                if (isset($_POST['crit1']) && $_POST['crit1'] != "Choisir 1er critère") {
                    $crit1 = $_POST["crit1"];
                    $nbCritere++;
                    array_push($listeCriteres, $crit1);
                }

                if (isset($_POST['crit2']) && $_POST['crit2'] != "Choisir 2eme critère") {

                    $crit2 = $_POST["crit2"];
                    $nbCritere++;
                    array_push($listeCriteres, $crit2);
                }

                if (isset($_POST['crit3']) && $_POST['crit3'] != "Choisir 3eme critère") {
                    $crit3 = $_POST["crit3"];
                    $nbCritere++;
                    array_push($listeCriteres, $crit3);
                }


                if ($nbCritere > 0) {
                    $requete = new Requete($listeCriteres);

                    $traiter = TraiterBD::avecRequete($requete);

                    $traiter->majBD();
                }

                // preparer la requete 
                switch ($nbCritere) {
                    case 0:
                        $requete = $db->prepare("SELECT * FROM JEU WHERE nom_jeu LIKE '%$nomSais%' ORDER BY nom_jeu ASC");
                        echo '<span id="commentaire_recherche"> Resultat de recherche pour : ' . $nomSais . '</span>';
                        break;
                    case 1:
                        $requete = $db->prepare("SELECT * FROM JEU WHERE nom_jeu LIKE '%$nomSais%' ORDER BY $crit1 DESC, nom_jeu ASC");
                        echo '<span id="commentaire_recherche"> Resultat de recherche pour : ' . $nomSais . '   /classé par ordre de : ' . $crit1 .  '</span>';
                        break;
                    case 2:
                        $requete = $db->prepare("SELECT * FROM JEU WHERE nom_jeu LIKE '%$nomSais%' ORDER BY $crit1 DESC, $crit2 DESC, nom_jeu ASC");
                        echo '<span id="commentaire_recherche"> Resultat de recherche pour : ' . $nomSais . '   /classé par ordre de : ' . $crit1 . '>' . $crit2 .  '</span>';
                        break;
                    case 3:
                        $requete = $db->prepare("SELECT * FROM JEU WHERE nom_jeu LIKE '%$nomSais%' ORDER BY $crit1 DESC, $crit2 DESC, $crit3 DESC, nom_jeu ASC");
                        echo '<span id="commentaire_recherche"> Resultat de recherche pour :' . $nomSais . '   /classé par ordre de : ' . $crit1 . '>' . $crit2 . '>' . $crit3 . '</span>';
                        break;
                }


                // executer la requête
                $requete->execute();
                $results = $requete->fetchAll();  // organiser les résultats de la requête



                foreach ($results as $row) {
                    echo '<section id="table">';
                    // affciher le nom du jeu
                    echo '<h3> ' . $row['nom_jeu'] . ' </h3>';
                    //afficher l'image
                    echo '<img src="img/jeux/' . $row['id_jeu'] . '_carre.png"  alt="Pochette" class="Pochette">';
                    echo '</section>';
                }

                ?>



            </div>



            <div class="droite">

            </div>

        </div>
    </main>
</body>

</html>