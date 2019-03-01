<?php

class database { //declaration class database

    public $database; //attribut database

    public function __construct() { //methode magique construct permet d'executer ce qu'il y a ds le construct et permet d'executer le destruct a la fin a la fin de l'instanciation
        try {
            $this->database = new PDO('mysql:host=localhost;dbname=cosmetroc;charset=utf8', 'victoriac', 'victoriac'); //instancie un nouvel objet; permet la connexion a ma base de donnée.
        } catch (Exception $error) {
            die('Erreur : ' . $error->getMessage()); //affiche les msg d'erreur de connexion a la base de donnee
        }
    }

    public function __destruct() {// function qui permet de terminer la requete
        $this->database = NULL;
    }

}

?>
 