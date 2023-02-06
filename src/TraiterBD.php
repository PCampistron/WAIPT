<?php
    /** 
     * @file TraiterBD.php
     * @author pcampistron
     * @brief Spécifie une classe TraiterBD utile au traitement de la base de données.
     * @details Gères différentes opérations comme la connexion ou la mise à jour de la base de données.
     * @version 0.1
     * @date 03/02/2023
     */

    include "Requete.php";

    class TraiterBD
    {
        // ATTRIBUTS
        private Requete $requete;
        
        // CONSTRUCTEUR

        /**
         * @brief Constructeur de la classe TraiterBD
         * @details Constructeur de la classe TraiterBD prenant en paramètre uneRequete correspondant à la requête de recherche formulée par l'utilisateur
         * @param [in] uneRequete Requete contenant différentes informations concernant la recherche de l'utilisateur
         */
        public function __construct(Requete $uneRequete)
        {
            $this->requete = $uneRequete;
        }

        // METHODES SPECIFIQUES

        /**
         * @brief Met à jour les données de la BD à partir des données présentes dans requete
         */
        public function majBD()
        {
            $dbname ='pcampistron_bd';
            $dsn="mysql:host=lakartxela;dbname=$dbname";
            $user ='pcampistron_bd';
            $pass='pcampistron_bd';

            $db = new PDO($dsn, $user, $pass);

            $partDate = $this->requete->getPartDateSortie();
            $partDefi = $this->requete->getPartNombreDefi();
            $partUtilisateur = $this->requete->getPartNombreUtilisateur();

            $requete = $db->prepare("UPDATE FORMULE SET partDefi = partDefi + $partDefi");

            $requete->execute();

            $requete = $db->prepare("UPDATE FORMULE SET partUtilisateurUnique = partUtilisateurUnique + $partUtilisateur");

            $requete->execute();

            $requete = $db->prepare("UPDATE FORMULE SET partDateSortie = partDateSortie + $partDate");

            $requete->execute();
        }
    }
?>