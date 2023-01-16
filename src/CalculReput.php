<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
  
</head>
<body>


<?php
    include "connDb.php" ; // Connexion à la BD

    

    $nbCritere = 0;
    $partNombreDefi = 0;
    $partNombreUtilisateur = 0;
    $partDateSortie = 0;
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
        // listeCriteres >> Calcul des nouvelles parts >> partNombreDefi, partNombreUtilisateur, partDateSortie
        
        // Initialisation des valeurs >> additionPart
        $additionPart = $nbCritere;
        
        for($numCritere = 0 ; $numCritere < $nbCritere ; $numCritere++)
        {
            switch($listeCriteres[$numCritere])
            {
                case 'nbDefi':
                    $partNombreDefi = $additionPart;
                    break;
                case 'nbUtilisateur':
                    $partNombreUtilisateur = $additionPart;
                    break;
                case 'dateSortie':
                    $partDateSortie = $additionPart;
                    break;
                default:
                    break;
            }

            $additionPart--;
        }
    }

    echo "Part nbDefi : " . $partNombreDefi;
    echo "Part nbUtilisateur : " . $partNombreUtilisateur;
    echo "Part dateSortie : " . $partDateSortie;
?>
