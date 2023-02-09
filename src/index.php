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
    <link rel="stylesheet" href="style.css" />
    <script src="script.js"></script>

    <title>WAIPT</title>

</head>

<body>

    <header>
        <?php
      include "menuNav.php";
    ?>
    </header>

    <div class="p-3 mb-2 bg-primary-subtle text-emphasis-primary">
        <img src="" class="img-fluid" alt="...">
        <div class="text">
            <h1>Tirer un jeu au hasard</h1>
        </div>
    </div>

    <?php
      include "connDb.php";
      include "Jeu.php";
      include "TraiterBD.php";

      if(isset($_POST['random_button']))
      {
          $traiter = new TraiterBD();

          $jeu = $traiter->tirerJeu();

          $chaineGenres = "";

          foreach($jeu->getGenres() as $genre)
          {
            $chaineGenres = $chaineGenres . " -" . $genre;
          }
          include "afficherJeu.php";
      }
      if(isset($_POST['random_button_gouts']))
      {
          $traiter = new TraiterBD();

          $jeu = $traiter->tirerJeuGouts();

          $chaineGenres = "";

          foreach($jeu->getGenres() as $genre)
          {
            $chaineGenres = $chaineGenres . " -" . $genre;
          }
          include "afficherJeu.php";
      }

      echo '<form action="index.php" method="POST">'  ;
      echo '<input type="submit" name="random_button" value="Tirage aléatoire"></button>';
      echo '<input type="submit" name="random_button_gouts" value="Tirage aléatoire selon vos gouts"></button>';
      echo '</form>';
    ?>
    </div>
</body>

</html>