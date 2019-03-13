<?php

//appel des modeles
include_once ('model/modelbdd.php');
include_once ('model/modelusers.php');
include_once ('model/modelProducts.php');


//instancie un nouvel objet
$showPdtsObj = new Products(); // article
$usersObjt = new Users();


if (isset($_SESSION['idUser'])) { //recupere l'id session de l'utilisateur, verifie si présent ds la base de donnée, et effectue la requête
    $usersObjt->users_id = htmlspecialchars($_SESSION['idUser']);
    $profilCheck = $usersObjt->UserProfil(); //je réutilise la méthode UserProfil, pour uniquement ici vérifier si mon utilisateur est bien au statut admin
}

if ($profilCheck->users_authorised == 1) {
    $TotalListUser = $usersObjt->UsersListing(); //méthode affichant le total des Utilisateurs et leurs infos
    $listProductsNoValidate = $showPdtsObj->ProductsNoValidate();
    $listProductsValidate = $showPdtsObj->AllProducts();


    if (isset($_GET['idValidate'])) { //si idValidate (qui correspond à l'id du produit à valider) est récupéré, appliquer la méthode permettant de valider le produit.
        $showPdtsObj->products_id = htmlspecialchars($_GET['idValidate']);
        $validation = $showPdtsObj->validateProducts(); //méthode permettant la validation d'un article, ce qui permettrait sa publication sur le site.
    }

    if (isset($_GET['idDelete'])) { //si idDelete (qui correspond à l'id du produit à supprimer) est récupéré, appliquer la méthode permettant de supprimer le produit.
        $showPdtsObj->products_id = htmlspecialchars($_GET['idDelete']);
        $profilProducts = $showPdtsObj->ProfilProductsByIdDelete(); //Affiche la fiche complète du produit en fonction de l'idDelete récupéré. Celapermet d'appliquer le unlink sur l'image de l'article a supprimer.


        $image = substr_replace($profilProducts->products_img, '', 0, 3);
        unlink($image);
        $deleting = $showPdtsObj->DeletePdtsPageAdmin(); //méthode permettant la suppression d'un article. Il n'est donc plus visible sur le site.
        header('Location: http://Cosmetroc/espaceAdmin.php');
    }

    if ($usersObjt === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}


