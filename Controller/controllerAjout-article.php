<?php

//appel des modeles
include_once ('../model/modelbdd.php');
include_once ('../model/modelusers.php');
include_once ('../model/modelCategory.php');
include_once ('../model/modelSubCategory.php');
include_once ('../model/modelProducts.php');

//instancie un nouvel objet
$categObj = new Category(); //categorie
$sbcategObj = new SubCategory(); //ss-categorie
$pductsObj = new Products(); // article
$profilUserObj = new Users(); //utilisateur. Cette objet me permettras d'appliquer la vérification que le form profil ait bien été complété


$showForm = true; //booléen qui renvoie true/false pr soit afficher/cacher mn form

if (isset($_SESSION['idUser'])) { //récupère l'idUser de la session en cours
    $pductsObj->users_id = $_SESSION['idUser']; //indique que l'objet users_id correspond à l'idUser de la session
    $profilUserObj->users_id = $_SESSION['idUser'];

    $addArticleOk = $profilUserObj->checkProfilFill(); //effectue la méthode permettant de vérifier que l'utilisateur ait bien complété son profil
    /* La requête compte le nombre de colonne de la table velo_users
     * en fonction de l'idUser et que les colonnes cités soit complété (donc ont une valeur)
     * fetchColumn(), récupère la 1ère ligne des colonnes de la bdd si la condition WHERE  et les AND sont remplies.
     * Si les condition WHERE et AND ne sont pas remplie, me renvoie 0 ligne des colonnes, le cas contraire me renvoie la 1ere ligne des colonnes.
     * Donc $addArticleOk retourne soit 0 ou 1. 
     * 0 profil non complet
     * 1 profil complet 
     */


    if ($pductsObj === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}

$showMncat = $categObj->showCat(); //permet d'effectuer ma requête pr afficher les catégories
$showSbcat = $sbcategObj->showSubCat(); //permet d'effectuer ma requête pr afficher les ss-catégories

// on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];
$errorImage = []; //array contenant erreur lié au vérification de l'image.
$succesArray = []; //tableau de message de succès d'une action donnée, ici de l'upload de l'image

//Regex
$regexName = '/[a-zA-Z0-9 -]+$/'; //autorise les minuscules, majuscules, les chiffres, les espaces, les traits d'union

// Verification des inputs.
if (isset($_POST['nameproduct'])) { // recherche donnée input 
    $pductsObj->products_name = htmlspecialchars($_POST['nameproduct']); //declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $pductsObj->products_name)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['nameproduct'] = 'Veuillez inscrire un nom de produit conforme';
    }
    // on test si c'est vide
    if (empty($pductsObj->products_name)) {
        $errorsArray['nameproduct'] = 'Veuillez saisir un nom de produit pour continuer';
    }
}

if (isset($_POST['brand'])) { //recherche donnée input 
    $pductsObj->products_brand = htmlspecialchars($_POST['brand']); //declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $pductsObj->products_brand)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['brand'] = 'Veuillez inscrire une marque conforme';
    }
    // on test si c'est vide
    if (empty($pductsObj->products_brand)) {
        $errorsArray['brand'] = 'Veuillez saisir une marque pour continuer';
    }
}

if (isset($_POST['quantity'])) { //recherche donnée input 
    $pductsObj->products_quantity = htmlspecialchars($_POST['quantity']);
}

if (!array_key_exists('state', $_POST) && isset($_POST['sendButton'])) {
    $errorsArray['state'] = 'Veuillez choisir l\'état du produit';
}
if (isset($_POST['state'])) { //recherche donnée input 
    $pductsObj->products_state = htmlspecialchars($_POST['state']);
}

if (isset($_POST['capacity'])) { //recherche donnée input 
    $pductsObj->products_capacity = htmlspecialchars($_POST['capacity']); //declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
}

if (isset($_POST['expiration'])) { //recherche donnée input 
    $pductsObj->products_expiration = htmlspecialchars($_POST['expiration']);
}

if (!array_key_exists('category', $_POST) && isset($_POST['sendButton'])) {
    $errorsArray['category'] = 'Veuillez choisir votre categorie';
}
if (isset($_POST['category'])) { //recherche donnée input 
    $pductsObj->maincat_id = htmlspecialchars($_POST['category']);
}

if (!array_key_exists('sbcategory', $_POST) && isset($_POST['sendButton'])) {
    $errorsArray['sbcategory'] = 'Veuillez choisir votre categorie';
}
if (isset($_POST['sbcategory'])) { //recherche donnée input 
    $pductsObj->subcat_id = htmlspecialchars($_POST['sbcategory']);
}

if (!array_key_exists('image', $_FILES) && isset($_POST['sendButton'])) {
    $errorsArray['image'] = 'Veuillez entrer une image';
}
if (isset($_FILES['image'])) {

    $target_dir = '../assets/imgProducts/';
    //spécifie le chemin du fichier à être chargé 
    $target_file = $target_dir . basename($_FILES['image']['name']);
    //spécifie l'extension du fichier 
    $imageFileType = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

//Vérifie le poids du fichier 
    if ($_FILES['image']['size'] > 2000000) {
        $errorImage['image'] = 'L\'image ne doit pas dépasser 2Mo';
    }

//Vérifie si le nom du fichier existe déjà dans le dossier local attribué
    if (file_exists($target_file)) {
        $errorImage['image'] = 'Le fichier existe déjà';
    }

    $arrayValidFormat = ['jpg', 'png', 'jpeg', 'bmp']; // Prise en compte de certains formats de fichiers 
    //création d'un tableau qui permet de comparer les formats autorisés avec celui de l’upload. 
    if (!in_array($imageFileType, $arrayValidFormat)) {
        $errorImage['image']['format'] = 'Le format du fichier n\'est pas autorise.(jpg, jpeg, png ou bmp) ';
    }
//Si non présence d'erreur dans les vérifications du formulaire et lié à l’upload de l’image, 
    if ((count($errorImage) == 0) && (count($errorsArray) == 0)) {
        //S’assure que le fichier est récupéré par un post , puis le déplace grâce au chemin indiqué.
        if (move_uploaded_file($_FILES['image']['tmp_name'], '../assets/imgProducts/' . $_FILES['image']['name'])) {

            $succesArray['image'] = 'le fichier ' . basename($_FILES['image']['name']) . ' a été chargé. ';
        } else {
            $errorImage['image'] = 'désolé, il y a une erreur de chargement de fichier.';
        }
    }
}



if (isset($_POST['sendButton']) && (count($errorsArray) == 0) && (count($errorImage) == 0)) {
    $pductsObj->products_img = '../assets/imgProducts/' . $_FILES['image']['name']; //j'indique que mon objet correpond au chemin de l'image uploadé.
    $pductsObj->products_validate = false; //J'indique que ma booléenne a comme valeur false tant qu'il n'est pas validé par l'admin 
    $pductsObj->addProducts(); //execute ma requete qui permet d’ajouter un produit.
    $showForm = false; //ma variable retourne false donc cache mon formulaire remplie.
}
?>