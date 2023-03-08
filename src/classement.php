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
        $categoriePage = "CLASSEMENT";
        include ('menuNav.php');
        ?>
    </header>
    <main>

        <div class="parent">
            <div class="gauche">

            </div>

            <div class="centre">
                <h1> Classement </h1>

                <?php
   include "connDb.php"; // Connexion à la BD

   // 1 Extraction des données de calcul
   $partDefi = 0;
   $partUtilisateur = 0;
   $partDate = 0;
   $defiMax = 0;
   $utilisateurMax = 0;
   $dateMax = 0;
   
   $requete = $db -> prepare ("SELECT * FROM FORMULE");

   $requete -> execute();
   $results= $requete->fetchAll();  // organiser les résultats de la requête

   foreach ($results as $row) {
      $partDate = $row['partDateSortie'];
      $partDefi = $row['partDefi'];
      $partUtilisateur = $row['partUtilisateurUnique'];
   }

   $requete = $db -> prepare ("SELECT MAX(nbDefi) AS nbDefi, MAX(nbUtilisateur) AS nbUtilisateur, MIN(dateSortie) AS dateMin, MAX(dateSortie) AS dateMax FROM JEU");

   $requete -> execute();
   $results= $requete->fetchAll();  // organiser les résultats de la requête

   foreach($results as $row)
   {
      $defiMax = $row['nbDefi'];
      $utilisateurMax = $row['nbUtilisateur'];
      $dateMin = date_create($row['dateMin']);
      $dateMax = date_create($row['dateMax']);
   }

   // 2 Extraction chiffres des jeux

   $requete = $db -> prepare ("SELECT * FROM JEU");

   $requete -> execute();
   $results= $requete->fetchAll();


   foreach ($results as $row) {

      $scoreDefi = ($row["nbDefi"] / $defiMax) * 1000;
      $scoreUtilisateur = ($row["nbUtilisateur"] / $utilisateurMax) * 1000;

      $id = $row['id_jeu'];

      $dateJeu = date_create($row['dateSortie']);
      $interval = date_diff($dateMin, $dateJeu);

      $ecartJourMinMax = date_diff($dateMin, $dateMax);
      
      $nbJourMinMax = (int) $ecartJourMinMax->format('%a');
      $nbJour = (int) $interval->format('%a');

      $scoreDate = ($nbJour / $nbJourMinMax) * 1000;

      // 3 Application des coefs

      $reputation = (($scoreDate * $partDate) + ($scoreDefi * $partDefi) + ($scoreUtilisateur * $partUtilisateur)) / ($partDate + $partDefi + $partUtilisateur);

      // 4 Insertion modifications dans BD

      $requete = $db -> prepare ("UPDATE JEU SET reputation = $reputation WHERE id_jeu = '$id'");

      $requete -> execute();
      $results= $requete->fetchAll();
   }

   // preparer la requete 
   $requete = $db -> prepare ("SELECT * FROM JEU ORDER BY reputation DESC LIMIT 10;");

   // executer la requête
   $requete -> execute();
   $results= $requete->fetchAll();  // organiser les résultats de la requête
 
   $i = 0;

   foreach ($results as $row) {
        $i++;
    //   echo '<article class="caseJeu">';
    //   // affciher le rang du jeu
    //   echo '<h3> ' . $i . ' :' . $row['nom_jeu'] . ' </h3>' ;
    //   //afficher l'image
    //   echo '<img src="img/jeux/'.$row['id_jeu'].'_carre.png"  alt="Pochette">';
    //   echo '</article>';
        echo '<table class="table">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>';
    
        echo '<th scope="row"> '.$i.' </th>';
        echo '<td> ' . $row['nom_jeu'] . '</td>
        <td> <img src="img/jeux/'.$row['id_jeu'].'_carre.png"  class="rounded float" alt="Pochette" style="width:20%; height:auto"> </td>
        </tr>
        </tbody>
        </table>';
        // echo '<div class="row">
        //        <div class="col-6">
        //           <img src="img/jeux/'.$row['id_jeu'].'_carre.png" alt="jeu" style="width:20%; height:auto">
        //           <p>'.$i.' - '. $row['nom_jeu'] . '</p>
        //        </div>
        //     </div>';
   }
   ?>
    //     <!-- <table class="table">
    // <thead>
    //     <tr>
    //     <th scope="col">#</th>
    //     <th scope="col">Nom</th>
    //     <th scope="col">Image</th>
    //     </tr>
    // </thead>
    // <tbody>
    //     <tr>
    //     <th scope="row">1</th>
    //     foreach ($results as $row) {
    //         echo '<td> ' . $row['nom_jeu'] . '</td>'
    //         echo '<img src="img/jeux/'.$row['id_jeu'].'_carre.png"  alt="Pochette">';
            
           
    //     }
    //     </tr>
        
    //     <tr>
    //     <th scope="row">2</th>
    //     <td>Jacob</td>
    //     <td>Thornton</td>
    //     <td>@fat</td>
    //     </tr>
    //     <tr>
    //     <th scope="row">3</th>
    //     <td colspan="2">Larry the Bird</td>
    //     <td>@twitter</td>
    //     </tr>
    // </tbody>
    // </table> -->


            </div>

            <div class="droite">

            </div>

        </div>

    </main>
</body>

</html>