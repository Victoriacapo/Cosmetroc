<?php

class Category extends database {//creation class client qui heriteras de la class database cree ds la page modelbdd

    public $maincat_id; // attribué des attributs, correspond aux colonne de ma table 
    public $maincat_name;

    
    
    
    /**
     * Fonction permettant d'afficher catégories dans mes select(ma vue).
     * @return Execute Query SELECT 
     * 
     */
    public function showCat() {
        $response = $this->database->query('SELECT * FROM `velo_maincat`');
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data; //la fonction retourne data.
    }
    
    
}
