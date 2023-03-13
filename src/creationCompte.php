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
        
        <div class="parent">

            <div class="gauche">

            </div>

            <div class="centre">

                <div class="boiteConn">
                    <div>
                        <br>
                        <h1>Creation d'un compte</h1>
                        <br>
                    </div>
                    <div class="formulaire_insciption">
    <form method="post" action="confirmerCreationCompte.php" >

        <?php
            if($_SESSION['dejaExistant'] == true)
            {
                echo '<div class="alert alert-danger" role="alert">
                    Adresse mail ou identifiant déjà utilisé.
                    </div>';
            }
        ?>

        <h1 class="h3 mb-3 fw-normal"> Veuillez rentrer vos informations d'inscription </h1>

        <div class="form-floating">
                            <input type="email" class="form-control" id="mail" placeholder="name@example.com"
                                required name="mail">
                            <label for="mail">Adresse mail <span class="obligatoire">*</span></label>
        </div>
        <div class="form-floating">
            <input type="text" class="form-control" id="Identifiant" placeholder="Exemple01"
                required name="identifiant">
            <label for="Identifiant"> Identifiant <span class="obligatoire">*</span> </label>
        </div>
        
        <div class="form-floating">
            <input type="password" class="form-control" id="mdp" placeholder="Password"
                required minlength="8" name="mdp">
            <label for="mdp"> Mot de passe <span class="obligatoire">*</span> (8 caractères minimum)</label>
        </div>

        <div class="msg_crercompte">

            <h6> Deja un compte ? <a href="connexion.php"> Se connecter </a> </h6>
            <br>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit"> Creer le compte </button>
        <p class="mt-5 mb-3 text-muted">© 2023 - WaiptTeam</p>
    </form>
</div>
                </div>

            </div>

            <div class="droite">

            </div>


        </div>
    </main>
</body>

</html>