<?php
session_start();

if (empty($_SESSION)) {
    header('location: index.php');
    exit;
}

// appel du controller controllerAjout-article
include_once('../Controller/controllerpageProduit.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        require('link/header.php');
        ?>
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/style1.css">
        <title>Page produit</title>
    </head>
    <body>

        <div class="container-fluid">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Collapsible Group Item #1
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
                                            <th scope="col">Statut</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Marque</th>
                                            <th scope="col">Quantité</th>
                                            <th scope="col">Etat</th>
                                            <th scope="col">Capacité</th>
                                            <th scope="col">Expiration</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Catégorie</th>
                                            <th scope="col">Sous-catégorie</th>
                                            <th scope="col">Modifier</th>
                                            <th scope="col">Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($productsByUsers as $productUsers) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $productUsers->products_id ?></th>
                                                <td> <?php
                                                    if ($productUsers->products_validate == 0) { //condition pour afficher le statut validé ou non, avec mon attribut products_validate(si =0 nn validé, ou 1
                                                        echo 'en cours de validation';
                                                    } else {
                                                        echo 'validé';
                                                    }
                                                    ?></td>
                                                <td><?= $productUsers->products_name ?></td>
                                                <td><?= $productUsers->products_brand ?></td>
                                                <td><?= $productUsers->products_quantity ?></td>
                                                <td><?= $productUsers->products_state ?></td>
                                                <td><?= $productUsers->products_capacity ?></td>
                                                <td><?= $productUsers->expiration ?></td>
                                                <td><div class="imgEspacetroc"><img class="img-fluid" src="<?= $productUsers->products_img ?>"></div></td>
                                                <td><?= $productUsers->maincat_name ?></td>
                                                <td><?= $productUsers->subcat_name ?></td>
                                                <td><button class="btn btn-primary" for="edit" onclick="(window.location = 'View/modifArticle.php?idProducts=<?= $productUsers->products_id; ?>')"><i class="fas fa-pen"></i></button></td>
                                                <td><button class="btn btn-raised btn-danger" for="delete" onclick="(window.location = 'View/deleteArticle.php?idProducts=<?= $productUsers->products_id; ?>')"><i class="fas fa-trash-alt"></i></button></td>
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
            </div>
            </div>




            <!--Script-->
            <?php
            require('link/script.php');
            ?>
    </body>
</html>
