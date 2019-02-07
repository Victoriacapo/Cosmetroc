<?php

// // Verification pour Deuxième formulaire.
// on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];

// on test si le pseudo est valide
$regexPseudo = '/^[a-zA-Z0-9_]{3,16}$/';
$regexPwd = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/';
$regexEmail = '/^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/';

if (!array_key_exists('gender', $_POST) && isset($_POST['sendButton'])) { // recherche si la clé gender existe
    $errorsArray['gender'] = 'Veuillez choisir votre civilité';
}

if (isset($_POST['gender'])) { // recherche donnée input 
    $gender = htmlspecialchars($_POST['gender']);
}

if (isset($_POST['pseudo'])) { // recherche donnée input 
    $pseudo = htmlspecialchars($_POST['pseudo']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexPseudo, $pseudo)) {//le preg_match permet de tester la regex sur ma variable pseudo
        $errorsArray['pseudo'] = 'Veuillez inscrire un pseudo conforme';
    }
    // on test si c'est vide
    if (empty($pseudo)) {
        $errorsArray['pseudo'] = 'Veuillez saisir un pseudo pour continuer';
    }
}

if (isset($_POST['password'])) { // recherche donnée input 
    $password = htmlspecialchars($_POST['password']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexPwd, $password)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['password'] = 'Veuillez inscrire un mot de passe conforme';
    }
    // on test si c'est vide
    if (empty($password)) {
        $errorsArray['password'] = 'Veuillez saisir un mot de passe pour continuer';
    }
}
if (isset($_POST['email'])) { // recherche donnée input pseudo
    $email = htmlspecialchars($_POST['email']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si regex n'est pas bonne
    if (!preg_match($regexEmail, $email)) {//le preg_match permet de tester la regex sur ma variable 
        $errorsArray['email'] = 'Veuillez inscrire un email conforme';
    }
    // on test si c'est vide
    if (empty($email)) {
        $errorsArray['email'] = 'Veuillez saisir un email pour continuer';
    }
}
?>