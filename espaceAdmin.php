<?php
session_start();

if (empty($_SESSION)) {
    header('location: index.php');
    exit;
}


// appel du controller controllerAjout-article
include_once('Controller/controllerEspaceAdmin.php');
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
                        <a href="#"><img class="img-fluid" id="logo" src="../assets/img/Cosmétroc.png" alt="Cosmétroc"></a>
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
                                            <th scope="col"></th>
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
                                                <td><button class="btn btn-primary">Modifier</button></td>
                                                <td><button class="btn btn-raised btn-danger">X</button></td>
                                            </tr>
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
                    <div id="collapseTwo" class="collapse <?= isset($_GET['idValidate']) ? 'show' : '' ?>" aria-labelledby="headingTwo" data-parent="#accordion"> <!--Mise en place d'une ternaire pour éviter que mon collapse produit à valider reste affiché et ne se referme pas. -->
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-bordered table-dark">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th scope="col">#Produit</th>
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
                                                <td><?= $products->products_name ?></td>
                                                <td><?= $products->products_brand ?></td>
                                                <td><?= $products->products_quantity ?></td>
                                                <td><?= $products->products_state ?></td>
                                                <td><?= $products->products_capacity ?></td>
                                                <td><?= $products->expiration ?></td>
                                                <td><img class="img-fluid" src="<?= $products->products_img ?>" width="42" height="42"></td>
                                                <td><?= $products->maincat_name ?></td>
                                                <td><?= $products->subcat_name ?></td>
                                                <td> 
                                                    <!--bouton du modal-->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Products<?= $products->products_id ?>">
                                                      <i class="fas fa-check"></i>
                                                    </button>
                                                </td>
                                                <td><button class="btn btn-raised btn-danger">X</button></td>
                                            </tr>

                                            <!-- Modal -->
                                        <div class="modal fade" id="Products<?= $products->products_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation validation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez vous valider le produit : <?= $products->products_name ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="espaceAdmin.php?idValidate=<?= $products->products_id ?>" ><button class="btn btn-primary">Oui</button></a>
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
                                                <td><?= $productsPublished->products_name ?></td>
                                                <td><?= $productsPublished->products_brand ?></td>
                                                <td><?= $productsPublished->products_quantity ?></td>
                                                <td><?= $productsPublished->products_state ?></td>
                                                <td><?= $productsPublished->products_capacity ?></td>
                                                <td> <?= date('d/m/Y', strtotime($productsPublished->products_expiration)); ?></td>
                                                <td><img class="img-fluid" src="<?= $productsPublished->products_img ?>" width="42" height="42"></td>
                                                <td><?= $productsPublished->maincat_name ?></td>
                                                <td><?= $productsPublished->subcat_name ?></td>
                                                <td> 
                                                    <!--bouton du modal-->
                                                    <button type="button" class="btn btn-raised btn-danger" data-toggle="modal" data-target="#Products<?= $productsPublished->products_id ?>">
                                                     X
                                                    </button>
                                                </td>
                                            </tr>

                                            <!-- Modal -->
                                        <div class="modal fade" id="Products<?= $productsPublished->products_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Confirmation validation</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Voulez-vous supprimer le produit : <?= $productsPublished->products_name ?>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="espaceAdmin.php?idDelete=<?= $productsPublished->products_id ?>" ><button class="btn btn-primary">Oui</button></a>
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

    </body>
</html>
