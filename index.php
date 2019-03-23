<?php
session_start();

// appel du controller controllerNavbar
include_once('Controller/controllerIndex.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
        require('View/link/header.php');
        ?>
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/style1.css">
        <title>Cosmétroc</title>
    </head>
    <body>
        <header id="headerPage">
            <div class="container-fluid headDiv">
                <div class="row">
                    <div class="col">
                        <a href="index.php"><img class="img-fluid" id="logo" src="../assets/img/Cosmétroc.png" alt="Cosmétroc"></a>
                    </div>
                    <div class="col">
                        <!--condition pour m'afficher les bouton en fonction que l'utilisateur soit connecté ou non-->
                        <?php if (isset($_SESSION['idUser'])) { //condition si une session utilisateur existe, afficher le bouton qui permet l'accès vers l'espace personnel' ?>
                            <button id="buttonForm" class="btn btn-raised btn-primary btnDivers" onclick="(window.location = 'View/deconnexion.php')"><i class="fas fa-sign-out-alt"></i>Deconnexion</button>
                            <button id="buttonForm" class="btn btn-raised btn-primary btnDivers" onclick="(window.location = 'espacetroc.php')"><i class="fas fa-user-tie"></i><?= $_SESSION['pseudo'] ?></button>
                        <?php } else {
                            ?>
                            <!-- Button connexion -->
                            <button id="buttonForm" class="btn btn-raised btn-primary btnDivers" onclick="(window.location = 'View/connexionView.php')">Connexion</button>
                            <button id="buttonForm" class="btn btn-raised btn-primary btnDivers" onclick="(window.location = 'View/inscriptionView.php')">Inscription</button>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Nav -->
            <?php
            require('View/navbar.php');
            ?>
            <!-- /Nav -->  
        </header>


        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../assets/img/blonde-2094172_1920.jpg" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/img/makeup-brush-1761648_1920.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../assets/img/lipstick-791761_1920.jpg" alt="Third slide">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="parallax">

            <div class="container-fluid" id="goodPracticeContainer">
                <div class="row">
                    <div  class="col-xs-12 col-md-6 col-lg-4">
                        <div><img class="img-fluid" src="../assets/img/Cosmétroc.png" alt="Cosmétroc"></div>
                        <p>
                            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Button with data-target
                            </button>
                        </p>
                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <div><img class="img-fluid" src="../assets/img/Cosmétroc.png" alt="Cosmétroc"></div>  
                    </div>
                    <div class="col-xs-12 col-md-6 col-lg-4">
                        <div><img class="img-fluid" src="../assets/img/Cosmétroc.png" alt="Cosmétroc"></div>  
                    </div>
                </div>
            </div>


            <div class="container-fluid ProductsContainer">
                <div class="row">

                    <?php
                    foreach ($ArrayProductNavbar as $cardProducts) { //boucle pour afficher les produits de la Bdd
                        ?>
                        <div class="col-xs-12 col-md-6 col-lg-3" id="content">
                            <div class="card">
                                <img class="card-img-top" src="<?= $cardProducts->products_img ?>" alt="Card image cap">
                                <div class="card-header">
                                    <h4 class="titleCard"><?= $cardProducts->products_name ?></h4>
                                    <h4 class="subtitleCard"><?= $cardProducts->products_brand ?></h4>
                                </div>
                                <div class="card-body">
                                    <p>Quantité: <?= $cardProducts->products_quantity ?></p>
                                    <p>Etat: <?= $cardProducts->products_state ?></p>
                                    <p>Capacité: <?= $cardProducts->products_capacity ?></p>
                                    <p>Expiration: <?= date('d/m/Y', strtotime($cardProducts->products_expiration)); ?></p> 
                                    <p><i class="fas fa-user-tie"></i>: <?= $cardProducts->users_pseudo ?></p>
                                </div>
                                <div class="card-footer">
                                    <?php if ((isset($_SESSION['idUser'])) && ($productsTableFill != 0)) { ?> <!--$productsTableFill contient la méthode qui compte le nombre d'entrée dans la table products, s'il n'y a ucune entrée, il me renvoie 0. Si entrée il y a, il compte le nombre d'entrées.-->
                                        <small class="text-muted"><i class="fas fa-envelope fa-2x" id="iconeEmail"></i><?= $cardProducts->users_email ?></small>
                                    <?php } else { ?>
                                        <small class="text-muted">Vous devez vous inscrire et proposer un article en troc, pour visualiser les coordonnées du troqueur.</small>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div>
            </div>

        </div> <!--/fin div parallax -->



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
