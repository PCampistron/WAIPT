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
    <script src="script.js"></script>
    <title>WAIPT</title>
</head>


<body>
    <header>
        <?php
        $categoriePage = "CREER COMPTE";
        include "menuNav.php";
      ?>
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
                    <input type="mdp" id="mdp" name="mdp" placeholder="**********" minlength="8" required>
                </div>
                <div>
                    <label for="Mail">Adresse mail :</label>
                    <input type="email" id="mail" name="mail" placeholder="Mil@exemple.com">
                </div>

                <input type="submit" value="Creer un compte">

        </div>

    </main>
</body>

</html>