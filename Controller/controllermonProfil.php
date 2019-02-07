<?php
// // Verification pour Deuxième formulaire.
// on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];

// on test si le pseudo est valide
$regexlastname = "/^([a-zÀ-ÿ]+(( |')[a-zÀ-ÿ]+)*)+([-]([a-zÀ-ÿ]+(( |')[a-zÀ-ÿ]+)*)+)*$/";
$regexfirstname = "/^([a-z]+(( |')[a-z]+)*)+([-]([a-z]+(( |')[a-z]+)*)+)*$/";
$regexemail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';
$regexadress = "/^([a-z]+(( |')[a-z]+)*)+([-]([a-z]+(( |')[a-z]+)*)+)*$/";
$regexzipcode = '/^766[0-9]{2}$/';
$regexphonenumber='/(0|\\+33|0033)[1-9][0-9]{8}/';
$regexPseudo = '/^[a-zA-Z0-9_]{3,16}$/';


if (!array_key_exists('gender', $_POST) && isset($_POST['sendButton'])) { // recherche si la clé gender existe
   $errorsArray['gender'] = 'Veuillez choisir votre civilité';
}
if (isset($_POST['gender'])) { // recherche donnée input 
    $gender = htmlspecialchars($_POST['gender']);
}
if (isset($_POST['lastname'])) { // recherche donnée input pseudo
    $lastname = htmlspecialchars($_POST['lastname']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexlastname, $lastname)) {//le preg_match permet de tester la regex sur ma variable pseudo
        $errorsArray['lastname'] = 'Veuillez inscrire un nom conforme';
        $_SESSION['lastname'];//exemple
    }
    // on test si c'est vide
    if (empty($lastname)) {
        $errorsArray['lastname'] = 'Veuillez saisir un nom pour continuer';
    }
}
if (isset($_POST['firstname'])) { // recherche donnée input pseudo
    $firstname = htmlspecialchars($_POST['firstname']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexfirstname, $firstname)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['firstname'] = 'Veuillez inscrire un prénom conforme';
    }
    // on test si c'est vide
    if (empty($firstname)) {
        $errorsArray['firstname'] = 'Veuillez saisir un prénom pour continuer';
    }
}
if (isset($_POST['email'])) { // recherche donnée input pseudo
    $email = htmlspecialchars($_POST['email']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexemail, $email)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['email'] = 'Veuillez inscrire un email conforme';
    }
    // on test si c'est vide
    if (empty($email)) {
        $errorsArray['email'] = 'Veuillez saisir un email pour continuer';
    }
}
if (isset($_POST['adress'])) { // recherche donnée input pseudo
    $adress = htmlspecialchars($_POST['adress']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexadress, $adress)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['adress'] = 'Veuillez inscrire une adresse conforme';
    }
    // on test si c'est vide
    if (empty($adress)) {
        $errorsArray['adress'] = 'Veuillez saisir une adresse pour continuer';
    }
}
if (isset($_POST['zipcode'])) { // recherche donnée input pseudo
    $zipcode = htmlspecialchars($_POST['zipcode']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexzipcode, $zipcode)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['zipcode'] = 'Veuillez inscrire un code postal conforme';
    }
    // on test si c'est vide
    if (empty($zipcode)) {
        $errorsArray['zipcode'] = 'Veuillez saisir un code postal pour continuer';
    }
}
if (isset($_POST['phonenumber'])) { // recherche donnée input pseudo
    $phonenumber = htmlspecialchars($_POST['phonenumber']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexphonenumber, $phonenumber)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['phonenumber'] = 'Veuillez inscrire un numéro de téléphone conforme';
    }
    // on test si c'est vide
    if (empty($phonenumber)) {
        $errorsArray['phonenumber'] = 'Veuillez saisir un numéro de téléphone pour continuer';
    }
}
    if (isset($_POST['pseudo'])) { // recherche donnée input pseudo
    $pseudo = htmlspecialchars($_POST['pseudo']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexPseudo, $pseudo)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['pseudo'] = 'Veuillez inscrire un pseudo conforme';
    }
    // on test si c'est vide
    if (empty($pseudo)) {
        $errorsArray['pseudo'] = 'Veuillez saisir un pseudo pour continuer';
    }
}
?>