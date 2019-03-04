<?php

//appel des modeles
include_once ('model/modelbdd.php');
include_once ('model/modelProducts.php');

//on instancie un nouvel objet Products
$navbarElementsObj = new Products();

//je récupère les deux id categories et sous catégories dans l'url via le Get
//// pour afficher les articles par catégorie (dans la navbar)

if (isset($_GET['maincat_id']) && ($_GET['subcat_id'])) {
    $maincat_id = $_GET['maincat_id'];
    $subcat_id = $_GET['subcat_id'];

    //j'applique la méthode navbar()
    $ArrayProductNavbar = $navbarElementsObj->navbar($maincat_id, $subcat_id);
} else {
    // sinon par défaut lorsque l'on est sur la page d'accueil tous les articles publiés seront affichés
    // par la méthode AllProducts
    $ArrayProductNavbar = $navbarElementsObj->AllProducts();
}

if (isset($_POST['ok'])) {// A l'action du bouton ok, hydrater l'objet de l'attribut search avec la valeur du champ search
    $navbarElementsObj->search = $_POST['search'];
    
    //applique la méthode lié à la recherche et affiche le résultat dans la vue en l'appliquant sur $ArrayProductNavbar, sur la même variable qui filtre et affiche les produits
    $ArrayProductNavbar = $navbarElementsObj->searchProducts();
} 
?>
  