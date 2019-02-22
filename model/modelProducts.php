
<?php

class Products extends database {//creation class client qui heriteras de la class database cree ds la page modelbdd

    public $products_id; // attribué des attributs, correspond aux colonne de ma table 
    public $products_name;
    public $products_brand;
    public $products_quantity;
    public $products_state;
    public $products_capacity;
    public $products_expiration;
    public $products_img;
    public $maincat_id;
    public $subcat_id;
    public $users_id;

    /**
     * Fonction permettant d'ajouter un user
     * @return Execute Query INSERT INTO
     * 
     */
    public function addProducts() {
        //variable query stocke ma requete pour inserer les donnee de mon formulaire
        $query = 'INSERT INTO `velo_products` (`products_name`, `products_brand`, `products_quantity`, '
                . '`products_state`, `products_capacity`, `products_expiration`, `products_img`, '
                . '`maincat_id`, `subcat_id`, `users_id`) '
                . 'VALUES(:nameproduct, :brand, :quantity, :state, :capacity, :expiration, :image, :category, :sbcategory, :idUser) '; //marqueur nominatif
        $addPdt = $this->database->prepare($query); //connexion database puis prepare la requete
        $addPdt->bindValue(':nameproduct', $this->products_name, PDO::PARAM_STR);
        $addPdt->bindValue(':brand', $this->products_brand, PDO::PARAM_STR);
        $addPdt->bindValue(':quantity', $this->products_quantity, PDO::PARAM_INT);
        $addPdt->bindValue(':state', $this->products_state, PDO::PARAM_STR);
        $addPdt->bindValue(':capacity', $this->products_capacity, PDO::PARAM_STR);
        $addPdt->bindValue(':expiration', $this->products_expiration, PDO::PARAM_STR);
        $addPdt->bindValue(':image', $this->products_img, PDO::PARAM_STR);
        $addPdt->bindValue(':category', $this->maincat_id, PDO::PARAM_INT);
        $addPdt->bindValue(':sbcategory', $this->subcat_id, PDO::PARAM_INT);
        $addPdt->bindValue(':idUser', $this->users_id, PDO::PARAM_INT);
        return $addPdt->execute();
    }

    /**
     * Fonction permettant d'afficher à l'utilisateur tous les produit qu'il a proposé en troc sur le site
     * @return Execute Query SELECT 
     * 
     */
    public function showProducts() {
        $query = 'SELECT '
                . '`products_id`, '
                . '`products_name`, '
                . '`products_brand`, '
                . '`products_quantity`, '
                . '`products_state`, '
                . '`products_capacity`, '
                . 'DATE_FORMAT(`products_expiration`, \'%d/%m/%Y\') AS expiration, '
                . '`products_img`, '
                . '`maincat_name`, '
                . '`subcat_name` '
                . 'FROM `velo_products` '
                . 'INNER JOIN `velo_maincat` '
                . 'ON `velo_products`.maincat_id = `velo_maincat`.maincat_id '
                . 'INNER JOIN `velo_subcat` '
                . 'ON `velo_products`.subcat_id = `velo_subcat`.subcat_id '
                . 'WHERE `users_id` = :idUser ';
        $ShowPDT = $this->database->prepare($query);
        $ShowPDT->bindValue(':idUser', $this->users_id, PDO::PARAM_STR); //recupere l'id
        $ShowPDT->execute();
        $response = $ShowPDT->fetchAll(PDO::FETCH_OBJ);
        return $response;
    }

