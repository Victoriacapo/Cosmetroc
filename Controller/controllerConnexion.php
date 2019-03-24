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
            $_SESSION['idUser'] = $usersInfo->users_id;
            $_SESSION['gender'] = $usersInfo->users_gender;
            $_SESSION['lastname'] = $usersInfo->users_lastname;
            $_SESSION['firstname'] = $usersInfo->users_firstname;
            $_SESSION['address'] = $usersInfo->users_address;
            $_SESSION['zipcode'] = $usersInfo->users_CP;
            $_SESSION['email'] = $usersInfo->users_email;
            $_SESSION['phone'] = $usersInfo->users_phone;
            $_SESSION['pseudo'] = $usersInfo->users_pseudo;
         header('location:../espacetroc.php'); //si l'user est authentifié, lié les variables de session aux objets, puis redirigé vers espacetroc
         exit;
        } else{ //permet les spans error dans la vue
            $errorsArray['password']= 'Mot de passe incorrect'; //renseigne l'utilisateur que le mot de passe saisie ne correspond pas à celui présent ds la Bdd
        }
    } else{
        $errorsArray['pseudo'] = 'Identifiant incorrect'; //renseigne l'utilisateur que le pseuso saisie ne correspond pas à celui présent ds la Bdd
    }
}



?>
  