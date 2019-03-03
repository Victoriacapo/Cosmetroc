<?php

class Category extends database {//creation class client qui heriteras de la class database cree ds la page modelbdd

    public $maincat_id; // attribué des attributs, correspond aux colonne de ma table 
    public $maincat_name;

    /**
     * Fonction permettant d'afficher les catégories dans mes select(ma vue ajout-article).
     * @return Execute Query SELECT 
     * 
     */
    public function showCat() {
        $response = $this->database->query('SELECT * FROM `velo_maincat`');
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data; //la fonction retourne data.
    }

    /**
     * Fonction permettant d'afficher les catégories et les sous-catégorie associés.
     * @return Execute Query SELECT 
     * 
     */
    public function showCatAndSubcat() {
        $response = $this->database->query('SELECT `velo_maincat`. `maincat_id`, '
                . '`maincat_name`, '
                . '`velo_subcat`. `subcat_id`, '
                . '`subcat_name` '
                . 'FROM `velo_maincat` '
                . 'INNER JOIN `velo_subcat` '
                . 'ON `velo_maincat`.maincat_id = `velo_subcat`.maincat_id ');
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data; //la fonction retourne data.
    }

}
