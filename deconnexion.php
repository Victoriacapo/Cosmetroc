<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
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
        <title>Espace personnel</title>
    </head>
    <body>
        <!-- ************************************************HEADER ET NAV *************************************************************-->
        <?php
        require('View/navbar.php');
        ?>
        <!-- ************************************************/FIN HEADER ET NAV *************************************************************-->

        <div class="menunav">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-item nav-link" onclick="(window.location = '../index.php')">Acceuil</a>
                <a class="nav-item nav-link" onclick="(window.location = 'View/monprofilView.php')">Profil</a>
                <a class="nav-item nav-link" onclick="(window.location = 'View/ajout-articleView.php')">Ajout Article</a>
                <a class="nav-item nav-link"><i class="fas fa-2x fa-sign-out-alt"></i></a>
            </nav>
        </div>

        
        <h1>Vous avez bien été déconnecté</h1>








        <!--************************************************* FOOTER************************************************************************* -->
        <?php
        require('View/footer.php');
        ?>
        <!--************************************************* /FOOTER************************************************************************* -->

        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"  crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" crossorigin="anonymous"></script>
        <script>$(document).ready(function () {
                        $('body').bootstrapMaterialDesign();
                    });</script>
    </body>
</html>
