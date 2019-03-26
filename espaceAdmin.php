<?php
session_start();

if (empty($_SESSION)) { //
    header('location: index.php');
    exit;
}
// appel du controller controllerAjout-article
include_once('Controller/controllerEspaceAdmin.php');

//Vérifie que l'utilisateur est bien un administrateur
if ($profilCheck->users_authorised == 1) {
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        require('View/link/header.php');
        ?>
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/style1.css">
        <title>Espace Admin</title>
    </head>
    <body>
        <header>
            <div class="container-fluid headDiv">
                <div class="row">
                    <div class="col">
                        <a href="index.php"><img class="img-fluid" id="logo" src="../assets/img/Cosmétroc.png" alt="Cosmétroc"></a>
                    </div>
                    <div class="col">
                        <button id="buttonForm" class="btn btn-raised btn-primary btnDivers" onclick="(window.location = 'View/deconnexion.php')"><i class="fas fa-sign-out-alt"></i>Deconnexion</button>
                        <button id="buttonForm" class="btn btn-raised btn-primary btnDivers" onclick="(window.location = 'espacetroc.php')"><i class="fas fa-user-tie"></i><?= $_SESSION['pseudo'] ?></button>
                    </div>
                </div>
            </div>
            <!-- Nav -->       
            <?php
            require('View/navbar.php');
            ?>
            <!-- /Nav -->
        </header>

        <div class="container-fluid">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                UTILISATEURS
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-bordered table-dark">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th scope="col">#</th>
                                            <th scope="col">Pseudo</th>
                                            <th scope="col">Civilité</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Ville</th>
                                            <th scope="col">CP</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Teléphone</th>
                                            <th scope="col">Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($TotalListUser as $totalUsers) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $totalUsers->users_id ?></th>
                                                <td><?= $totalUsers->users_pseudo ?></td>
                                                <td><?= $totalUsers->users_gender ?></td>
                                                <td><?= $totalUsers->users_lastname ?></td>
                                                <td><?= $totalUsers->users_firstname ?></td>
                                                <td><?= $totalUsers->users_address ?></td>
                                                <td><?= $totalUsers->users_city ?></td>
                                                <td><?= $totalUsers->users_CP ?></td>
                                                <td><?= $totalUsers->users_email ?></td>
                                                <td><?= $totalUsers->users_phone ?></td>
                                                <td>
                                                    <!--bouton du modal pour confirmation suppression-->
                                                    <button type="button" for="delete" class="btn btn-raised btn-danger" data-toggle="modal" data-target="#UserDelete<?= $totalUsers->users_id ?>">
                                                        X
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal pour la suppression de l'article -->
                                        <div class="modal fade" id="UserDelete<?= $totalUsers->users_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation validation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <ul class="list-group products">
                                                            <p>Voulez vous supprimer L'utilisateur n°<?= $totalUsers->users_id ?></p>
                                                            <li class="list-group-item active">Civilité: <?= $totalUsers->users_gender ?></li>
                                                            <li class="list-group-item">Nom: <?= $totalUsers->users_lastname ?></p>
                                                            <li class="list-group-item">Prénom: <?= $totalUsers->users_firstname ?></p>
                                                            <li class="list-group-item">Pseudo: <?= $totalUsers->users_pseudo ?></p>
                                                        </ul>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="espaceAdmin.php?idDeleteUser=<?= $totalUsers->users_id ?>" ><button class="btn btn-raised btn-primary">Oui</button></a>
                                                        <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Annuler</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                PRODUITS A VALIDER
                            </button>
                        </h5>
                    </div>
                    <!--ternaire permettant de mettre la class collapse en show, ce qui permet q'une fois l'id récupéré que le collapse ne se referme pas. -->
                    <div id="collapseTwo" class="collapse <?= isset($_GET['idValidate']) ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordion"> <!--Mise en place d'une ternaire pour éviter que mon collapse produit à valider reste affiché et ne se referme pas. -->
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-bordered table-dark">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th scope="col">#Produit</th>
                                            <th scope="col">#Utilisateur</th>
                                            <th scope="col">Nom Produits</th>
                                            <th scope="col">Marque</th>
                                            <th scope="col">Quantité</th>
                                            <th scope="col">Etat</th>
                                            <th scope="col">Capacité</th>
                                            <th scope="col">Expiration</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Catégorie</th>
                                            <th scope="col">Sous-catégorie</th>
                                            <th scope="col">Valider</th>
                                            <th scope="col">Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($listProductsNoValidate as $products) {
                                            ?>
                                            <tr>
                                                <td><?= $products->products_id ?></td>
                                                <td><?= $products->users_id ?></td>
                                                <td><?= $products->products_name ?></td>
                                                <td><?= $products->products_brand ?></td>
                                                <td><?= $products->products_quantity ?></td>
                                                <td><?= $products->products_state ?></td>
                                                <td><?= $products->products_capacity ?></td>
                                                <td><?= $products->expiration ?></td>
                                                <td><div class="imgEspacetroc"><img class="img-fluid" src="<?= $products->products_img ?>"></div></td>
                                                <td><?= $products->maincat_name ?></td>
                                                <td><?= $products->subcat_name ?></td>
                                                <td> 
                                                    <!--bouton du modal pour validation-->
                                                    <button type="button" for="validate" class="btn btn-raised btn-primary" data-toggle="modal" data-target="#ProductsValidate<?= $products->products_id ?>">
                                                        <i class="fas fa-check"></i>
                                                    </button>
                                                </td>
                                                <td>
                                                    <!--bouton du modal pour suppression-->
                                                    <button type="button" for="delete" class="btn btn-raised btn-danger" data-toggle="modal" data-target="#ProductsDelete<?= $products->products_id ?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal pour la validation de l'article -->
                                        <div class="modal fade" id="ProductsValidate<?= $products->products_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation validation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez vous valider le produit: <?= $products->products_name ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="espaceAdmin.php?idValidate=<?= $products->products_id ?>" ><button class="btn btn-raised btn-primary">Oui</button></a>
                                                        <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Annuler</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Modal pour la suppression de l'article -->
                                        <div class="modal fade" id="ProductsDelete<?= $products->products_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation Suppression</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez vous supprimer le produit : <?= $products->products_name ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="espaceAdmin.php?idDeleteProductNoValidate=<?= $products->products_id ?>" ><button class="btn btn-raised btn-primary">Oui</button></a>
                                                        <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Annuler</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Produits en Ligne
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-bordered table-dark">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th scope="col">#Produit</th>
                                            <th scope="col">#Utilisateur</th>
                                            <th scope="col">Nom Produits</th>
                                            <th scope="col">Marque</th>
                                            <th scope="col">Quantité</th>
                                            <th scope="col">Etat</th>
                                            <th scope="col">Capacité</th>
                                            <th scope="col">Expiration</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Catégorie</th>
                                            <th scope="col">Sous-catégorie</th>
                                            <th scope="col">Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($listProductsValidate as $productsPublished) {
                                            ?>
                                            <tr>
                                                <td><?= $productsPublished->products_id ?></td>
                                                <td><?= $productsPublished->users_id ?></td>
                                                <td><?= $productsPublished->products_name ?></td>
                                                <td><?= $productsPublished->products_brand ?></td>
                                                <td><?= $productsPublished->products_quantity ?></td>
                                                <td><?= $productsPublished->products_state ?></td>
                                                <td><?= $productsPublished->products_capacity ?></td>
                                                <td> <?= date('d/m/Y', strtotime($productsPublished->products_expiration)); ?></td>
                                                <td><img class="img-fluid ObjetImg" src="<?= $productsPublished->products_img ?>"></td>
                                                <td><?= $productsPublished->maincat_name ?></td>
                                                <td><?= $productsPublished->subcat_name ?></td>
                                                <td> 
                                                    <!--bouton du modal-->
                                                    <button type="button" for="delete" class="btn btn-raised btn-danger" data-toggle="modal" data-target="#Products<?= $productsPublished->products_id ?>">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                        <div class="modal fade" id="Products<?= $productsPublished->products_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation supression</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez-vous supprimer le produit : <?= $productsPublished->products_name ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="espaceAdmin.php?idDelete=<?= $productsPublished->products_id ?>" ><button class="btn btn-raised btn-primary">Oui</button></a>
                                                        <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Annuler</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table> 
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal pour les messages de confirmation de validation/suppression -->
        <!--la ternaire permet de mettre en place la class showModal, en fonction du controller. Le script affiche le modal, une fois que la variable de session = showModal.  -->
        <div class="modal fade <?= $_SESSION['showModal'] ? $_SESSION['showModal'] : ''; ?>" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <?= isset($_SESSION['message']) ? $_SESSION['message'] : '' ?>
                        <?php
                        unset($_SESSION['message']);
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">X</button>
                    </div>
                </div>
            </div>
            <?php unset($_SESSION['showModal']); ?> 
        </div>



        <!-- Footer -->
        <?php
        require('View/footer.php');
        ?>
        <!-- /Footer -->

        <!--Script-->
        <script>
            $('#myModal').modal(options)
        </script>
        <?php
        require('View/link/script.php');
        ?>
        <script src="assets/js/js.js"></script>
    </body>
</html>
<?php }else{ 
header('location: index.php');
exit;
} ?>