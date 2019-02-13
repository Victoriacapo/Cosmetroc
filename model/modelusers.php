<?php

class Users extends database {//creation class client qui heriteras de la class database cree ds la page modelbdd

    public $users_id; // attribué des attributs, correspond aux colonne de ma table 
    public $users_gender;
    public $users_lastname;
    public $users_firstname;
    public $users_address;
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
        $query = 'INSERT INTO `velo_users` (`users_gender`, `users_pseudo`, `users_password`, `users_email`) VALUES(:gender, :pseudo, :password, :email)'; //:exemple marqueur nominatif lié aux données saisie par l'user
        $addusers = $this->database->prepare($query); //connexion database puis prepare la requete
        $addusers->bindValue(':gender', $this->users_gender, PDO::PARAM_STR);
        $addusers->bindValue(':pseudo', $this->users_pseudo, PDO::PARAM_STR);
        $addusers->bindValue(':password', $this->users_password, PDO::PARAM_STR);
        $addusers->bindValue(':email', $this->users_email, PDO::PARAM_STR);
        return $addusers->execute();
    }

    /**
     * Fonction permettant de vérifier que l'utilisateur est bien inscrit
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
     * Fonction permettant d'afficher un profil de patient
     * @return Execute Query SELECT 
     * 
     */
//    public function profilPatient() {   // correction autre possibilite: SELECT lastName, firstName, birthDate, IF(card = 1, "oui", "non") AS card, cardNumber FROM clients;
//        $query = 'SELECT * FROM `patients` WHERE `id`=:id';
//        $afficherProfil = $this->database->prepare($query);
//        $afficherProfil->bindValue(':id', $this->id, PDO::PARAM_INT); //recupere l'id
//        $afficherProfil->execute();
//        $patientprofil = $afficherProfil->fetch(PDO::FETCH_OBJ);
//        return $patientprofil;
//    }

    /**
     * Fonction permettant de recupérer les modifications des patients
     * @return Execute Query UPDATE 
     * 
     */
//    public function modifPatient() {
//        //variable query stocke ma requete pour inserer les donnee de mon formulaire
//        $query = 'UPDATE `patients` SET `lastname`= :lastname, `firstname`=:firstname, `birthdate`= :birthdate, `phone`= :phone, `mail`= :mail WHERE `id`= :id'; //:lastname = marqueur nominatif
//        $replacePatient = $this->database->prepare($query); //connexion database puis prepare la requete
//        $replacePatient->bindValue(':id', $this->id, PDO::PARAM_INT); //recuperation de l'attribut id
//        $replacePatient->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
//        $replacePatient->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
//        $replacePatient->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
//        $replacePatient->bindValue(':phone', $this->phone, PDO::PARAM_STR);
//        $replacePatient->bindValue(':mail', $this->mail, PDO::PARAM_STR);
//        return $replacePatient->execute();
//    }

    /**
     * Fonction permettant de supprimer un patient
     * @return Execute Query DELETE 
     * 
     */
//    public function supprimerPatient() {
//        $query = 'DELETE FROM `patients` WHERE `id`= :id';
//        $supprimeokPatient = $this->database->prepare($query); //connexion database puis prepare la requete
//        $supprimeokPatient->bindValue(':id', $this->id, PDO::PARAM_INT); //recuperation de l'attribut idPatient pr operer la modification sur la ligne du patient concerné
//        return $supprimeokPatient->execute();
//    }

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
