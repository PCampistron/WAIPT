
<?php
    /** 
     * @file Jeu.php
     * @author pcampistron
     * @brief Spécifie une classe Jeu permettant de faciliter l'affichage de ceux de la BD
     * @details Contient toutes les informations d'un jeu tel que son nom, son prix, ses genres...
     * @version 0.1
     * @date 08/02/2023
     */

class Jeu
{
    // ATTRIBUTS

    /**
     * @brief Nom du Jeu
    */
    private string $nom;

    /**
     * @brief Id du Jeu
     */
    private string $idJeu;

    /**
     * @brief Prix du Jeu
     */
    private float $prixConseille;

    /**
     * @brief Liste de genres du Jeu
     */
    private array $genres;

    private array $plateformes;

    // CONSTRUCTEUR

    /**
     * @brief Constructeur de la classe Jeu
     * @details Constructeur de la classe Jeu prenant en paramètre un nom, un id, un prix, une liste de genres
     * @param [in] nom Nom du jeu
     * @param [in] idJeu Identifiant du jeu dans la BD
     * @param [in] prixConseille Prix conseillé du jeu
     * @param [in] genres Liste de chaîne de caractères qui correspond aux genres qui caractérisent le jeu
     */
    public function __construct(string $nom, 
                                string $idJeu,
                                float $prixConseille,
                                $genres,
                                $plateformes)
    {
        $this->nom = $nom;
        $this->idJeu = $idJeu;
        $this->prixConseille = $prixConseille;
        $this->genres = $genres;
        $this->plateformes = $plateformes;
    }

    // ENCAPSULATION

    /**
    * @brief Getter de la variable nom
    * 
    * @return une chaine de caractère
    */
    public function getNom()
    {
        return $this->nom;
    }

    /**
    * @brief Setter de la variable nom
    * 
    * @param [in] nom Nom du jeu
    */
    public function setNom(string $nom)
    {
        $this->nom = $nom;
    }

    /**
    * @brief Getter de la variable idJeu
    * 
    * @return une chaine de caractère
    */
    public function getIdJeu()
    {
        return $this->idJeu;
    }

    /**
    * @brief Setter de la variable idJeu
    * 
    * @param [in] idJeu Identifiant du jeu
    */
    public function setIdJeu(string $idJeu)
    {
        $this->idJeu = $idJeu;
    }

    /**
    * @brief Getter de la variable prixConseille
    * 
    * @return un nombre décimal
    */
    public function getPrixConseille()
    {
        return $this->prixConseille;
    }

    /**
    * @brief Setter de la variable prixConseille
    * 
    * @param [in] prixConseille Prix conseillé du jeu
    */
    public function setPrixConseille(float $prixConseille)
    {
        $this->prixConseille = $prixConseille;
    }

    /**
    * @brief Getter de la variable genres
    * 
    * @return une liste de chaine de caractère
    */
    public function getGenres()
    {
        return $this->genres;
    }

    /**
    * @brief Setter de la variable genres
    * 
    * @param [in] genres Liste de genres
    */
    public function setGenres($genres)
    {
        $this->genres = $genres;
    }

    /**
    * @brief Getter de la variable plateformes
    * 
    * @return un dictionnaire de plateformes, chaque plateforme possède un nom et un lien vers le magasin.
    */
    public function getPlateformes()
    {
        return $this->plateformes;
    }

    /**
    * @brief Getter de la variable plateformes
    * 
    * @param [in] plateformes dictionnaire de plateformes
    */
    public function setPlateformes($plateformes)
    {
        $this->plateformes = $plateformes;
    }
}

?>