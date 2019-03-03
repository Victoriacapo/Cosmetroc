<?php

// //Verification pour premier formulaire
// on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];

// on test si le code postal est havrais cad 766
$regexZipCode = '/^766[0-9]{2}$/';


if (isset($_POST['zipCode'])) { // recherche donnée input zipcode
    $zipCode = htmlspecialchars($_POST['zipCode']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs zipcode)
    // on test si regex n'est pas bonne
    if (!preg_match($regexZipCode, $zipCode)) {
        $errorsArray['zipCode'] = 'Vous ne pouvez pas vous inscrire car vous n\'habitez pas au Havre';
    }
    // on test si c'est vide
    if (empty($zipCode)) {
        $errorsArray['zipCode'] = 'Veuillez saisir un code postal';
    }
    // on test si ce n'est pas numerique
    if (!is_numeric($zipCode)) {
        $errorsArray['zipCode'] = 'Veuillez saisir un code postal valide';
    }
}
?>