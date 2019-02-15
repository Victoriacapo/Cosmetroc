<?php

//appel des modeles
include_once ('../model/modelbdd.php');
include_once ('../model/modelusers.php');
include_once ('../model/modelCategory.php');
include_once ('../model/modelSubCategory.php');
include_once ('../model/modelArticle.php');

//instancie un nouvel objet
$categObj = new Category(); //categorie
$sbcategObj = new SubCategory(); //ss-categorie
$pductsObj = new Products(); // article


$showMncat = $categObj->showCat(); //permet d'effectuer ma requête pr afficher les catégories
$showSbcat = $sbcategObj->showSubCat(); //permet d'effectuer ma requête pr afficher les ss-catégories

// on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];
$regexName = '/^[a-zA-Z0-9_]+$/';

// Verification des inputs.
if (isset($_POST['nameproduct'])) { // recherche donnée input 
    $pductsObj->products_name = htmlspecialchars($_POST['nameproduct']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $pductsObj->products_name)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['nameproduct'] = 'Veuillez inscrire un nom de produit conforme';
    }
    // on test si c'est vide
    if (empty($pductsObj->products_name)) {
        $errorsArray['nameproduct'] = 'Veuillez saisir un nom de produit pour continuer';
    }
}

if (isset($_POST['brand'])) { // recherche donnée input 
    $pductsObj->products_brand = htmlspecialchars($_POST['nameproduct']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $pductsObj->products_brand)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['brand'] = 'Veuillez inscrire une marqe conforme';
    }
    // on test si c'est vide
    if (empty($pductsObj->products_brand)) {
        $errorsArray['brand'] = 'Veuillez saisir une marque pour continuer';
    }
}

if (isset($_POST['quantity'])) { // recherche donnée input 
    $pductsObj->products_quantity = htmlspecialchars($_POST['quantity']);
}

if (!array_key_exists('state', $_POST) && isset($_POST['sendButton'])) { // recherche si la clé gender existe
    $errorsArray['state'] = 'Veuillez choisir l\'état du produit';
}
if (isset($_POST['state'])) { // recherche donnée input 
    $pductsObj->products_state = htmlspecialchars($_POST['state']);
}

if (isset($_POST['capacity'])) { // recherche donnée input 
    $pductsObj->products_capacity = htmlspecialchars($_POST['capacity']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
}

if (isset($_POST['expiration'])) { // recherche donnée input 
    $pductsObj->products_expiration = htmlspecialchars($_POST['expiration']);
}

if (!array_key_exists('category', $_POST) && isset($_POST['sendButton'])) { // recherche si la clé gender existe
    $errorsArray['category'] = 'Veuillez choisir votre categorie';
}
if (isset($_POST['category'])) { // recherche donnée input 
    $category = htmlspecialchars($_POST['category']);
}

if (!array_key_exists('sbcategory', $_POST) && isset($_POST['sendButton'])) { // recherche si la clé gender existe
    $errorsArray['sbcategory'] = 'Veuillez choisir votre categorie';
}
if (isset($_POST['sbcategory'])) { // recherche donnée input 
    $sbcategory = htmlspecialchars($_POST['sbcategory']);
}




//$usersObj->users_id = $_SESSION['id'];
?>