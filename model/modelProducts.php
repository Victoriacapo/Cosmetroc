
<?php

class Products extends database {//création class Products qui hériteras de la class database crée ds le modelbdd

    public $products_id; // attribué des attributs, correspond aux colonnes de ma table 
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
    public $search;

    /**
     * Fonction permettant d'enregistrer un produit
     * @return Execute Query INSERT INTO
     * 
     */
    public function addProducts() {
        //variable query stocke ma requête pour insérer les donnee de mon formulaire
        $query = 'INSERT INTO `velo_products` (`products_name`, `products_brand`, `products_quantity`, '
                . '`products_state`, `products_capacity`, `products_expiration`, `products_img`, '
                . '`maincat_id`, `subcat_id`, `users_id`) '
                . 'VALUES(:nameproduct, :brand, :quantity, :state, :capacity, :expiration, :image, :category, :sbcategory, :idUser) '; //marqueur nominatif
        $addPdt = $this->database->prepare($query); //connexion database puis prépare la requête
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
     * Fonction permettant d'afficher une fiche/profil d'un produit en fonction de l'id du produit
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
                . '`subcat_name`, '
                . '`users_id` '
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
     * Fonction permettant de modifier un produit 
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

    /**
     * Fonction permettant de supprimer un article
     * @return Execute Query DELETE 
     * 
     */
    public function DeletePdts() {
        $query = 'DELETE FROM `velo_products` WHERE `products_id`= :idProducts AND `users_id`= :idUser ';
        $deletePdt = $this->database->prepare($query); //connexion database puis prepare la requête
        $deletePdt->bindValue(':idProducts', $this->products_id, PDO::PARAM_INT);
        $deletePdt->bindValue(':idUser', $this->users_id, PDO::PARAM_INT);
        return $deletePdt->execute();
    }

    /**
     * Fonction permettant d'afficher les categorie et sous-categorie d'un produit dans ma nav
     * @return Execute Query SELECT 
     * 
     */
    public function navbar($maincat_id, $subcat_id) {
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
                . 'WHERE `velo_maincat`.maincat_id = :maincat_id '
                . 'And `velo_subcat`. subcat_id = :subcat_id ';
        $productnavbar = $this->database->prepare($query);
        $productnavbar->bindValue(':maincat_id', $maincat_id, PDO::PARAM_STR);
        $productnavbar->bindValue(':subcat_id', $subcat_id, PDO::PARAM_STR);
        $productnavbar->execute();
        $ArrayProductNavbar = $productnavbar->fetchAll(PDO::FETCH_OBJ);
        return $ArrayProductNavbar;
    }
    
/**
     * Fonction permettant d'afficher les categorie et sous-categorie d'un produit dans ma nav
     * @return Execute Query SELECT 
     * 
     */
    public function navbarJustMaincat($maincat_id) {
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
                . 'WHERE `velo_maincat`.maincat_id = :maincat_id ';
        $MaincatNavbar = $this->database->prepare($query);
        $MaincatNavbar->bindValue(':maincat_id', $maincat_id, PDO::PARAM_STR);
        $MaincatNavbar->execute();
        $ArrayProductNavbar = $MaincatNavbar->fetchAll(PDO::FETCH_OBJ);
        return $ArrayProductNavbar;
    }

    /**
     * Fonction permettant d'afficher tous les produits et leur categorie et sous-categorie au niveau des cards
     * @return Execute Query SELECT 
     * 
     */
    public function AllProducts() {
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
                . 'ON `velo_products`.subcat_id = `velo_subcat`.subcat_id ';
        $response = $this->database->prepare($query);
        $response->execute();
        $ArrayProductNavbar = $response->fetchAll(PDO::FETCH_OBJ);
        return $ArrayProductNavbar;
    }

    /**
     * Fonction permettant d'afficher un resultat pr la recherche de produit
     * @return Execute Query SELECT 
     * 
     */
    public function searchProducts() {
        $query = 'SELECT * '
                . 'FROM `velo_products` '
                . 'INNER JOIN `velo_maincat` '
                . 'ON `velo_products`.maincat_id = `velo_maincat`.maincat_id '
                . 'INNER JOIN `velo_subcat` '
                . 'ON `velo_products`.subcat_id = `velo_subcat`.subcat_id '
                . 'WHERE `products_name` LIKE :search '
                . 'OR `products_brand` LIKE :search '
                . 'OR `maincat_name` LIKE :search '
                . 'OR `subcat_name` LIKE :search '
                . 'ORDER BY `products_name` ';
        $searchResult = $this->database->prepare($query);
        $searchResult->bindValue(':search', $this->search , PDO::PARAM_STR); //lie la valeur de l'input search, on enleve le % de devant, si on veut que la recherche commence absolument par la lettre tapé, entourer par ls %, la recherche seras +vaste, selectionneras tout les mots contenant la lettre/ syllabe tapé.
        $searchResult->execute();
        $ArrayProductNavbar = $searchResult->fetchAll(PDO::FETCH_OBJ);
        return $ArrayProductNavbar;
    }

}
