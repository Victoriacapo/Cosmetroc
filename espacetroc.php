<?php
session_start();

if (empty($_SESSION)) {
    header('location: index.php');
    exit;
}

// appel du controller controllerAjout-article
include_once('Controller/controllerEspacetroc.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        require('View/link/header.php');
        ?>
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/style1.css">
        <title>Espace Troc</title>
    </head>
    <body>
        <header>
            <div class="container-fluid headDiv">
                <div class="row">
                    <div class="col">
                        <a href="index.php"><img class="img-fluid" id="logo" src="../assets/img/Cosmétroc.png" alt="Cosmétroc"></a>
                    </div>
                    <?php if (($profil->users_authorised == 1) && isset($_SESSION['idUser'])) { ?> <!--A l'aide de la variable $profil, je vérifie que l'attribut users_authorised soit = à 1, ce qui signifie que l'utilisateur est authentifié admin  -->
                        <div class="col">
                            <button id="buttonForm" class="btn btn-raised btn-primary btnDivers" onclick="(window.location = 'espaceAdmin.php')">Admin</button>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <!-- Nav -->       
            <?php
            require('View/navbar.php');
            ?>
            <!-- /Nav -->
        </header>

        <!--Sous-Menu-->
        <div class="menunav">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-item nav-link" onclick="(window.location = 'espacetroc.php?id=<?= $_SESSION['idUser']; ?>')"><i class="fas fa-2x fa-user-tie"></i><?= $_SESSION['pseudo'] ?></a> <!--renvoie le pseudo connecté-->
                <a class="nav-item nav-link" onclick="(window.location = 'View/monprofilView.php?id=<?= $_SESSION['idUser']; ?>')"><i class="fas fa-2x fa-tachometer-alt"></i>Compléter Profil</a>
                <a class="nav-item nav-link" onclick="(window.location = 'View/ajout-articleView.php?id=<?= $_SESSION['idUser']; ?>')"><i class="fab fa-2x fa-cloudscale"></i>Ajout Article</a>
                <a class="nav-item nav-link" onclick="(window.location = 'View/deconnexion.php')"><i class="fas fa-2x fa-sign-out-alt"></i>Deconnexion</a>
            </nav>
        </div>
        <!--/Sous-Menu-->


        <div class="container-fluid">
            <div class="alert alert-dark" role="alert">
                Courez vite compléter votre profil, pour pouvoir proposer un produit au troc.
            </div>
            <div id="accordion">
                <div class="card">

                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Infos personnelles
                            </button>
                        </h5>
                    </div>

                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="table-responsive-sm">
                                <table class="table table-striped table-bordered table-dark">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th scope="col">Pseudo</th>
                                            <th scope="col">Civilité</th>
                                            <th scope="col">Nom</th>
                                            <th scope="col">Prénom</th>
                                            <th scope="col">Adresse</th>
                                            <th scope="col">Ville</th>
                                            <th scope="col">CP</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Teléphone</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><?= $profil->users_pseudo ?></td>
                                            <td><?= $profil->users_gender ?></td>
                                            <td><?= $profil->users_lastname ?></td>
                                            <td><?= $profil->users_firstname ?></td>
                                            <td><?= $profil->users_address ?></td>
                                            <td><?= $profil->users_city ?></td>
                                            <td><?= $profil->users_CP ?></td>
                                            <td><?= $profil->users_email ?></td>
                                            <td><?= $profil->users_phone ?></td>
                                        </tr>
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
                                Vos Articles proposés en troc
                            </button>
                        </h5>
                    </div>
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
                                            <td><img class="img-fluid" src="<?= $productUsers->products_img ?>" width="42" height="42"></td>
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
