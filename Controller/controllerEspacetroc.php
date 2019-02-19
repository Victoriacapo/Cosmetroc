<?php

//appel des modeles
include_once ('model/modelbdd.php');
include_once ('model/modelusers.php');
include_once ('model/modelProducts.php');


//instancie un nouvel objet
$showPdtsObj = new Products(); // article

if (isset($_SESSION['id'])) { //recupere l'id, verifie si présent ds la base de donnée, et effectue la requête
    $showPdtsObj->users_id = $_SESSION['id'];
    $productsByUsers = $showPdtsObj->showProducts();
    if ($showPdtsObj === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}
var_dump($showPdtsObj);
var_dump($productsByUsers);