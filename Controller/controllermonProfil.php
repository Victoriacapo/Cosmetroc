<?php

//appel des modeles
include_once ('../model/modelbdd.php');
include_once ('../model/modelusers.php');


$profilObj = new Users(); //instancie un nouvel objet
$showForm = true; //booléen qui renvoie true/false pr soit cacher/afficher mn form


if (isset($_SESSION['idUser'])) { //recupere l'id, verifie si présent ds la base de donnée, et effectue la requête
    $profilObj->users_id = $_SESSION['idUser'];
    $profil = $profilObj->UserProfil();
    if ($profil === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}

// on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];

// on test si le pseudo est valide
$regexName = '/^[a-zA-ZÄ-ÿ-]+$/';
$regexMail = '/^[a-z0-9.-]+@[a-z0-9.-]+.[a-z]{2,6}$/';
$regexzipcode = '/^766[0-9]{2}$/';
$regexphonenumber = '/(0|\\+33|0033)[1-9][0-9]{8}/';
$regexPseudo = '/^[a-zA-Z0-9_]{3,16}$/';


if (!array_key_exists('gender', $_POST) && isset($_POST['sendButton'])) { // recherche si la clé gender existe
    $errorsArray['gender'] = 'Veuillez choisir votre civilité';
}
if (isset($_POST['gender'])) { // recherche donnée input 
    $profilObj->users_gender = htmlspecialchars($_POST['gender']);
}
if (isset($_POST['lastname'])) { // recherche donnée input pseudo
    $profilObj->users_lastname = htmlspecialchars($_POST['lastname']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $profilObj->users_lastname)) {//le preg_match permet de tester la regex sur ma variable pseudo
        $errorsArray['lastname'] = 'Veuillez inscrire un nom conforme';
    }
    // on test si c'est vide
    if (empty($profilObj->users_lastname)) {
        $errorsArray['lastname'] = 'Veuillez saisir un nom pour continuer';
    }
}
if (isset($_POST['firstname'])) { // recherche donnée input pseudo
    $profilObj->users_firstname = htmlspecialchars($_POST['firstname']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexName, $profilObj->users_firstname)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['firstname'] = 'Veuillez inscrire un prénom conforme';
    }
    // on test si c'est vide
    if (empty($profilObj->users_firstname)) {
        $errorsArray['firstname'] = 'Veuillez saisir un prénom pour continuer';
    }
}
if (isset($_POST['email'])) { // recherche donnée input pseudo
    $profilObj->users_email = htmlspecialchars($_POST['email']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexMail, $profilObj->users_email)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['email'] = 'Veuillez inscrire un email conforme';
    }
    // on test si c'est vide
    if (empty($profilObj->users_email)) {
        $errorsArray['email'] = 'Veuillez saisir un email pour continuer';
    }
}
if (isset($_POST['address'])) { // recherche donnée input pseudo
    $profilObj->users_address = htmlspecialchars($_POST['address']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si c'est vide
    if (empty($profilObj->users_address)) {
        $errorsArray['address'] = 'Veuillez saisir une adresse pour continuer';
    }
}
if (isset($_POST['city'])) { // recherche donnée input pseudo
    $profilObj->users_city = htmlspecialchars($_POST['city']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si c'est vide
    if (empty($profilObj->users_city)) {
        $errorsArray['city'] = 'Veuillez saisir une adresse pour continuer';
    }
}
if (isset($_POST['zipcode'])) { // recherche donnée input pseudo
    $profilObj->users_CP = htmlspecialchars($_POST['zipcode']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexzipcode, $profilObj->users_CP)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['zipcode'] = 'Veuillez inscrire un code postal conforme';
    }
    // on test si c'est vide
    if (empty($profilObj->users_CP)) {
        $errorsArray['zipcode'] = 'Veuillez saisir un code postal pour continuer';
    }
}
if (isset($_POST['phone'])) { // recherche donnée input pseudo
    $profilObj->users_phone = htmlspecialchars($_POST['phone']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexphonenumber, $profilObj->users_phone)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['phone'] = 'Veuillez inscrire un numéro de téléphone conforme';
    }
    // on test si c'est vide
    if (empty($profilObj->users_phone)) {
        $errorsArray['phone'] = 'Veuillez saisir un numéro de téléphone pour continuer';
    }
}
if (isset($_POST['pseudo'])) { // recherche donnée input pseudo
    $profilObj->users_pseudo = htmlspecialchars($_POST['pseudo']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexPseudo, $profilObj->users_pseudo)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['pseudo'] = 'Veuillez inscrire un pseudo conforme';
    }
    // on test si c'est vide
    if (empty($profilObj->users_pseudo)) {
        $errorsArray['pseudo'] = 'Veuillez saisir un pseudo pour continuer';
    }
}


//a l'appui sur le bouton modif, verifie les erreurs, effectue la requête
if (isset($_POST['sendButton']) && (count($errorsArray) == 0)) {

    $profilObj->modifyUser(); // execute ma requete presente dans mon modelpatient
    $profil = $profilObj->UserProfil();
    $showForm = false; // ma variable return false donc cache mon formulaire remplie.

    $_SESSION['idUser'] = $profilObj->users_id;
    $_SESSION['gender'] = $profilObj->users_gender;
    $_SESSION['lastname'] = $profilObj->users_lastname;
    $_SESSION['firstname'] = $profilObj->users_firstname;
    $_SESSION['address'] = $profilObj->users_address;
    $_SESSION['city'] = $profilObj->users_city;
    $_SESSION['zipcode'] = $profilObj->users_CP;
    $_SESSION['email'] = $profilObj->users_email;
    $_SESSION['phone'] = $profilObj->users_phone;
    $_SESSION['pseudo'] = $profilObj->users_pseudo;

   
}
?>