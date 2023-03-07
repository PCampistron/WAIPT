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
    include_once "Jeu.php";

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
        public static function avecRequete(Requete $uneRequete)
        {
            $instance = new self();
            $instance->requete = $uneRequete;
            return $instance;
        }


        /**
         * @brief Constructeur de la classe TraiterBD
         * @details Constructeur de la classe TraiterBD sans paramètre
         */
        public function  __constructor()
        {

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


        /**
         * @brief Tire un jeu au hasard dans la BD pour le convertir en objet et le retourne
         * 
         * @return Un objet de type Jeu
        */
        public function tirerJeu()
        {
            $dbname ='pcampistron_bd';
            $dsn="mysql:host=lakartxela;dbname=$dbname";
            $user ='pcampistron_bd';
            $pass='pcampistron_bd';

            $db = new PDO($dsn, $user, $pass);

            $requete = $db->prepare("SELECT * FROM JEU ORDER BY RAND() LIMIT 1 ");
            $requete->execute();
            $results = $requete->fetchAll();
            
            // Recuperation du nom et de l'id du jeu tiré
            
            $id_jeu = $results[0]['id_jeu'];
            $nom_jeu = $results[0]['nom_jeu'];
            $prix_jeu = $results[0]['prixConseille'];
            
            // Recuperation des genres du jeu tiré
            $genre = $db->prepare("SELECT g.nom FROM CARACTERISER c JOIN JEU j ON c.id_jeu = j.id_jeu JOIN GENRE g ON c.id_genre = g.id_genre WHERE c.id_jeu = '$id_jeu'");
            $genre->execute();
            $genres = $genre->fetchAll();
            
            $listeGenres = array();

            foreach ($genres as $row) {
                array_push($listeGenres, $row['nom']);
            }

             // Récupération des plateformes du jeu tiré

             $plateformes = $db->prepare("SELECT j.id_jeu, j.nom_plateforme, j.lienMagasin FROM JEUPLATEFORME j WHERE j.id_jeu = '$id_jeu'");
             $plateformes->execute();
             $plateformes = $plateformes->fetchAll();
             
             $listePlateformes = array();
 
             foreach ($plateformes as $row) {
                 $plateforme = array($row['nom_plateforme'], $row['lienMagasin']);
                 array_push($listePlateformes, $plateforme);
             }
 
             // Création de l'objet jeu

            $jeu = new Jeu($nom_jeu, $id_jeu, $prix_jeu, $listeGenres, $listePlateformes);

            return $jeu;
        }

        public function tirerJeuGouts()
        {
            $dbname ='pcampistron_bd';
            $dsn="mysql:host=lakartxela;dbname=$dbname";
            $user ='pcampistron_bd';
            $pass='pcampistron_bd';

            $db = new PDO($dsn, $user, $pass);

            $requete = $db->prepare("SELECT * FROM JEU j 
            JOIN CARACTERISER c on j.id_jeu = c.id_jeu 
            JOIN GENRE g on g.id_genre = c.id_genre 
            JOIN GOUTS gou on gou.id_genre = g.id_genre
            JOIN UTILISATEUR u on u.id_utilisateur = gou.id_utilisateur
            WHERE u.id_utilisateur = '1'
            ORDER BY RAND() LIMIT 1");
            $requete->execute();
            $results = $requete->fetchAll();
            
            // Recuperation du nom et de l'id du jeu tiré
            $id_jeu = $results[0]['id_jeu'];
            $nom_jeu = $results[0]['nom_jeu'];
            $prix_jeu = $results[0]['prixConseille'];
            
            // Recuperation des genres du jeu tiré
            $genre = $db->prepare("SELECT g.nom FROM CARACTERISER c JOIN JEU j ON c.id_jeu = j.id_jeu JOIN GENRE g ON c.id_genre = g.id_genre WHERE c.id_jeu = '$id_jeu'");
            $genre->execute();
            $genres = $genre->fetchAll();
            
            $listeGenres = array();

            foreach ($genres as $row) {
                array_push($listeGenres, $row['nom']);
            }

            // Récupération des plateformes du jeu tiré

            $plateformes = $db->prepare("SELECT j.id_jeu, j.nom_plateforme, j.lienMagasin FROM JEUPLATEFORME j WHERE j.id_jeu = '$id_jeu'");
             $plateformes->execute();
             $plateformes = $plateformes->fetchAll();
             
             $listePlateformes = array();
 
             foreach ($plateformes as $row) {
                 $plateforme = array($row['nom_plateforme'], $row['lienMagasin']);
                 array_push($listePlateformes, $plateforme);
             }
            // Création de l'objet jeu

            $jeu = new Jeu($nom_jeu, $id_jeu, $prix_jeu, $listeGenres, $listePlateformes);

            return $jeu;
        }

        public function incrementation_id()
        {
            $dbname ='pcampistron_bd';
            $dsn="mysql:host=lakartxela;dbname=$dbname";
            $user ='pcampistron_bd';
            $pass='pcampistron_bd';

            $db = new PDO($dsn, $user, $pass);

            $requete = $db->prepare("SELECT id_utilisateur FROM UTILISATEUR ORDER BY id_utilisateur DESC LIMIT 1 ");
            $requete->execute();
            $derniere_id = $requete->fetchColumn();

        // Decoupage du U de l'id puis transformation du nombre (partie droite de l'id) en int
            $num = intval(substr($derniere_id, 1));

        // incrémentation de l'entier
            $num++;

        // reconstruction de l'id avec le nouvel entier
            $nouvel_id = "U" . str_pad($num, 6, "0", STR_PAD_LEFT);
            return $nouvel_id; 

        }
        public function mail_unique(string $mail)
        {
            $dbname ='pcampistron_bd';
            $dsn="mysql:host=lakartxela;dbname=$dbname";
            $user ='pcampistron_bd';
            $pass='pcampistron_bd';
            $db = new PDO($dsn, $user, $pass);

            
        }
    }   

?>