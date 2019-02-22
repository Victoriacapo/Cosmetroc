<?php

include_once ('../model/modelbdd.php');
include_once ('../model/modelusers.php');
include_once ('../model/modelCategory.php');
include_once ('../model/modelSubCategory.php');
include_once ('../model/modelProducts.php');


//instancie un nouvel objet
$categObj = new Category(); //categorie
$sbcategObj = new SubCategory(); //ss-categorie
$OnepductsObj = new Products(); // article



if (isset($_GET['idProducts'])) { //recupere l'id, verifie si présent ds la base de donnée, et effectue la requête
    $OnepductsObj->products_id = $_GET['idProducts']; //on indique que l'objet products_id correspond au Get['idProduct']
    $filePdt = $OnepductsObj->profilProducts(); //correspond à la requête pr afficher la fiche propre à un produit
    $_SESSION['idProduct'] = $_GET['idProducts'];
    $_SESSION['imageProduct'] = $filePdt->products_img;

    var_dump($_SESSION);

    if ($OnepductsObj === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}


$showMncat = $categObj->showCat(); //permet d'effectuer ma requête pr afficher les catégories
$showSbcat = $sbcategObj->showSubCat(); //permet d'effectuer ma requête pr afficher les ss-catégories
//tableau d'erreur
$errorsArray = [];
$errorImage = []; //array contenant erreur lié au vérification de l'image.
$succesArray = [];
$regexName = '/[a-zA-Z0-9 -]+$/'; //autorise les minuscules, majuscules, les chiffres, les espaces, les traits d'union
// Verification des inputs.
if (isset($_POST['nameproduct'])) { // recherche donnée input 
    $nameproduct = htmlspecialchars($_POST['nameproduct']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    $_SESSION['nameproduct'] = $nameproduct;
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $nameproduct)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['nameproduct'] = 'Veuillez inscrire un nom de produit conforme';
    }
    // on test si c'est vide
    if (empty($nameproduct)) {
        $errorsArray['nameproduct'] = 'Veuillez saisir un nom de produit pour continuer';
    }
}

if (isset($_POST['brand'])) { // recherche donnée input 
    $brand = htmlspecialchars($_POST['brand']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $brand)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['brand'] = 'Veuillez inscrire une marque conforme';
    }
    // on test si c'est vide
    if (empty($brand)) {
        $errorsArray['brand'] = 'Veuillez saisir une marque pour continuer';
    }
}

if (isset($_POST['quantity'])) { // recherche donnée input 
    $quantity = htmlspecialchars($_POST['quantity']);
}

if (!array_key_exists('state', $_POST) && isset($_POST['sendButton'])) {
    $errorsArray['state'] = 'Veuillez choisir l\'état du produit';
}
if (isset($_POST['state'])) { // recherche donnée input 
    $state = htmlspecialchars($_POST['state']);
}

if (isset($_POST['capacity'])) { // recherche donnée input 
    $capacity = htmlspecialchars($_POST['capacity']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
}

if (isset($_POST['expiration'])) { // recherche donnée input 
    $expiration = htmlspecialchars($_POST['expiration']);
}

if (!array_key_exists('category', $_POST) && isset($_POST['sendButton'])) {
    $errorsArray['category'] = 'Veuillez choisir votre categorie';
}
if (isset($_POST['category'])) { // recherche donnée input 
    $category = htmlspecialchars($_POST['category']);
}

if (!array_key_exists('sbcategory', $_POST) && isset($_POST['sendButton'])) {
    $errorsArray['sbcategory'] = 'Veuillez choisir votre categorie';
}
if (isset($_POST['sbcategory'])) { // recherche donnée input 
    $sbcategory = htmlspecialchars($_POST['sbcategory']);
}

if (!array_key_exists('image', $_FILES) && isset($_POST['sendButton'])) {
    $errorsArray['image'] = 'Veuillez entrer une image';
}


if (isset($_FILES['image']) && ($_FILES['image']['error']) != 4) {

    $target_dir = '../assets/imgProducts/';
    //spécifie le chemin du fichier à être chargé 
    $target_file = $target_dir . basename($_FILES['image']['name']);
    //spécifie l'extension du fichier 
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

// Vérifie le poids du fichier 
    if ($_FILES['image']['size'] > 2000000) {
        $errorImage['image'] = 'L\'image ne doit pas dépasser 2Mo';
    }

// Vérifie si le nom du fichier existe déjà dans la bdd 
    if (file_exists($target_file)) {
        $errorImage['image'] = 'Le fichier existe déjà';
    }

    $arrayValidFormat = ['jpg', 'png', 'jpeg', 'bmp']; // Prise en compte de certains formats de fichiers 
    //création d'un tableau et si dans ce tableau on compare le fichier à uploadé et les formats autorisés 
    if (!in_array($imageFileType, $arrayValidFormat)) {
        $errorImage['image']['format'] = 'Le format du fichier n\'est pas autorise.(jpg, jpeg, png ou bmp) ';
    }

    if ((count($errorImage) == 0) && (count($errorsArray) == 0)) {
        unlink($_SESSION['imageProduct']);
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../assets/imgProducts/' . $_FILES['image']['name'])) {

            $succesArray['image'] = 'le fichier ' . basename($_FILES['image']['name']) . ' a été chargé. ';
        } else {
            $errorImage['image'] = 'désolé, il y a une erreur de chargement de fichier.';
        }
    }
}



if (isset($_POST['sendButton']) && (count($errorsArray) == 0) && (count($errorImage) == 0)) {
    if (($_FILES['image']['error']) == 4) {
        $OnepductsObj->products_img = $_SESSION['imageProduct'];
    } else {
        $OnepductsObj->products_img = '../assets/imgProducts/' . $_FILES['image']['name'];
    }
    $OnepductsObj->products_id = $_SESSION['idProduct'];
    $OnepductsObj->products_name = $nameproduct;
    $OnepductsObj->products_brand = $brand;
    $OnepductsObj->products_quantity = $quantity;
    $OnepductsObj->products_state = $state;
    $OnepductsObj->products_capacity = $capacity;
    $OnepductsObj->products_expiration = $expiration;
    $OnepductsObj->maincat_id = $category;
    $OnepductsObj->subcat_id = $sbcategory;


    $OnepductsObj->editProduct();
    $OnepductsObj->profilProducts();

//    $pductsObj->products_img = '../assets/imgProducts/' . $_FILES['image']['name']; //j'indique que mon objet correpond au chemin de l'image uploadé.
//    $pductsObj->addProducts(); // execute ma requete presente dans mon model
//    $date = $pductsObj->products_expiration;  //variable qui seras utilisé dans la vue pr formater l'objet expiration en date française.
//    $showForm = false; // ma variable return false donc cache mon formulaire remplie.
    //$profil = $profilObj->UserProfil();
    //$rdvParPatient = $RDVObj->RDVbyID();
}