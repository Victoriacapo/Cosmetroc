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
$showSbcat = $sbcategObj->ok(); //permet d'effectuer ma requête pr afficher les ss-catégories

$showSbcat->maincat_id = $showMncat->maincat_id;

// on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];


// Verification des inputs.
if (!array_key_exists('state', 'category', $_POST) && isset($_POST['sendButton'])) { // recherche si la clé gender existe
    $errorsArray['gender'] = 'Veuillez choisir votre civilité';
    $errorsArray['category'] = 'Veuillez choisir votre category';
}
if (isset($_POST['category'])) { // recherche donnée input 
    $usersObj->users_gender = htmlspecialchars($_POST['gender']);
}

 //$usersObj->users_id = $_SESSION['id'];
?>