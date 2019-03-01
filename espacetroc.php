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
                        <a href="#"><img class="img-fluid" id="logo" src="../assets/img/Cosmétroc.png" alt="Cosmétroc"></a>
                    </div>
                     <?php  if (($profilFull->users_authorised == 1) && isset($_SESSION['idUser'])){  ?> <!--condition pour  -->
                    <div class="col">
                       <button id="buttonForm" class="btn btn-raised btn-primary" onclick="(window.location = 'espaceAdmin.php')">Admin</button>
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
                <a class="nav-item nav-link"><i class="fas fa-2x fa-user-tie"></i><?= $_SESSION['pseudo'] ?></a> <!--renvoie le pseudo connecté-->
                <a class="nav-item nav-link" onclick="(window.location = '../index.php?id=<?= $_SESSION['idUser']; ?>')"><i class="fas fa-2x fa-home"></i>Accueil</a>
                <a class="nav-item nav-link" onclick="(window.location = 'View/monprofilView.php?id=<?= $_SESSION['idUser']; ?>')"><i class="fas fa-2x fa-tachometer-alt"></i>Profil</a>
                <a class="nav-item nav-link" onclick="(window.location = 'View/ajout-articleView.php?id=<?= $_SESSION['idUser']; ?>')"><i class="fab fa-2x fa-cloudscale"></i>Ajout Article</a>
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
                            <a class="nav-link active" id="v-pills-Article-tab" data-toggle="pill" href="#v-pills-Article" role="tab" aria-controls="v-pills-Article" aria-selected="true">Article</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                            <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
                        </div>
                    </div>
                </div>
                <!-- /Menu vertical-->

                <!--div profil rapide-->
                <div class="col-sm-12 col-lg-10 showprofil">
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


        <!--content de mon menu vertical-->
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 col-lg-6 VerticalTabContent">
                    <div class="tab-content" id="v-pills-tabContent">
                        <div class="tab-pane fade show active" id="v-pills-Article" role="tabpanel" aria-labelledby="v-pills-Article-tab">
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
                                            <th scope="col"></th>
                                            <th scope="col">Supprimer</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach ($productsByUsers as $productUsers) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?= $productUsers->products_id ?></th>
                                                <td><?= $productUsers->products_name ?></td>
                                                <td><?= $productUsers->products_brand ?></td>
                                                <td><?= $productUsers->products_quantity ?></td>
                                                <td><?= $productUsers->products_state ?></td>
                                                <td><?= $productUsers->products_capacity ?></td>
                                                <td><?= $productUsers->expiration ?></td>
                                                <td><img class="img-fluid" src="<?= $productUsers->products_img ?>" width="42" height="42"></td>
                                                <td><?= $productUsers->maincat_name ?></td>
                                                <td><?= $productUsers->subcat_name ?></td>
                                                <td><button class="btn btn-primary" onclick="(window.location = 'View/modifArticle.php?idProducts=<?= $productUsers->products_id; ?>')">Modifier</button></td>
                                                <td><button class="btn btn-raised btn-danger" onclick="(window.location = 'View/deleteArticle.php?idProducts=<?= $productUsers->products_id; ?>')">X</button></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table> 
                            </div>
                        </div>
                        <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">..weeeep.</div>
                        <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">.olleeeeee..</div>
                        <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">..wiiiiiiiii.</div>
                    </div>
                </div>
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