    /**
     * Fonction permettant d'afficher une fiche/profil d'un produit en fonction de son id
     * @return Execute Query SELECT 
     * 
     */
    public function profilProducts() {
        $query = 'SELECT `products_id`, '
                . '`products_name`, '
                . '`products_brand`, '
                . '`products_quantity`, '
                . '`products_state`, '
                . '`products_capacity`, '
                . '`products_expiration`, '
                . '`products_img`, '
                . '`velo_products`.`subcat_id`, '
                . '`velo_products`.`maincat_id`, '
                . '`maincat_name`, '
                . '`subcat_name` '
                . 'FROM `velo_products` '
                . 'INNER JOIN `velo_maincat` '
                . 'ON `velo_products`.maincat_id = `velo_maincat`.maincat_id '
                . 'INNER JOIN `velo_subcat` '
                . 'ON `velo_products`.subcat_id = `velo_subcat`.subcat_id '
                . 'WHERE `products_id` = :idProducts ';
        $productSheet = $this->database->prepare($query);
        $productSheet->bindValue(':idProducts', $this->products_id, PDO::PARAM_INT); //recupere l'id
        $productSheet->execute();
        $product = $productSheet->fetch(PDO::FETCH_OBJ);
        return $product;
    }

    /**
     * Fonction permettant de modifier un produit sans l'image
     * @return Execute Query UPDATE 
     * 
     */
    public function editProductWithoutImg() {
        //variable query stocke ma requete pour inserer les donnee de mon formulaire
        $query = 'UPDATE `velo_products` '
                . 'SET `products_name`= :nameproduct, '
                . '`products_brand`= :brand, '
                . '`products_quantity`= :quantity, '
                . '`products_state`= :state, '
                . '`products_capacity`= :capacity, '
                . '`products_expiration`= :expiration, '
                . '`subcat_id`= :sbcategory, '
                . '`maincat_id`= :category '
                . 'WHERE `products_id` = :idProducts ';
        $editPdt = $this->database->prepare($query); //connexion database puis prepare la requete
        $editPdt->bindValue(':nameproduct', $this->products_name, PDO::PARAM_STR);
        $editPdt->bindValue(':brand', $this->products_brand, PDO::PARAM_STR);
        $editPdt->bindValue(':quantity', $this->products_quantity, PDO::PARAM_STR);
        $editPdt->bindValue(':state', $this->products_state, PDO::PARAM_STR);
        $editPdt->bindValue(':capacity', $this->products_capacity, PDO::PARAM_STR);
        $editPdt->bindValue(':expiration', $this->products_expiration, PDO::PARAM_STR);
        $editPdt->bindValue(':category', $this->maincat_id, PDO::PARAM_STR);
        $editPdt->bindValue(':sbcategory', $this->subcat_id, PDO::PARAM_STR);
        $editPdt->bindValue(':idProducts', $this->products_id, PDO::PARAM_STR);
        return $editPdt->execute();
    }

    /**
     * Fonction permettant de modifier un produit sans l'image
     * @return Execute Query UPDATE 
     * 
     */
    public function editProduct() {
        //variable query stocke ma requete pour inserer les donnee de mon formulaire
        $query = 'UPDATE `velo_products` '
                . 'SET `products_name`= :nameproduct, '
                . '`products_brand`=:brand, '
                . '`products_quantity`= :quantity, '
                . '`products_state`= :state, '
                . '`products_capacity`= :capacity, '
                . '`products_expiration`= :expiration, '
                . '`products_img`= :image, '
                . '`maincat_id`= :category, '
                . '`subcat_id`= :sbcategory '
                . 'WHERE `products_id` = :idProducts ';
        $response = $this->database->prepare($query); //connexion database puis prepare la requete
        $response->bindValue(':nameproduct', $this->products_name, PDO::PARAM_STR);
        $response->bindValue(':brand', $this->products_brand, PDO::PARAM_STR);
        $response->bindValue(':quantity', $this->products_quantity, PDO::PARAM_STR);
        $response->bindValue(':state', $this->products_state, PDO::PARAM_STR);
        $response->bindValue(':capacity', $this->products_capacity, PDO::PARAM_STR);
        $response->bindValue(':expiration', $this->products_expiration, PDO::PARAM_STR);
        $response->bindValue(':image', $this->products_img, PDO::PARAM_STR);
        $response->bindValue(':category', $this->maincat_id, PDO::PARAM_STR);
        $response->bindValue(':sbcategory', $this->subcat_id, PDO::PARAM_STR);
        $response->bindValue(':idProducts', $this->products_id, PDO::PARAM_STR);
        return $response->execute();
    }
}
