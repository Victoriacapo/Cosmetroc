<?php
session_start();

if (empty($_SESSION)) {
    header('location: index.php');
    exit;
}
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
        <!-- Nav -->       
        <?php
        require('View/navbar.php');
        ?>
        <!-- /Nav -->
        <!--Sous-Menu-->
        <div class="menunav">
            <nav class="nav nav-pills nav-fill">
                <a class="nav-item nav-link"><i class="fas fa-2x fa-user-tie"></i><?= $_SESSION['pseudo'] ?></a> <!--renvoie le pseudo connecté-->
                <a class="nav-item nav-link" onclick="(window.location = '../index.php')"><i class="fas fa-2x fa-home"></i>Acceuil</a>
                <a class="nav-item nav-link" onclick="(window.location = 'View/monprofilView.php?id=<?= $_SESSION['id']; ?>')"><i class="fas fa-2x fa-tachometer-alt"></i>Profil</a>
                <a class="nav-item nav-link" onclick="(window.location = 'View/ajout-articleView.php')"><i class="fab fa-2x fa-cloudscale"></i>Ajout Article</a>
                <a class="nav-item nav-link" onclick="(window.location = 'View/deconnexion.php')"><i class="fas fa-2x fa-sign-out-alt"></i>deconnexion</a>
            </nav>
        </div>
        <!--/Sous-Menu-->

        <div class="container-fluid ">
            <div class="row">
                <!--Menu vertical-->
                <div class="col-sm-12 col-lg-2">
                    <div class="menunavVertical">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                        </div>
                    </div>
                </div>
                <!-- /Menu vertical-->

                <!--div profil rapide-->
                <div class="col-sm-12 col-lg-6 showprofil">
                    <div class="form-group">
                        <label class="nav-item nav-link">Civilité:</label>
                        <p><?= $_SESSION['gender'] ?></p>
                        <label class="nav-item nav-link">Pseudo:</label>
                        <p><?= $_SESSION['pseudo'] ?></p>
                        <label class="nav-item nav-link">Email:</label>
                        <p><?= $_SESSION['email'] ?></p>
                    </div>
                </div>
                <!-- /div profil rapide-->


            </div> <!--/div row-->
        </div> <!--/div container-->




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
