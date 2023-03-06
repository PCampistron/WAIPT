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
        $categoriePage = "ACCUEIL";
        include ('menuNav.php');
        ?>
    </header>

    <main>
        <div class="parent">
            <div class="gauche">

            </div>

            <div class="centre">

                <div class="grid text-center">

                    <div class="g-col-6 d-flex justify-content-center">
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
                        $chaineGenres = $chaineGenres . " #" . $genre;
                    }


                    include ("afficherJeu.php");
                }

                if(isset($_POST['random_button_gouts']))
                {
                $traiter = new TraiterBD();

                $jeu = $traiter->tirerJeuGouts();

                $chaineGenres = "";

                foreach($jeu->getGenres() as $genre)
                {
                    $chaineGenres = $chaineGenres . " #" . $genre;
                }
                include ("afficherJeu.php");
                }
                echo '</div>';
                echo '<div class="d-grid gap-2 d-md-block">';
                echo '<form action="index.php" method="POST">'  ;
                echo '<input class="btn btn-primary" type="submit" name="random_button" value="Tirage aléatoire"></input>';
                echo '<input class="btn btn-primary" type="submit" name="random_button_gouts" value="Tirage aléatoire selon vos gouts"></input>';
                echo '</form>';
                echo '</div>';
                ?>

                    </div>

                </div>

                <div class="droite">

                </div>

            </div>
    </main>
</body>

</html>