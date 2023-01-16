<?php

    class Requete
    {
        // ATTRIBUTS
        private $partNombreDefi = 0;
        private $partNombreUtilisateur = 0;
        private $partDateSortie = 0;

        // CONSTRUCTEUR
        public function __construct(array $listeCrit){
            
            // listeCriteres >> Calcul des nouvelles parts >> partNombreDefi, partNombreUtilisateur, partDateSortie
        
            // Initialisation des valeurs >> additionPart

            $additionPart = count($listeCrit);

            for($numCritere = 0 ; $numCritere < count($listeCrit) ; $numCritere++)
            {
                switch($listeCrit[$numCritere])
                {
                    case 'nbDefi':
                        $this->partNombreDefi = $additionPart;
                        break;
                    case 'nbUtilisateur':
                        $this->partNombreUtilisateur = $additionPart;
                        break;
                    case 'dateSortie':
                        $this->partDateSortie = $additionPart;
                        break;
                    default:
                        break;
                }

                $additionPart--;
            }
        }

        // ENCAPSULATION
        public function getPartNombreDefi()
        {
            return $this->partNombreDefi;
        }

        public function getPartNombreUtilisateur()
        {
            return $this->partNombreUtilisateur;
        }

        public function getPartDateSortie()
        {
            return $this->partDateSortie;
        }
    }
?>