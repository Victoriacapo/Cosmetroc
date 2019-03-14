<?php

//appel des modeles
include_once ('model/modelbdd.php');
include_once ('model/modelusers.php');
include_once ('model/modelProducts.php');


//instancie un nouvel objet
$showPdtsObj = new Products(); // article
$usersObjt = new Users();

    //Renvoie le profil de l'utilisateur en fonction de l'idUser récupéré dans l'url.
    if (isset($_SESSION['idUser'])) { //recupere l'id session de l'utilisateur, verifie si présent ds la base de donnée, et effectue la requête
    $usersObjt->users_id = htmlspecialchars($_SESSION['idUser']);
    $profilCheck = $usersObjt->UserProfil(); //je réutilise la méthode UserProfil, pour uniquement ici vérifier si mon utilisateur est bien au statut admin
   }

   //vérification du statut de l'utilisateur.
    if ($profilCheck->users_authorised == 1) {
    $TotalListUser = $usersObjt->UsersListing(); //méthode affichant le total des Utilisateurs et leurs infos
    $listProductsNoValidate = $showPdtsObj->ProductsNoValidate();//méthode affichant tous ls produits non validé par l'administrateur
    $listProductsValidate = $showPdtsObj->AllProducts();//méthode affichant tous ls produits validé par l'administrateur

    //validation d'un article
    if (isset($_GET['idValidate'])) { //si idValidate (qui correspond à l'id du produit à valider) est récupéré, appliquer la méthode permettant de valider le produit.
        $showPdtsObj->products_id = htmlspecialchars($_GET['idValidate']);
        $validation = $showPdtsObj->validateProducts(); //méthode permettant la validation d'un article, ce qui permettrait sa publication sur le site.
        $_SESSION['showModal'] = 'showModal';
        $_SESSION['message'] = 'L\'article a été validé avec succès';
       
    }

    // supression d'un article dans la partie validation.
    if (isset($_GET['idDeleteProductNoValidate'])) {
        $showPdtsObj->products_id = htmlspecialchars($_GET['idDeleteProductNoValidate']);
        $profilProducts = $showPdtsObj->ProfilProductsByIdDelete(); //Affiche la fiche complète du produit en fonction de l'id récupéré ds l'url. Celapermet d'appliquer le unlink sur l'image de l'article a supprimer.

        $image = substr_replace($profilProducts->products_img, '', 0, 3); //$image contient le chemin modifié (le chemin de l'img stocké ds la Bdd, est ../assets/nomdeImage, la pge espaceAdmin étant sur la racine, je n'ai pas besoin des ../), je modifie donc le chemin de l'img avec substr_replace, en lui indiquant que les strings de 0 à 3 doivent être remplacés par du vide.
        unlink($image);
        $deleting = $showPdtsObj->DeletePdtsPageAdmin(); //méthode permettant la suppression d'un article. Il n'est donc plus visible sur le site.
        $_SESSION['showModal'] = 'showModal';
        $_SESSION['message'] = 'L\'article a été supprimé avec succès';
    }

    // supression d'un article dans la partie des produits déjà publié.
    if (isset($_GET['idDelete'])) { //si idDelete (qui correspond à l'id du produit à supprimer) est récupéré, appliquer la méthode permettant de supprimer le produit.
        $showPdtsObj->products_id = htmlspecialchars($_GET['idDelete']);
        $profilProducts = $showPdtsObj->ProfilProductsByIdDelete(); //Affiche la fiche complète du produit en fonction de l'idDelete récupéré. Celapermet d'appliquer le unlink sur l'image de l'article a supprimer.

        $image = substr_replace($profilProducts->products_img, '', 0, 3); //$image contient le chemin modifié (le chemin de l'img stocké ds la Bdd, est ../assets/nomdeImage, la pge espaceAdmin étant sur la racine, je n'ai pas besoin des ../), je modifie donc le chemin de l'img avec substr_replace, en lui indiquant que les strings de 0 à 3 doivent être remplacés par du vide.
        unlink($image);
        $deleting = $showPdtsObj->DeletePdtsPageAdmin(); //méthode permettant la suppression d'un article. Il n'est donc plus visible sur le site.
        $_SESSION['showModal'] = 'showModal';
        $_SESSION['message'] = 'L\'article a été supprimé avec succès';
    }
    
  //Je relance les méthodes à la fin pour avoir chacun des tableaux actualisés sans rafraichir la page.  
 $listProductsNoValidate = $showPdtsObj->ProductsNoValidate(); //méthode affichant tous ls produits non validé par l'administrateur
 $listProductsValidate = $showPdtsObj->AllProducts(); //méthode affichant tous ls produits validé par l'administrateur

    if ($usersObjt === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}


