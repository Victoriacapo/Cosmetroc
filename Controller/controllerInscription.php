<?php

//appel des modeles
include_once ('../model/modelbdd.php'); //utillisé uniquement de l'include once sinon le model est rappelé plusieurs fois ce qui crée un conflit
include_once ('../model/modelusers.php');

$usersObj = new Users(); //instancie un nouvel objet
$showForm = true; //booléen qui renvoie true/false pr soit cacher/afficher mn form

// on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];

// Mise en place des regex
$regexPseudo = '/^[a-zA-ZÄ-ÿ0-9_\.-]{3,16}$/';
$regexPwd = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/';
$regexMail = '/^[a-z0-9.-]+@[a-z0-9.-]+.[a-z]{2,6}$/';


if (!array_key_exists('gender', $_POST) && isset($_POST['sendButton'])) { // recherche si la clé gender existe
    $errorsArray['gender'] = 'Veuillez choisir votre civilité';
}

if (isset($_POST['gender'])) { // recherche donnée input 
    $usersObj->users_gender = htmlspecialchars($_POST['gender']);
}

if (isset($_POST['pseudo'])) { // recherche donnée input 
    $usersObj->users_pseudo = htmlspecialchars($_POST['pseudo']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
     // on applique la regex
    if (!preg_match($regexPseudo, $usersObj->users_pseudo)) {//le preg_match permet de tester la regex sur ma variable pseudo
        $errorsArray['pseudo'] = 'Veuillez inscrire un pseudo conforme. Exemple: John45 / John / John-45/ jhon_45';
    }
    // on test si c'est vide
    if (empty($usersObj->users_pseudo)) {
        $errorsArray['pseudo'] = 'Veuillez saisir un pseudo pour continuer';
    }
}

if (isset($_POST['password'])) { // recherche donnée input 
     // on applique la regex
    if (!preg_match($regexPwd, $_POST['password'])) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['password'] = 'Veuillez inscrire un mot de passe conforme. Il doit contenir 6 caractères minimum, comprenant 1 majuscule et 1 miniscule et un caractère spécial';
    }
    // on test si c'est vide
    if (empty($_POST['password'])) {
        $errorsArray['password'] = 'Veuillez saisir un mot de passe pour continuer';
    }
}

if (isset($_POST['email'])) { // recherche donnée input pseudo
    $usersObj->users_email = htmlspecialchars($_POST['email']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
     // on applique la regex
    if (!preg_match($regexMail, $usersObj->users_email)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['email'] = 'Veuillez inscrire un email conforme. L\'adresse email doit être saisie en minuscule. Exemple: johndoe@domaine.com';
    }
    // on test si c'est vide
    if (empty($usersObj->users_email)) {
        $errorsArray['email'] = 'Veuillez saisir un email pour continuer';
    }
}

if (isset($_POST['sendButton']) && (count($errorsArray) == 0)) {
    $usersObj->users_password = password_hash($_POST['password'], PASSWORD_DEFAULT); // password_hash permet de sécuriser, le mot de passe en l'entrant ds la Bdd sous forme d'une longue chaîne
    $usersObj->addUser(); // execute ma requete presente dans mon modelusers et ajoute un utilisateur ds la Bdd
    $showForm = false; // ma variable return false donc cache mon formulaire remplie.
}
?>