<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>
    <head>
        <!--link-->
        <?php
        require('link/header.php');
        ?>
        <!-- style -->
         <link rel="stylesheet" href="../assets/css/styleForm.css">
        <title>deconnexion</title>
    </head>

    <body id="errorpage">


        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 col-lg-6 deconnexion">
                    <h1 class="errorH1">Déconnexion</h1>
                    <div><h1>Vous avez bien été déconnecté</h1></div>
                    <div id="sendButton"><button onclick="(window.location = '../index.php')" class="btn btn-raised btn-primary"><i class="fas fa-home"></i></button></div>
                </div>
            </div>
        </div>









        <!--Script-->
        <?php
        require('link/script.php');
        ?>
    </body>
</html>
