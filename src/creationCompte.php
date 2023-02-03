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
      <h1> Créer un compte </h1>

      <form method="post" action="confirmerCreationCompte.php" class="conn">

    <div>
    <label for="Identifiant">Identifiant:</label>
    <input type="text" id="identifiant" name="identifiant" placeholder="Mil8654">
</div>
<div>
    <label for="Mdp"> Mot de passe (minimum 8 caractères):</label>
    <input type="mdp" id="mdp" name="mdp" placeholder="**********"
           minlength="8" required>
</div>
<div>
    <label for="Mail">Adresse mail :</label>
    <input type="email" id="mail" name="mail" placeholder="Mil@exemple.com">
</div>

<input type="submit" value="Creer un compte">

</div>

</head>