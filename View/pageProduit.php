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
    <body id="pageProduitBody">

        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <!--bouton retour-->
                    <button onclick="(window.location = '../espacetroc.php')" class="returnButton"><i class="fas fa-arrow-left"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid my-5 ">
            <div id="accordion">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <?= $pseudoUser->users_gender ?> <?= $pseudoUser->users_pseudo ?>
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container-fluid mx-auto" style="width: 200px;">
                                    <div id="ContainerImgPseudo">
                                        <?php if ($pseudoUser->users_gender == 'MR') { ?>
                                            <div id="ImgPseudo"><img class="img-fluid" src="../assets/img/myAvatar" alt="avatar"></div>
                                        <?php } else { ?>
                                            <div id="ImgPseudo"><img class="img-fluid" src="../assets/img/myAvatarFemme.png" alt="avatar"></div> 
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
                                        Ses articles postés
                                    </button>
                                </h5>
                            </div>

                            <div id="collapseTwo" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                                    <div class="table-responsive-sm">
                                        <table class="table table-striped table-bordered table-dark">
                                            <thead>
                                                <tr class="bg-primary">
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nom</th>
                                                    <th scope="col">Marque</th>
                                                    <th scope="col">Quantité</th>
                                                    <th scope="col">Etat</th>
                                                    <th scope="col">Capacité</th>
                                                    <th scope="col">Expiration</th>
                                                    <th scope="col">Image</th>
                                                    <th scope="col">Catégorie</th>
                                                    <th scope="col">Sous-catégorie</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                foreach ($productsUserList as $productByPseudo) {
                                                    ?>
                                                    <tr>
                                                        <th scope="row"><?= $productByPseudo->products_id ?></th>
                                                        <td><?= $productByPseudo->products_name ?></td>
                                                        <td><?= $productByPseudo->products_brand ?></td>
                                                        <td><?= $productByPseudo->products_quantity ?></td>
                                                        <td><?= $productByPseudo->products_state ?></td>
                                                        <td><?= $productByPseudo->products_capacity ?></td>
                                                        <td><?= $productByPseudo->expiration ?></td>
                                                        <td><div class="imgEspacetroc"><img class="img-fluid" src="<?= $productByPseudo->products_img ?>"></div></td>
                                                        <td><?= $productByPseudo->maincat_name ?></td>
                                                        <td><?= $productByPseudo->subcat_name ?></td>
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
