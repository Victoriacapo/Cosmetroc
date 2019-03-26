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
     * Fonction permettant de vérifier si le profil de l'utilisateur est complet, pour pouvoir afficher le formulaire d'ajout d'article
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
        /*La requête compte le nombre de colonne de la table velo_users
         * en fonction de l'idUser et que les colonnes cités soit complété (donc ont une valeur)
         * fetchColumn(), récupère la 1ère ligne des colonnes de la bdd si la condition WHERE  et les AND sont remplies.
         * Si les condition WHERE et AND ne sont pas remplie, me renvoie 0 ligne des colonnes, le cas contraire me renvoie la 1ere ligne des colonnes.
         * Donc retourne soit 0 ou 1.  
         */
    }

    /**
     * Fonction permettant de modifier le profil d'un utilisateur
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
     * Fonction permettant d'afficher la liste des utilisateurs dans ma page admin
     * @return Execute Query SELECT 
     * 
     */
    public function UsersListing() {
        $query = 'SELECT * FROM `velo_users` ';
        $showUsers = $this->database->prepare($query);
        $showUsers->execute();
        $usersList = $showUsers->fetchAll(PDO::FETCH_OBJ);
        return $usersList;
    }
    
    /**
     * Fonction permettant de supprimer un utilisateur dans la page admin
     * @return Execute Query DELETE 
     * 
     */
    public function deleteUserAdminPage() {
        $query = 'DELETE FROM `velo_users` WHERE `users_id`= :idDeleteUser';
        $editUser = $this->database->prepare($query); //connexion database puis prepare la requete
        $editUser->bindValue(':idDeleteUser', $this->users_id, PDO::PARAM_STR); 
        return $editUser->execute();
    }
    
    /**
     * Fonction permettant d'afficher la liste des utilisateurs etl'ensemble de leur produits validé sur le site
     * @return Execute Query SELECT 
     * 
     */
    public function UsersListingForProductslisting() {
        $query = 'SELECT '
                . '`velo_users`.`users_id`, '
                . '`users_pseudo`, '
                . '`users_email` '
                . 'FROM `velo_users` '
                . 'INNER JOIN `velo_products` '
                . 'ON `velo_users`.users_id = `velo_products`.users_id '
                . 'WHERE products_validate = 1 '
                . 'GROUP BY users_pseudo ';
        $showUsers = $this->database->prepare($query);
        $showUsers->execute();
        $usersList = $showUsers->fetchAll(PDO::FETCH_OBJ);
        return $usersList;
    }
    
    /**
     * Fonction permettant d'afficher les infos d'un utilisateur en fonction de l'idUserProductsList
     * @return Execute Query SELECT 
     * 
     */
    public function UserInfosPageProducts() {
        $query = 'SELECT '
                . '`velo_users`.`users_id`, '
                . '`users_gender`, '
                . '`users_pseudo`, '
                . '`users_email` '
                . 'FROM `velo_users` '
                . 'WHERE `users_id` = :idUserProductsList ';
        $showUserPseudo = $this->database->prepare($query);
        $showUserPseudo->bindValue(':idUserProductsList', $this->users_id, PDO::PARAM_INT);
        $showUserPseudo->execute();
        $response = $showUserPseudo->fetch(PDO::FETCH_OBJ);
        return $response;
    }
}
