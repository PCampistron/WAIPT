<?php
    /** 
     * @file Requete.php
     * @author pcampistron
     * @brief Spécifie une classe Requete utile au traitement des requêtes de recherche.
     * @details Permet de créer une Requete qui contiendra une part pour chaque critère permettant de calculer la réputation.
     * @version 0.1
     * @date 03/02/2023
     */

    class Requete
    {
        // ATTRIBUTS
        /**
         * @brief Part correspondant au critère de tri nombre de défi terminé
         */
        private $partNombreDefi = 0;
        
        /**
         * @brief Part correspondant au critère de tri nombre d'utilisateur unique ayant joué au jeu
         */
        private $partNombreUtilisateur = 0;

        /**
         * @brief Part correspondant au critère de tri date de sortie du jeu
         */
        private $partDateSortie = 0;

        // CONSTRUCTEUR
        /**
         * @brief Constructeur de la classe Requete
         * @details Constructeur de la classe Requete prenant en paramètre une listeCrit contenant les critères de recherche entrés par l'utilisateur.
         * @param [in] listeCrit Liste contenant les critères de recherche de l'utilisateur
         */
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

        /**
         * @brief Getter de la variable partNombreDefi
         * 
         * @return un entier correspondant à la part du critère nombre de défi
         */
        public function getPartNombreDefi()
        {
            return $this->partNombreDefi;
        }

        /**
         * @brief Getter de la variable partNombreUtilisateur
         * 
         * @return un entier correspondant à la part du critère nombre d'utilisateur
         */
        public function getPartNombreUtilisateur()
        {
            return $this->partNombreUtilisateur;
        }

        /**
         * @brief Getter de la variable partDateSortie
         * 
         * @return un entier correspondant à la part du critère date de sortie
         */
        public function getPartDateSortie()
        {
            return $this->partDateSortie;
        }
    }
?>