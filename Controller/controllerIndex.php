<?php

//appel des modeles
include_once ('model/modelbdd.php');
include_once ('model/modelProducts.php');

//on instancie un nouvel objet Products
$navbarElementsObj = new Products();

// sinon par défaut lorsque l'on est sur la page d'accueil tous les articles publiés seront affichés
// par la méthode AllProductsValidate
$ArrayProductNavbar = $navbarElementsObj->AllProductsValidate();


//Si le maincat_id est récupéré seul dans l'URL via le GET, appliqué la méthode pour afficher les produits en fonction du maincat_id qui représente la catégorie. (les produits sont donc affichés par catégorie)
if (isset($_GET['maincat_id']) && !isset($_GET['subcat_id'])){
    $maincat_id = htmlspecialchars($_GET['maincat_id']);
    $ArrayProductNavbar = $navbarElementsObj->navbarJustMaincat($maincat_id);
}

//je récupère les deux id categories et sous catégories dans l'url via le Get
//// pour afficher les articles par catégorie (dans la navbar)
if (isset($_GET['maincat_id']) && (isset($_GET['subcat_id']))) {
    $maincat_id = htmlspecialchars($_GET['maincat_id']);
    $subcat_id = htmlspecialchars($_GET['subcat_id']);
    //j'applique la méthode navbar()
    $ArrayProductNavbar = $navbarElementsObj->navbar($maincat_id, $subcat_id);
}

if (isset($_POST['ok'])) {// A l'action du bouton ok, hydrater l'objet de l'attribut search avec la valeur du champ search
    $navbarElementsObj->search = $_POST['search'];

    //applique la méthode lié à la recherche et affiche le résultat dans la vue en l'appliquant sur $ArrayProductNavbar, sur la même variable qui filtre et affiche les produits
    $ArrayProductNavbar = $navbarElementsObj->searchProducts();
}

if (isset($_SESSION['idUser'])) { //récupère l'idUser de la session en cours
    $navbarElementsObj->users_id = $_SESSION['idUser']; //indique que l'objet users_id correspond à l'idUser de la session
    
    
    //Méthode permettant de vérifier que l'utilisateur à insérer un article sur le site.
    //La méthode compte le nombre d'entrée dans la table produit en fonction de l'idUser récupéré par la variable de session en cours.
    /*Donc $productsTableFill retourne 0 si la table ne comprends aucune entrée de produit. 
     *Sinon $productsTableFill retourne le nombre d'entrée.
     */
    $productsTableFill = $navbarElementsObj->checkAddProduct();
   }

?>
  