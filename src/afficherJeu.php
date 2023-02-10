<?php
    echo '<div class="card" style="width: 18rem;">
    <img src="img/jeux/'. $jeu->getIdJeu() .'_carre.png"  alt="Pochette" class="card-img-top">
  <div class="card-body">
    <h5 class="card-title">'.$jeu->getNom().'</h5>';
    // <p class="card-text">Some quick example text to build on the card title and make up the bulk</p>
  echo '</div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item">' . $jeu->getPrixConseille() . ' €</li>
    <li class="list-group-item">' . $chaineGenres . '</li>
    <li class="list-group-item">Plateforme</li>
  </ul>
  <div class="card-body">
    <a href="pageDuJeu.php?id=' . $jeu->getIdJeu() .'" class="card-link">Page du jeu</a>
  </div>
</div>';

?>