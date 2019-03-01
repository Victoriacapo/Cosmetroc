<?php

//appel des modeles
include_once ('model/modelbdd.php');
include_once ('model/modelusers.php');
include_once ('model/modelProducts.php');


//instancie un nouvel objet
$showPdtsObj = new Products(); // article
$profilUserObj = new Users();

if (isset($_SESSION['idUser'])) { //recupere l'id session de l'utilisateur, verifie si présent ds la base de donnée, et effectue la requête
    $showPdtsObj->users_id = $_SESSION['idUser'];
    $profilUserObj->users_id = $_SESSION['idUser'];
    
    $productsByUsers = $showPdtsObj->showProducts(); //applique la méthode pour afficher à l'utilisateur tous les produit qu'il a proposé en troc sur le site
    $profilFull = $profilUserObj->UserProfil();
    var_dump($profilFull);
    if ($showPdtsObj === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}


