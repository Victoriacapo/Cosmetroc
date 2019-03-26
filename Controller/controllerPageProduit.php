<?php
//appel des modeles
include_once ('../model/modelbdd.php');
include_once ('../model/modelusers.php');
include_once ('../model/modelProducts.php');

//instancie un nouvel objet
$showPdtsUserObj = new Products(); // article
$pseudoUserObj = new Users();

if (isset($_GET['idUserProductsList'])) { //recupere l'id
    $showPdtsUserObj->users_id = $_GET['idUserProductsList'];
    $pseudoUserObj->users_id = $_GET['idUserProductsList'];
    
    $productsUserList = $showPdtsUserObj->AllProductsUser(); //Méthode affichant tout les produits validés d'un utilisateur.
   $pseudoUser = $pseudoUserObj->UserInfosPageProducts(); //Méthode affichant les infos d'un tilisateur en fonction de l'idUserProductsList.
  
   
    if ($productsUserList === FALSE) {
        $ifIdexist = FALSE;
    } else {
        $ifIdexist = TRUE;
    }
}





?>
   