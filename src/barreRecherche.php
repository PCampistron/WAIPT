<form class="form_recherche" action="recherche.php" method="POST">
  <div id="input_recherche">
    <input type="text" name="query" id="saisie_recherche" placeholder="Rechercher un jeu..." />
  </div>
  <div id="boites_recherche">
    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref1" name="crit1" value="crit1" onchange="activerSelect2()">
      <option selected>Choisir 1er critère</option>
      <option value="dateSortie">Date de sortie</option>
      <option value="nbUtilisateur">Nombre d'utilisateurs</option>
      <option value="nbDefi">Nombre de défis</option>
    </select>
    <?php
    $modeCritere2 = 'disabled';
    ?>
    <label class="my-1 mr-2" for="inlineFormCustomSelectPref2"></label>
    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref2" name="crit2" value="crit2" onchange="activerSelect3()" disabled>
      <option selected>Choisir 2eme critère</option>
      <option value="dateSortie">Date de sortie</option>
      <option value="nbUtilisateur">Nombre d'utilisateurs</option>
      <option value="nbDefi">Nombre de défis</option>
    </select>

    <label class="my-1 mr-2" for="inlineFormCustomSelectPref3"></label>
    <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref3" name="crit3" value="crit3" disabled>
      <option selected>Choisir 3eme critère</option>
      <option value="dateSortie" name="crit3">Date de sortie</option>
      <option value="nbUtilisateur" name="crit3">Nombre d'utilisateurs</option>
      <option value="nbDefi" name="crit3">Nombre de défis</option>
    </select>

    <button type="submit" id="bouton_recherche" class="btn btn-primary my-1"> Rechercher </button>
  </div>
</form>

<!-- Script pour desactiver l'option dans les autres selections des qu'elle est choisie dans une boite -->
<script>
  const selects = document.querySelectorAll("select");
  selects.forEach((select, index) => {
    select.addEventListener("change", (event) => {
      const selectedValue = event.target.value;
      selects.forEach((otherSelect, otherIndex) => {
        if (otherIndex !== index) {
          const optionToRemove = otherSelect.querySelector(`option[value="${selectedValue}"]`);
          if (optionToRemove) {
            optionToRemove.remove();
          }
        }
      });
    });
  });
</script>

<!-- Script pour activer le menu 2 des qu'on a choisit un critère dans la premiere boite-->
<script>
  function activerSelect2() {
    var select1 = document.getElementById("inlineFormCustomSelectPref1");
    var select2 = document.getElementById("inlineFormCustomSelectPref2");
    if (select1.value !== "") {
      select2.disabled = false;
    } else {
      select2.disabled = true;
    }
  }
</script>

<!-- Script pour activer la boite 3 des qu'on a choisit un critère dans la deuxième boite-->
<script>
  function activerSelect3() {
    var select1 = document.getElementById("inlineFormCustomSelectPref2");
    var select2 = document.getElementById("inlineFormCustomSelectPref3");
    if (select1.value !== "") {
      select2.disabled = false;
    } else {
      select2.disabled = true;
    }
  }
</script>