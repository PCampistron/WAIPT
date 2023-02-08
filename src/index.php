<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" style="text/css" href="style.css" />
    <script src="script.js"></script>
    
    <title>WAIPT</title>

  <header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
          <img src="img/Logo.jpg" alt="Logo" height=50px width=50px class="d-inline-block align-text-top">
          What Am I Playing Today ?
          </a>
        </div>
      <div class="container-fluid">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item active">
          <a class="navbar-brand" href="index.php">ACCUEIL</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
        </li>
      </div>
      <div class="container-fluid">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="navbar-brand" href="catalogue.php">CATALOGUE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </li>
        </ul>
      </div>
      <div class="container-fluid">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="navbar-brand" href="classement.php">CLASSEMENT</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </li>
        </ul>
        <button class="btn btn-outline-success" type="submit">Se connecter</button>
      </div>
    </nav>
  </header>
    

</head>
<body>
    <form action="recherche.php" method="POST">
      <div class="container">
        <img src="" class="img-fluid" alt="...">
        <div class="text">
          <h1>Tirer un jeu au hasard</h1>
        </div>
      </div>

    
      <!--  
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
  -->


  

    <?php
include "connDb.php";



$requete = $db->prepare("SELECT * FROM JEU ORDER BY RAND() LIMIT 1");
$requete->execute();
$results = $requete->fetchAll();

// Recuperation du nom et de l'id du jeu tiré
$id_jeu = $results[0]['id_jeu'];
$nom_jeu = $results[0]['nom_jeu'];
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
</script>


</body>
</html>