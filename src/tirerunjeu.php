<?php
include "connDb.php";

$requete = $db->prepare("SELECT * FROM JEU ORDER BY RAND() LIMIT 1");
$requete->execute();
$results = $requete->fetchAll();

// Recuperation du nom et de l'id du jeu tiré
$id_jeu = $results[0]['id_jeu'];
$nom_jeu = $results[0]['nom'];
$prix_jeu = $results[0]['prixConseille'];

// Recuperation des genres du jeu tiré
$genre = $db->prepare("SELECT g.nom FROM CARACTERISER c JOIN JEU j ON c.id_jeu = j.id_jeu JOIN GENRE g ON c.id_genre = g.id_genre WHERE c.id_jeu = '$id_jeu'");
$genre->execute();
$genres = $genre->fetchAll();

$nom_genre = $genres[0]['nom'];

echo '<button id="random_button"> Tirage aléatoire</button>';
echo '<div id="result" style="display: none;">';
echo '<p>Nom du jeu : ' . $nom_jeu . '</p>';
echo '<img src="img/'.$id_jeu.'_carre.png" alt="Pochette" class="Pochette">';
echo '<p>Genre : ' . $nom_genre . '</p>';
echo '<p>Prix : ' . $prix_jeu . '  €</p>';

?>
