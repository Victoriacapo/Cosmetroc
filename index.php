<?php
include('../View/connexionView.php');
include('../View/zipcodeView.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" crossorigin="anonymous">
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
                        <!-- <a href="../View/zipcodeView.php"><button type="button" class="btn">Inscription</button></a> (bouton pour rediriger sur une autre page, a enlever par la suite-->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pageconnexion">Connexion</button>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#pageZipcode">Inscription</button>
                    </div>
                </div>
            </div>
            <!-- *********************************************NAVBAR******************************************************************* -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Acceuil<span class="sr-only"></span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Maquillage
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Soins du corps
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Soins du visage
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Soins des ongles
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Soins cheveux
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Rechercher" aria-label="Rechercher" />
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Ok</button>
                    </form>
                </div>
            </nav>
        </header>

        <!-- ************************************************FIN HEADER ET NAV *************************************************************-->
        <section>
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
        </section>
        <section>
            <div class="parallax">
                <!--bouton pr faire remonter la page à améliorer-->
                <fieldset >
                    <button type="button" class="btn btn-danger bmd-btn-fab">
                        <i class="material-icons">grade</i>
                    </button>
                </fieldset>

               
            </div>

        </section>

        <!--************************************************* FOOTER************************************************************************* -->
        <footer id="footer">
            <div class="container-fluid">
                <div class="row row-foot">
                    <div class="foot-sect col-12 col-lg-3 col-md-6 col-sm-12">
                        <div class="foot-div">
                            <h5 class="foot-subt">Acceuil</h5>
                        </div>
                        <a class="foot-link" href="index.php" title="footer_Home">Acceuil</a>
                    </div>
                    <div class="foot-sect col-12 col-lg-3 col-md-6 col-sm-12">
                        <div class="foot-div">
                            <h5 class="foot-subt">Produits</h5>
                        </div>
                        <a class="foot-link" href="" title="Mascara">Mascara</a>
                        <a class="foot-link" href="" title="Vernis">Vernis</a>
                        <a class="foot-link" href="" title="Parfum">Parfum </a>
                        <a class="foot-link" href="" title="Soin du corps">Soin du corps</a>
                    </div>
                    <div class="foot-sect col-12 col-lg-3 col-md-6 col-sm-12">
                        <div class="foot-div">
                            <h5 class="foot-subt">About me</h5>
                        </div>
                        <a class="foot-link" href="about.php" title="footer_About">About</a>
                        <a class="foot-link" href="pp.php" title="footer_Past_Projects">Past Projects</a>
                        <a class="foot-link" href="blog.php" title="footer_Blog">Blog</a>
                    </div>
                    <div class="foot-sect col-12 col-lg-3 col-md-6 col-sm-12">
                        <div class="foot-div">
                            <h5 class="foot-subt">Other</h5>
                        </div><!-- Contact Me -->
                        <a class="foot-link" href="contact.php" title="footer_Contact">Contact Me</a>
                        <a class="foot-link" href="indexfr.php" title="footer_French">Français</a>
                    </div>
                    <div class="row">
                        <div class="col-12 col-xs-12 col-sm-12 col-md-12 mt-12 mt-sm-5">
                            <ul class="list-unstyled list-inline social">
                                <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-facebook-f"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-twitter"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-instagram"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void();"><i class="fab fa-google-plus"></i></a></li>
                                <li class="list-inline-item"><a href="javascript:void();" target="_blank"><i class="fa fa-envelope"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>-->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>-->
        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"  crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" crossorigin="anonymous"></script>
        <script>$(document).ready(function () {//script pour material bootstrap
                $('body').bootstrapMaterialDesign();
            });
        </script>
</html>
