
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
                . 'VALUES(:nameproduct, :brand, :quantity, :state, :capacity, :expiration, :image, :category, :sbcategory, :id) '; //marqueur nominatif
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
        $addPdt->bindValue(':id', $this->users_id, PDO::PARAM_INT);
        return $addPdt->execute();
    }

    /**
     * Fonction permettant d'afficher tous les produits
     * @return Execute Query SELECT 
     * 
     */
//    public function showProducts() {
//        $response = $this->database->query('SELECT `products_name`,`products_brand`, `products_quantity`, `products_state`, `products_capacity`, '
//                . 'DATE_FORMAT(`products_expiration`, \'%d/%m/%Y\') AS expiration, `products_img` FROM `velo_products` WHERE `users_id` = :id ');
//        $response->bindValue(':id', $this->users_id, PDO::PARAM_INT);
//        $data = $response->fetchAll(PDO::FETCH_OBJ);
//        return $data; //la fonction retourne data.
//    }

    /**
     * Fonction permettant d'afficher les RDV par patient
     * @return Execute Query SELECT 
     * 
     */
    public function showProducts() {
        $query = 'SELECT `products_name`, '
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
                . 'WHERE `users_id` = :id ';
        $ShowPDT = $this->database->prepare($query);
        $ShowPDT->bindValue(':id', $this->users_id, PDO::PARAM_STR); //recupere l'id
        $ShowPDT->execute();
        $response = $ShowPDT->fetchAll(PDO::FETCH_OBJ);
        return $response;
    }
    

    /**
     * Fonction permettant d'afficher les RDV par id de rdv
     * @return Execute Query SELECT 
     * 
     */
//    public function RDVbyID() {
//        $query = 'SELECT' //dateHour concatene 2 valeurs qui sont la date et l'heure, je les sépare ds la requête de la façon qui suit:
//                . ' appointments.id,'
//                . ' DATE_FORMAT(dateHour, \'%Y-%m-%d\') AS date,' //renvoie dateHour au format %Y-%m-%d pr la date
//                . ' DATE_FORMAT(dateHour, \'%H:%i\') AS time,' //renvoie dateHour au format %H:%i  pr l'heure
//                . ' lastname,'
//                . ' firstname'
//                . ' FROM appointments'
//                . ' INNER JOIN `patients`' //jointure 
//                . ' ON appointments.idPatients = patients.id'
//                . ' WHERE `appointments`.`id`= :idAppointment';
//        $afficherRDV = $this->database->prepare($query);
//        $afficherRDV->bindValue(':idAppointment', $this->id, PDO::PARAM_INT); //recupere l'id
//        $afficherRDV->execute();
//        $resultRDV = $afficherRDV->fetch(PDO::FETCH_OBJ);
//        return $resultRDV;
//    }

    /**
     * Fonction permettant de modifier les RDV
     * @return Execute Query UPDATE 
     * 
     */
//    public function modifRDV() {
//        //variable query stocke ma requete pour inserer les donnee de mon formulaire
//        $query = 'UPDATE `appointments` SET `dateHour`= :dateHour WHERE `id`= :id'; //:dateHour = marqueur nominatif
//        $replaceRDV = $this->database->prepare($query); //connexion database puis prepare la requete
//        $replaceRDV->bindValue(':id', $this->id, PDO::PARAM_INT); //recuperation de l'attribut idPatient pr operer la modification sur la ligne du patient concerné
//        $replaceRDV->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
//        return $replaceRDV->execute();
//    }

    /**
     * Fonction permettant d'afficher les RDV par patient
     * @return Execute Query SELECT 
     * 
     */
//    public function ongletRDV() {
//        $query = 'SELECT '
//                . 'appointments.id, '
//                . 'patients.id, '
//                . 'DATE_FORMAT(dateHour, \'%d-%m-%Y\') AS date, '
//                . 'DATE_FORMAT(dateHour, \'%H:%i\') AS time '
//                . 'FROM `appointments` '
//                . 'INNER JOIN `patients` '
//                . 'ON appointments.idPatients = patients.id '
//                . 'WHERE patients.id = :idPatients';
//        $RDVsurprofil = $this->database->prepare($query);
//        $RDVsurprofil->bindValue(':idPatients', $this->idPatients, PDO::PARAM_STR); //recupere l'id
//        $RDVsurprofil->execute();
//        $RDVok = $RDVsurprofil->fetchAll(PDO::FETCH_OBJ);
//        return $RDVok;
//    }

    /**
     * Fonction permettant de supprimer un RDV
     * @return Execute Query DELETE 
     * 
     */
//    public function supprimerRDV() {
//        $query = 'DELETE FROM `appointments` WHERE `id`= :id';
//        $supprimeokRDV = $this->database->prepare($query); //connexion database puis prepare la requete
//        $supprimeokRDV->bindValue(':id', $this->id, PDO::PARAM_INT); //recuperation de l'attribut idPatient pr operer la modification sur la ligne du patient concerné
//        return $supprimeokRDV->execute();
//    }
}
