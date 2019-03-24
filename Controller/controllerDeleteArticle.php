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

$showList = true; //booléen qui renvoie true/false pr soit cacher/afficher mn form
$checkId = true; //variable qui permet d'appliquer un  message à l'utilisateur si son identifiant est incorrect.
        
if (isset($_GET['idProducts']) && ($_SESSION['idUser'])) { //recupere l'idProducts et l'idUser
    $productsObj->products_id = $_GET['idProducts']; //on indique que l'objet products_id correspond au Get['idProducts'] pour effectuer la méthode profilProducts 
    $productsObj->users_id = $_SESSION['idUser']; 


    $pdtSheet = $productsObj->profilProducts(); //correspond à la requête pr afficher la fiche propre à un produit, la variable $pdtSheet est appelé pour m'afficher la fiche produit dans la vue. 
    $_SESSION['idProduct'] = htmlspecialchars($_GET['idProducts']); // stocke l'idProducts dans variable de session pour l'utiliser
    $_SESSION['imageProduct'] = $pdtSheet->products_img; //stocke l'objet products_img dans une variable de session qui permettras de le supprimer dans le dossier local

    
    if ($productsObj === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
        if ($_SESSION['idUser'] == $pdtSheet->users_id){// si la variable de session est égale à l'objet $productsObj->users_id, la variable $checkId retourne vrai.
            $checkId = false;
        }
    }
}

// bouton permettant le renvoie d’un message de confirmation pour procéder à la suppression en renvoyant par le else,le message prévu dans la vue.
if (isset($_POST['sendButton'])) {
    $showList = false;
}

//bouton pour la suppression effective
if (isset($_POST['deleteButton'])) {
    unlink($_SESSION['imageProduct']); //suppression de l'image dans le dossier local de stockage d'image.
    $productsObj->DeletePdts(); //Exécute la requête pour la suppression du produit
    $showList = false;
    $succesArray['deleteSucces'] = 'L\'article a été supprimé avec succès';
}
?>
    