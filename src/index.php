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
        <a href="#">
          <p>Se connecter</p>
        </a>
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
</body>
</html>