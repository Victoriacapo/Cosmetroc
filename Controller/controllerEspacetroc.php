<?php

//appel des modeles
include_once ('model/modelbdd.php');
include_once ('model/modelusers.php');
include_once ('model/modelProducts.php');


//instancie un nouvel objet
$showPdtsObj = new Products(); // article

if (isset($_SESSION['idUser'])) { //recupere l'id session de l'utilisateur, verifie si présent ds la base de donnée, et effectue la requête
    $showPdtsObj->users_id = $_SESSION['idUser'];
    $productsByUsers = $showPdtsObj->showProducts();
    
    if ($showPdtsObj === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}
