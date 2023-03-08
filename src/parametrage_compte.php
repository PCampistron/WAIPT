<?php 
include ('includes.php'); ?>
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
  <h3 class="titre_genre">Renseignez vos gouts en matière de jeux vidéos</h3>
  <div class="g-col-6 d-flex justify-content-center">
    <?php
      include "connDb.php";
      include "Jeu.php";
      include "TraiterBD.php";

      $requete = $db->prepare("SELECT * FROM GENRE");
      $requete->execute();
      $genres = $requete->fetchAll();
      echo '<form method="post" enctype="multipart/form-data">';
      echo '<fieldset class="liste_genre">';
      foreach ($genres as $genre) {
        echo '   
          <ul class="genre">  
            <div class="form-check form-switch">
              <input class="form-check-input" type="checkbox" role="switch" id="genre' . $genre['id_genre'] . '" name="genres[]" value="' . $genre['id_genre'] . '">
              <label class="form-check-label" for="genre' . $genre['id_genre'] . '">' . $genre['nom'] . '</label>
            </div> 
          </ul>  
        ';
      };
      echo '</fielset>';
    ?>
    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Confirmer votre selection" name="genre" id="bouton_genre">
  </form>
  </div>

  <h3 class="titre_genre">Configurez les informations de votre profil</h3>
  <form method="post" enctype="multipart/form-data">
    <div class="insertion_image">
      <legend for="image">Sélectionnez une photo de profil:</legend>
      <input type="file" class="form-control-file" id="image" name="image" onchange="previewPicture(this)" required>
      <img id="preview" width="200px" length="200px">
    </div>
    <input class="w-100 btn btn-lg btn-primary" type="submit" value="Confirmer changement image" name="submit" id="bouton_genre">
  </form>

</div>
 
<script>
  function previewPicture(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        document.getElementById("preview").src = e.target.result;
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
  
        <?php
        $id = $_SESSION['id'];
if(isset($_POST['submit'])) {


// Récupérer le fichier téléchargé et le nom temporaire du fichier
$image = $_FILES['image']['tmp_name'];

// Reconfigurer le nom de l'image
$extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
$extension='png';
$new_name = ($id) . '_profil' . '.' . $extension;


// Ouvrir l'image et la redimensionner 
$source = imagecreatefromstring(file_get_contents($image));
$width = imagesx($source);
$height = imagesy($source);

$new_width = 500;
$new_height = ($new_width * $height) / $width;
$destination = imagecreatetruecolor($new_width, $new_height);
imagecopyresampled($destination, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
imagedestroy($source);
$source = $destination;


// Enregistrer l'image dans le dossier "img/user/"
$destination_path = 'img/user/' . $new_name;
imagepng($source, $destination_path);
imagedestroy($source); }

// Recuperation des gouts de l'utilisateur
if (isset($_POST['genre'])) {
  if (!empty($_POST['genres'])) {
    foreach($_POST['genres'] as $genre){
      $insertion = "INSERT INTO GOUTS ( id_utilisateur, id_genre, aimer) VALUES ( :id_utilisateur, :id_genre, :aimer)";
      $requete = $db->prepare($insertion);
      $aimer =1;
    // Bind des valeurs
    $requete->bindParam(':id_utilisateur', $id);
    $requete->bindParam(':id_genre', $genre);
    $requete->bindParam(':aimer', $aimer);
      // Exécution de la requête
    $result = $requete->execute();
     
    }
  }
}
?>



                       
                
                </div>
                <div class="droite">

                </div>

            </div>
    </main>
</body>

</html>