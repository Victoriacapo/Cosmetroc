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
        <header>
            <div class="container-fluid headDiv">
                <div class="row">
                    <div class="col">
                        <a href="#"><img class="img-fluid" id="logo" src="../assets/img/Cosmétroc.png" alt="Cosmétroc"></a>
                    </div>
                    <div class="col">
                        <!-- Button connexion modal -->
                        <button id="buttonForm" class="btn btn-raised btn-primary" onclick="(window.location = 'View/connexionView.php')">Connexion</button>
                        <button id="buttonForm" class="btn btn-raised btn-primary" onclick="(window.location = 'View/inscriptionView.php')">Inscription</button>
                        <?php if (isset($_SESSION['idUser'])) { //condition si une session utilisateur existe, afficher le bouton qui permet l'accès vers l'espace personnel' ?>
                            <button id="buttonForm" class="btn btn-raised btn-primary" onclick="(window.location = 'espacetroc.php')"><i class="fas fa-user-tie"></i><?= $_SESSION['pseudo'] ?></button>
                        <?php }
                        ?>
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

            <!--bouton pr faire remonter la page à améliorer-->
            <fieldset >
                <button type="button" class="btn btn-danger bmd-btn-fab">
                    <i class="material-icons"></i>
                </button>
            </fieldset>

            
            <div class="container" id="cardProduct">
                <div class="row">
                    <?php
                    foreach ($ArrayProductNavbar as $cardProducts) { //boucle pour afficher les produits de la Bdd
                        ?>
                        <div class="col-xs-12 col-md-6 col-lg-3">
                            <div class="card">
                                <img class="card-img-top" src="<?= $cardProducts->products_img ?>" alt="Card image cap">
                                <div class="card-block">
                                    <h4 class="card-title">Card title</h4>
                                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                                </div>
                                <div class="card-footer">
                                    <small class="text-muted">Last updated 3 mins ago</small>
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
