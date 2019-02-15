
<?php

class Products extends database {//creation class client qui heriteras de la class database cree ds la page modelbdd

    public $id; // attribué des attributs, correspond aux colonne de ma table 
    public $products_name;
    public $products_brand;
    public $products_quantity;
    public $products_state;
    public $products_capacity;
    public $products_expiration;
    public $subcat_id;
    public $maincat_id;
    public $users_id;
    public $products_img;

    
    
    /**
     * Fonction permettant d'ajouter un user
     * @return Execute Query INSERT INTO
     * 
     */
    public function addProducts() {
        //variable query stocke ma requete pour inserer les donnee de mon formulaire
        $query = 'INSERT INTO `velo_products` (`products_name`, `products_brand`, `products_quantity`, '
                . '`products_state`, `products_capacity`, `products_expiration`, '
                . '`subcat_id`, `maincat_id`, `users_id`, `products_img`) '
                . 'VALUES(:nameproduct, :brand, :quantity, :state, :capacity, :expiration, :sbcategory, :category, :userId :image) '; //marqueur nominatif
        $addPdt = $this->database->prepare($query); //connexion database puis prepare la requete
        $addPdt->bindValue(':nameproduct', $this->products_name, PDO::PARAM_STR);
        $addPdt->bindValue(':brand', $this->products_brand, PDO::PARAM_STR);
        $addPdt->bindValue(':quantity', $this->products_quantity, PDO::PARAM_INT);
        $addPdt->bindValue(':state', $this->products_state, PDO::PARAM_STR);
        $addPdt->bindValue(':capacity', $this->products_capacity, PDO::PARAM_STR);
        $addPdt->bindValue(':expiration', $this->products_expiration, PDO::PARAM_STR);
        $addPdt->bindValue(':sbcategory', $this->subcat_id, PDO::PARAM_INT);
        $addPdt->bindValue(':category', $this->maincat_id, PDO::PARAM_INT);
        $addPdt->bindValue(':userId', $this->users_id, PDO::PARAM_INT);
        $addPdt->bindValue(':image', $this->products_img, PDO::PARAM_STR);
        return $addPdt->execute();
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
