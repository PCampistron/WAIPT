<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" style="text/css" href="style.css" />
    <script src="script.js"></script>
    <title>WAIPT</title>

    
    <header>
    <div id="gauche">
        <a href="index.php">
          <img src="img/Logo.jpg" alt="logo" height=50px width=50px>
        </a>
         <titre> What Am I Playing Today ? </titre>
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
     <form  action="connexion.php" method="post">
    <input type="submit" value="Se connecter">
    </form>
      </div>

  </header>
  <main>
    <div class="container">
      <h1>Rechercher un jeu</h1>

</head>
<body>
    <form action="recherche.php" method="POST">
        <input type="text" name="query"/>

        <p>Premier critère :</p>
        <input type="radio" name="crit1" onmouseup="activerCrit2()" value="dateSortie">
        <label for="dateSortie">Date de sortie</label><br>
        <input type="radio" name="crit1" onmouseup="activerCrit2()"  value="nbUtilisateur">
        <label for="nbUtilisateur">Nombre d'utilisateurs</label><br>
        <input type="radio" name="crit1" onmouseup="activerCrit2()"  value="nbDefi">
        <label for="nbDefi">Nombre de défis</label>

        <br>  

        <p>Second critère :</p>
        <input type="radio" name="crit2" id="bouton4" onmouseup="activerCrit3()" value="dateSortie" disabled>
        <label for="dateSortie">Date de sortie</label><br>
        <input type="radio" name="crit2" id="bouton5" onmouseup="activerCrit3()" value="nbUtilisateur" disabled>
        <label for="nbUtilisateur">Nombre d'utilisateurs</label><br>
        <input type="radio" name="crit2" id="bouton6" onmouseup="activerCrit3()" value="nbDefi" disabled>
        <label for="nbDefi">Nombre de défis</label>

        <br>  

        <p>Troisième critère :</p>
        <input type="radio" name="crit3" id="bouton7" value="dateSortie" disabled>
        <label for="dateSortie">Date de sortie</label><br>
        <input type="radio" name="crit3" id="bouton8" value="nbUtilisateur" disabled>
        <label for="nbUtilisateur">Nombre d'utilisateurs</label><br>
        <input type="radio" name="crit3" id="bouton9" value="nbDefi" disabled>
        <label for="nbDefi">Nombre de défis</label>

        <br><br><br>

        <input type="submit" value="Rechercher">
    </form>


    <h1> Tirer un jeu au hasard </h1>


  

    <?php
include "connDb.php";

$requete = $db->prepare("SELECT * FROM JEU ORDER BY RAND() LIMIT 1");
$requete->execute();
$results = $requete->fetchAll();

// Recuperation du nom et de l'id du jeu tiré
$id_jeu = $results[0]['id_jeu'];
$nom_jeu = $results[0]['nom'];
$prix_jeu = $results[0]['prixConseille'];

// Recuperation des genres du jeu tiré
$genre = $db->prepare("SELECT g.nom FROM CARACTERISER c JOIN JEU j ON c.id_jeu = j.id_jeu JOIN GENRE g ON c.id_genre = g.id_genre WHERE c.id_jeu = '$id_jeu'");
$genre->execute();
$genres = $genre->fetchAll();

$nom_genre = $genres[0]['nom'];

echo '<button id="random_button"> Tirage aléatoire</button>';
echo '<div id="result" style="display: none;">';
echo '<p>Nom du jeu : ' . $nom_jeu . '</p>';
echo '<img src="img/'.$id_jeu.'_carre.jpg" height="200" width="220" alt="Pochette" class="Pochette">';
echo '<p>Genre : ' . $nom_genre . '</p>';
echo '<p>Prix : ' . $prix_jeu . '  €</p>';

$lien = "<form action='pageDuJeu.php?id=" . $id_jeu . "' method='POST' class='description'>  <input type='hidden' name='jeu_id' value='" . $id_jeu . "'><button type='submit'> Page du jeu </button> </form> ";
echo $lien;
echo '</div>';

?>

<script>
document.getElementById("random_button").addEventListener("click", function(){
  document.getElementById("result").style.display = "block";
});
</script>;


</body>
</html>