<?php
//Verification pour Deuxième formulaire.
//on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];

// on test si le pseudo est valide
$regexPseudo = '/^[a-zA-Z0-9_]{3,16}$/';
$regexPwd = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).{6,}$/';

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
} ?>
   