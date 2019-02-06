<?php
include('View/connexionView.php');
include('View/inscriptionView.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Material Design for Bootstrap fonts and icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <!-- Material Design for Bootstrap CSS -->
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" crossorigin="anonymous">
        <!-- fontawesome --> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" crossorigin="anonymous">
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/style1.css">
        <title>Cosmétroc</title>
    </head>
    <body>

      
            <?php
            require('View/navbar.php');
            ?>
      

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



            <div class="parallax">

                <!--bouton pr faire remonter la page à améliorer-->
                <fieldset >
                    <button type="button" class="btn btn-danger bmd-btn-fab">
                        <i class="material-icons">grade</i>
                    </button>
                </fieldset>
                <!--fin partie menu gauche-->
                <div class="menunavVertical">
                    <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                        <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                        <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                    </div>
                </div>
                <!--fin partie menu gauche-->
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


        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"  crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" crossorigin="anonymous"></script>
        <script>$(document).ready(function () {
                $('body').bootstrapMaterialDesign();
            });</script>
</html>
