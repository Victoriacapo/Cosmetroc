<?php
// on déclare un tableau errorsArray qui contiendra les messages d'erreurs
$errorsArray = [];



if (isset($_POST['category'])) { // recherche donnée input 
    $category = htmlspecialchars($_POST['category']);
}
var_dump($_POST['category']);
?>