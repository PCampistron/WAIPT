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
        $categoriePage = "CONNEXION";
        include "menuNav.php";
      ?>
    </header>
    <main>
        
        <div class="parent">

            <div class="gauche">

            </div>

            <div class="centre">

                <div class="container">
                    <div>
                        <br>
                        <h1>Connexion</h1>
                        <br>
                    </div>
                     <div class="formulaire_connexion">
                    <form>

                        <h1 class="h3 mb-3 fw-normal"> Veuillez rentrer vos informations de connexion</h1>

                        <div class="form-floating">
                            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com"
                                required>
                            <label for="floatingInput">Adresse mail</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                                required minlength="8">
                            <label for="floatingPassword">Mot de passe (8 caracères minimum)</label>
                        </div>

                        <div class="msg_crercompte">
    
                            <h6> Pas de compte ? <a href="creationCompte.php"> Créer un compte </a> </h6>
                            <br>
                        </div>

                        <button class="w-100 btn btn-lg btn-primary" type="submit">Se connecter</button>
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