<?php
    include "Requete.php";

    class TraiterBD
    {
        // ATTRIBUTS
        private Requete $requete;
        
        // CONSTRUCTEUR
        public function __construct(Requete $uneRequete)
        {
            $this->requete = $uneRequete;
        }

        // METHODES SPECIFIQUES
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