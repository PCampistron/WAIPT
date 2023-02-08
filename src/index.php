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
      include "Jeu.php";
      include "TraiterBD.php";

      echo '<form action="index.php" method="POST">'  ;
      echo '<input type="submit" name="random_button" value="Tirage aléatoire"></button>';
      echo '<input type="submit" name="random_button_gouts" value="Tirage aléatoire selon vos gouts"></button>';
      echo '</form>';

  

      if(isset($_POST['random_button']))
      {
          $traiter = new TraiterBD();

          $jeu = $traiter->tirerJeu();

          $chaineGenres = "";

          foreach($jeu->getGenres() as $genre)
          {
            $chaineGenres = $chaineGenres . " " . $genre;
          }

          echo '<div id="result" style="display: block;">';
          echo '<p id="nomJeu">Nom du jeu : ' . $jeu->getNom() . '</p>';
          echo '<img id="imageJeu" src="img/'. $jeu->getIdJeu() .'_carre.jpg" height="200" width="220" alt="Pochette" class="Pochette">';
          echo '<p id="genresJeu">Genre : ' . $chaineGenres . '</p>';
          echo '<p id="prixJeu"> Prix : ' . $jeu->getPrixConseille() . '  €</p>';

          echo "<form action='pageDuJeu.php?id=" . $jeu->getIdJeu() . "' method='POST' class='description'>  <input type='hidden' name='jeu_id' value='" . $jeu->getIdJeu() . "'><button type='submit'> Page du jeu </button> </form> ";
          echo '</div>';
      }
      if(isset($_POST['random_button_gouts']))
      {
          $traiter = new TraiterBD();

          $jeu = $traiter->tirerJeuGouts();

          $chaineGenres = "";

          foreach($jeu->getGenres() as $genre)
          {
            $chaineGenres = $chaineGenres . " " . $genre;
          }

          echo '<div id="result" style="display: block;">';
          echo '<p id="nomJeu">Nom du jeu : ' . $jeu->getNom() . '</p>';
          echo '<img id="imageJeu" src="img/'. $jeu->getIdJeu() .'_carre.jpg" height="200" width="220" alt="Pochette" class="Pochette">';
          echo '<p id="genresJeu">Genre : ' . $chaineGenres . '</p>';
          echo '<p id="prixJeu"> Prix : ' . $jeu->getPrixConseille() . '  €</p>';

          echo "<form action='pageDuJeu.php?id=" . $jeu->getIdJeu() . "' method='POST' class='description'>  <input type='hidden' name='jeu_id' value='" . $jeu->getIdJeu() . "'><button type='submit'> Page du jeu </button> </form> ";
          echo '</div>';
      }
    ?>

</body>
</html>