<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>
    <title>WAIPT</title>
</head>
<body>
    <header>   
</header>
    <main>
        <?php
            // Établit la connexion à la base de données
            include "connDb.php";

            // Récupération de l'identifiant du jeu
            $id_utilisateur = "U524";
            

            // Préparation de la requête SQL 
            $requete =  $db -> prepare ("SELECT * FROM UTILISATEUR u WHERE u.id_utilisateur = '$id_utilisateur'"); 
            $requete -> execute(); 
            $results= $requete->fetchAll(); 

            // Parcoure chaque ligne du résultat et affiche les données du jeu 
            foreach ($results as $row) { 
                echo '<div class="info_joueur">';
                echo '<div class="profile_pic_container">';
                $dst='img/user/' . $row['id_utilisateur'] . '_profil.png';
                if (!file_exists($dst) && !is_dir($dst)) 
                {
                    echo '<img src="img/waipt/base_picture_profile.png" class="profile_pic">';    
                }
                else 
                {
                    echo '<img src="img/user/' . $row['id_utilisateur'] . '_profil.png" class="profile_pic">';
                }
                echo '</div>';
                echo '<div class="details_user">';
                echo '<h1>' . $row['pseudo'] . '</h1>';
                echo '<h2> titre </h2>';
                echo '<p> lvl ' .floor($row['xpQuantite']/1000). ' :</p>';
                echo '<div class="progress" role="progressbar" aria-label="niveau joueur" aria-valuenow="'.$row['xpQuantite']%1000 .'" aria-valuemin="0" aria-valuemax="1000">';
                echo '<div class="progress-bar" style="width:'.$row['xpQuantite']%1000/10 .'%">'.$row['xpQuantite']%1000 .'/1000</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        ?>
    </main>
    <footer>
    </footer>
</body>
</html>
