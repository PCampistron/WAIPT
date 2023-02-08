<?php

    echo '<img id="imageJeu" src="img/'. $jeu->getIdJeu() .'_carre.jpg" height="200" width="220" alt="Pochette" class="Pochette">';
    echo '<div id="result" style="display: block;">';
    echo '<p id="nomJeu">Nom du jeu : ' . $jeu->getNom() . '</p>';
    echo '<p id="genresJeu">Genre : ' . $chaineGenres . '</p>';
    echo '<p id="prixJeu"> Prix : ' . $jeu->getPrixConseille() . '  €</p>';
    echo "<form action='pageDuJeu.php?id=" . $jeu->getIdJeu() . "' method='POST' class='description'>  <input type='hidden' name='jeu_id' value='" . $jeu->getIdJeu() . "'><button type='submit'> Page du jeu </button> </form> ";
    echo '</div>';

?>