<?php
    include_once "TraiterBD.php";

    $nbCritere = 0;
    $listeCriteres = (array) null;

    // requeteRecherche >> Extraction des critères de la requête >> listeCriteres, nbCriteres

    if (isset($_POST['crit1']))
    {
        $crit1 = $_POST["crit1"];
        echo "Critère 1 : " . $crit1;
        $nbCritere++;
        print("<br>");
        array_push($listeCriteres, $crit1);
    }

    if (isset($_POST['crit2']))
    {
        $crit2 = $_POST["crit2"];
        echo "Critère 2 : " . $crit2;
        $nbCritere++;
        print("<br>");
        array_push($listeCriteres, $crit2);
    }

    if (isset($_POST['crit3']))
    {
        $crit3 = $_POST["crit3"];
        echo "Critère 3 : " . $crit3;
        $nbCritere++;
        print("<br>");
        array_push($listeCriteres, $crit3);
    } 

    if($nbCritere > 0)
    {
        $requete = new Requete($listeCriteres);

        $traiter = new TraiterBD($requete);

        $traiter->majBD();

        echo "Part nbDefi : " . $requete->getPartNombreDefi() . "<BR>";
        echo "Part nbUtilisateur : " . $requete->getPartNombreUtilisateur() . "<BR>";
        echo "Part dateSortie : " . $requete->getPartDateSortie() . "<BR>";
    }

    
?>