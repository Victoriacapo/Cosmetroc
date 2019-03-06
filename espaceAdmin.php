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
                                                <td><?= $totalUsers-> users_firstname?></td>
                                                <td><?= $totalUsers->users_address ?></td>
                                                <td><?= $totalUsers->users_city  ?></td>
                                                <td><?= $totalUsers->users_CP ?></td>
                                                 <td><?=$totalUsers->users_email ?></td>
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
                                PRODUITS
                            </button>
                        </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                             <div class="table-responsive-sm">
                                <table class="table table-striped table-bordered table-dark">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th scope="col">#Client</th>
                                            <th scope="col">Infos client</th>
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
                                            <th scope="col"></th>
                                            <th scope="col">Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($totalProductsbyusers as $productByUsers) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $productByUsers->users_id ?></th>
                                                <td>
                                                    <p>Pseudo: <?= $productByUsers->users_pseudo ?></p>
                                                    <p>Nom: <?= $productByUsers->users_lastname ?></p>
                                                    <p>Prénom: <?= $productByUsers->users_firstname ?></p>
                                                </td>
                                                <td><?= $productByUsers->products_id ?></td>
                                                <td><?= $productByUsers->products_name ?></td>
                                                <td><?= $productByUsers->products_brand ?></td>
                                                <td><?= $productByUsers->products_quantity ?></td>
                                                <td><?= $productByUsers->products_state ?></td>
                                                <td><?= $productByUsers->products_capacity ?></td>
                                                <td><?= $productByUsers->expiration ?></td>
                                                <td><img class="img-fluid" src="<?= $productByUsers->products_img ?>" width="42" height="42"></td>
                                                <td><?= $productByUsers->maincat_name ?></td>
                                                <td><?= $productByUsers->subcat_name ?></td>
                                                <td><button class="btn btn-primary" onclick="">Modifier</button></td>
                                                <td><button class="btn btn-raised btn-danger" onclick="">X</button></td>
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
                    <div class="card-header" id="headingThree">
                        <h5 class="mb-0">
                            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Collapsible Group Item #3
                            </button>
                        </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
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
        <?php
        require('View/link/script.php');
        ?>

    </body>
</html>
