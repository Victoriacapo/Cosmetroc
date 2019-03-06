<?php

//appel des modeles
include_once ('model/modelbdd.php');
include_once ('model/modelusers.php');
include_once ('model/modelProducts.php');


//instancie un nouvel objet
$showPdtsObj = new Products(); // article
$usersObjt = new Users();


 

if (isset($_SESSION['idUser'])) { //recupere l'id session de l'utilisateur, verifie si présent ds la base de donnée, et effectue la requête
   $usersObjt->users_id = $_SESSION['idUser'];
   $profilCheck = $usersObjt->UserProfil(); //je réutilise la méthode UserProfil, pour uniquement ici vérifier si mon utilisateur est bien au statut admin
}
    
if ($profilCheck->users_authorised == 1){
   $TotalListUser = $usersObjt->UsersListing(); //méthode affichant le total des Utilisateurs et leurs infos
   $totalProductsbyusers = $showPdtsObj->ProductsListing();
   var_dump($totalProductsbyusers);
    if ($usersObjt === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}


