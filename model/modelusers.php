<?php

class Users extends database {//creation class Utilisateur qui heriteras de la class database cree ds le modelbdd

    public $users_id; // attribué des attributs, correspond aux colonne de ma table 
    public $users_gender;
    public $users_lastname;
    public $users_firstname;
    public $users_address;
    public $users_city;
    public $users_CP;
    public $users_email;
    public $users_phone;
    public $users_pseudo;
    public $users_password;
    public $users_authorised;
    public $users_search;

    /**
     * Fonction permettant de rajouter un utilisateur
     * @return Execute Query INSERT INTO
     * 
     */
    public function addUser() {
        //variable query stocke ma requete pour inserer les donnee de mon formulaire
        $query = 'INSERT INTO `velo_users` (`users_gender`, `users_pseudo`, `users_password`, `users_email`, `users_authorised`) VALUES(:gender, :pseudo, :password, :email, :authorised)'; //:exemple marqueur nominatif lié aux données saisie par l'user
        $addusers = $this->database->prepare($query); //connexion database puis prepare la requete
        $addusers->bindValue(':gender', $this->users_gender, PDO::PARAM_STR);
        $addusers->bindValue(':pseudo', $this->users_pseudo, PDO::PARAM_STR);
        $addusers->bindValue(':password', $this->users_password, PDO::PARAM_STR);
        $addusers->bindValue(':email', $this->users_email, PDO::PARAM_STR);
        $addusers->bindValue(':authorised', 0, PDO::PARAM_INT);
        return $addusers->execute();
    }

    /**
     * Fonction permettant de vérifier que l'utilisateur est bien inscrit en vérifiant le pseudo, puis établie par la suite la connexion.
     * @return Execute Query SELECT 
     * 
     */
    public function checkUsers($users_pseudo) {
        $query = 'SELECT * FROM `velo_users` WHERE `users_pseudo` = :pseudo';
        $response = $this->database->prepare($query); //connexion database puis prepare la requete
        $response->bindValue(':pseudo', $users_pseudo, PDO::PARAM_STR);
        $response->execute();
        $usersInfo = $response->fetch(PDO::FETCH_OBJ);
        return $usersInfo;
    }

    /**
     * Fonction permettant d'afficher un profil en fonction de l'id session
     * @return Execute Query SELECT 
     * 
     */
    public function UserProfil() {
        $query = 'SELECT * FROM `velo_users` WHERE `users_id`=:idUser';
        $showProfil = $this->database->prepare($query);
        $showProfil->bindValue(':idUser', $this->users_id, PDO::PARAM_INT); //recupere l'id
        $showProfil->execute();
        $userprofil = $showProfil->fetch(PDO::FETCH_OBJ);
        return $userprofil;
    }

    /**
     * Fonction permettant d'afficher un profil en fonction de l'id session
     * @return Execute Query SELECT 
     * 
     */
    public function checkProfilFill() {
        $query = 'SELECT count(*) FROM velo_users WHERE users_id = :idUser '
                . 'AND users_lastname IS NOT NULL '
                . 'AND users_firstname IS NOT NULL '
                . 'AND users_address IS NOT NULL '
                . 'AND users_city  IS NOT NULL '
                . 'AND users_CP  IS NOT NULL '
                . 'AND users_phone  IS NOT NULL '
                . 'AND users_phone  IS NOT NULL ';
        $response = $this->database->prepare($query);
        $response->bindValue(':idUser', $this->users_id, PDO::PARAM_INT); //recupere l'id
        $response->execute();
        $result = $response->fetchColumn();
        
        return $result;
    }

    /**
     * Fonction permettant de recupérer les modifications des patients
     * @return Execute Query UPDATE 
     * 
     */
    public function modifyUser() {
        //variable query stocke ma requete pour inserer les donnee de mon formulaire
        $query = 'UPDATE `velo_users` SET `users_gender`= :gender, `users_lastname`= :lastname, `users_firstname`= :firstname, `users_address`= :address, `users_city` = :city, `users_CP`= :zipcode, `users_email`= :email, `users_phone`= :phone, `users_pseudo`= :pseudo WHERE `users_id`= :idUser ';
        $replaceUser = $this->database->prepare($query); //connexion database puis prepare la requete
        $replaceUser->bindValue(':idUser', $this->users_id, PDO::PARAM_INT); //recuperation de l'attribut id
        $replaceUser->bindValue(':gender', $this->users_gender, PDO::PARAM_STR);
        $replaceUser->bindValue(':lastname', $this->users_lastname, PDO::PARAM_STR);
        $replaceUser->bindValue(':firstname', $this->users_firstname, PDO::PARAM_STR);
        $replaceUser->bindValue(':address', $this->users_address, PDO::PARAM_STR);
        $replaceUser->bindValue(':city', $this->users_city, PDO::PARAM_STR);
        $replaceUser->bindValue(':zipcode', $this->users_CP, PDO::PARAM_STR);
        $replaceUser->bindValue(':email', $this->users_email, PDO::PARAM_STR);
        $replaceUser->bindValue(':phone', $this->users_phone, PDO::PARAM_STR);
        $replaceUser->bindValue(':pseudo', $this->users_pseudo, PDO::PARAM_STR);
        return $replaceUser->execute();
    }

    /**
     * Fonction permettant de supprimer un patient
     * @return Execute Query DELETE 
     * 
     */
    public function deleteUser() {
        $query = 'DELETE FROM `velo_users` WHERE `users_id`= :idUser';
        $editUser = $this->database->prepare($query); //connexion database puis prepare la requete
        $editUser->bindValue(':idUser', $this->users_id, PDO::PARAM_INT); //recuperation de l'attribut idPatient pr operer la modification sur la ligne du patient concerné
        return $editUser->execute();
    }

    /**
     * Fonction permettant d'afficher un resultat pr la recherche de l'utilisateur
     * @return Execute Query SELECT 
     * 
     */
//    public function searchPatient() {
//        $query = 'SELECT * FROM patients WHERE lastname LIKE :search OR firstname LIKE :search ORDER BY lastname';
//        $searchResult = $this->database->prepare($query);
//        $searchResult->bindValue(':search', '%' . $this->search . '%', PDO::PARAM_STR); //lie la valeur de l'input search, on enleve le % de devant, si on veut que la recherche commence absolument par la lettre tapé, entourer par ls %, la recherche seras +vaste, selectionneras tout les mots contenant la lettre/ syllabe tapé.
//        $searchResult->execute();
//        $unResult = $searchResult->fetchAll(PDO::FETCH_OBJ);
//        return $unResult;
//    }

    /**
     * Fonction permettant de réaliser ma pagination
     * @return Execute Query 
     * 
     */
//    public function pagination() {
//        $query = 'SELECT * FROM patients '; //Nous récupérons le contenu de la requête dans $retour_total
//        $retour_total = $this->database->prepare($query);
//        $retour_total->execute();
//        $retour_total->fetchAll();
//        return $retour_total->rowCount(); //rowCount() permet de me retourner le total en INT et non en STRING, le INT est nécessaire pr les opération à effectuer par la suite.
//    }

    /*     * pour récupérer les messages de la page actuelle et organisé les données par page.
     * @return Execute Query 
     * 
     */

//    public function patientbyPage($premiereEntree, $patientsParPage) {
//        $query = 'SELECT * FROM patients ORDER BY lastname LIMIT ' . $premiereEntree . ',' . $patientsParPage . '';
//        $retour_page = $this->database->prepare($query);
//        $retour_page->execute();
//        $pagePatient = $retour_page->fetchAll(PDO::FETCH_OBJ);
//        return $pagePatient;
//    }
}
