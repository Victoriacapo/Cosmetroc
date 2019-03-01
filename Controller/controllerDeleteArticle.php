<?php

//appel des différents modèles
include_once ('../model/modelbdd.php');
include_once ('../model/modelusers.php');
include_once ('../model/modelCategory.php');
include_once ('../model/modelSubCategory.php');
include_once ('../model/modelProducts.php');


//instancie un nouvel objet
$categObj = new Category(); //categorie
$sbcategObj = new SubCategory(); //ss-categorie
$productsObj = new Products(); //article

$succesArray = []; //déclaration tableau pour message de succès

$showForm = true; //booléen qui renvoie true/false pr soit cacher/afficher mn form

if (isset($_GET['idProducts']) && ($_SESSION['idUser'])) { //recupere l'idProducts 
    $productsObj->products_id = $_GET['idProducts']; //on indique que l'objet products_id correspond au Get['idProducts']
    $productsObj->users_id = $_SESSION['idUser']; 


    $pdtSheet = $productsObj->profilProducts(); //correspond à la requête pr afficher la fiche propre à un produit
    $_SESSION['idProduct'] = $_GET['idProducts']; // stocke l'idProducts dans variable de session afin de le réutiliser ultérieurement
    $_SESSION['imageProduct'] = $pdtSheet->products_img; //stocke l'objet products_img dans une variable de session qui permettras de le supprimer dans le dossier local

    if ($productsObj === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}

// bouton permettant le renvoie d’un message de confirmation pour procéder à la suppression en renvoyant par le else,le message prévu dans la vue.
if (isset($_POST['sendButton'])) {
    $showForm = false;
}

//bouton pour la suppression effective
if (isset($_POST['deleteButton'])) {
    unlink($_SESSION['imageProduct']); //suppression de l'image dans le dossier local de stockage d'image.
    $productsObj->DeletePdts(); //Exécute la requête pour la suppression du produit
    $showForm = false;
    $succesArray['deleteSucces'] = 'L\'article a été supprimé avec succès';
}
?>
    