<?php

//appel des modeles
include_once ('../model/modelbdd.php');
include_once ('../model/modelusers.php');

$usersObj = new Users(); //instancie un nouvel objet
//on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];


if (isset($_POST['pseudo'])) { // recherche donnée input 
    $users_pseudo = htmlspecialchars($_POST['pseudo']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
   // on test si c'est vide
    if (empty($users_pseudo)) {
        $errorsArray['pseudo'] = 'Veuillez saisir un pseudo pour continuer';
    }
}

if (isset($_POST['password'])) { // recherche donnée input 
    $password = htmlspecialchars($_POST['password']); // declaration variable qui contient function htmlspe(qui traite données saisie ds le champs )
    // on test si c'est vide
    if (empty($password)) {
        $errorsArray['password'] = 'Veuillez saisir un mot de passe pour continuer';
    }
}

//verification du password
if (isset($_POST['sendButton']) && (count($errorsArray) == 0)) {
    $usersInfo = $usersObj->checkUsers($users_pseudo);
  
   
    if (is_object($usersInfo)) {
        if (password_verify($password, $usersInfo->users_password)) {
            $_SESSION['id'] = $usersInfo->users_id;
            $_SESSION['gender'] = $usersInfo->users_gender;
            $_SESSION['lastname'] = $usersInfo->users_lastname;
            $_SESSION['firstname'] = $usersInfo->users_firstname;
            $_SESSION['address'] = $usersInfo->users_address;
            $_SESSION['zipcode'] = $usersInfo->users_CP;
            $_SESSION['email'] = $usersInfo->users_email;
            $_SESSION['phone'] = $usersInfo->users_phone;
            $_SESSION['pseudo'] = $usersInfo->users_pseudo;
         header('location:../espacetroc.php');
         exit;
        } else{
            echo 'Mot de passe incorrect';
        }
    } else{
        echo 'Identifiant incorrect';
    }
}



?>
  