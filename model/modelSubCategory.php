<?php

class SubCategory extends database {//creation class client qui heriteras de la class database cree ds la page modelbdd

    public $subcat_id; //attributs, correspond aux colonne de ma table 
    public $subcat_name;
    public $maincat_id;
    public $maincat_name;
    
    
    
     /**
     * Fonction permettant d'afficher ss-catégories dans mes select(ma vue).
     * @return Execute Query SELECT 
     * 
     */
    public function showSubCat() {
        $response = $this->database->query('SELECT * FROM `velo_subcat`');
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data; //la fonction retourne data.
    }
    
     /**
     * Fonction permettant d'afficher ss-catégories en fonction du maincat_id
     * @return Execute Query SELECT 
     * 
     */
    public function SubCatbyIdmcat() {
        $response = $this->database->query('SELECT * FROM `velo_subcat` INNER JOIN `velo_maincat` ON `velo_maincat`.`maincat_id` = `velo_subcat`.`maincat_id`');
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data; //la fonction retourne data.
    }  
    
    /**
     * Fonction permettant d'afficher ss-catégories en fonction du maincat_id
     * @return Execute Query SELECT 
     * 
     */
    public function ok() {
        $query = $this->database->query('SELECT subcat_name, maincat_name FROM `velo_subcat` INNER JOIN `velo_maincat` ON velo_maincat.maincat_id = velo_subcat.maincat_id WHERE velo_subcat.`maincat_id` = :maincat_id');
        $response = $this->database->prepare($query);
        $response->bindValue(':maincat_id', $this->maincat_id, PDO::PARAM_INT);
        $data = $response->fetchAll(PDO::FETCH_OBJ);
        return $data; //la fonction retourne data.
    }
    
}
