<?php
session_start();

// appel du controller controllerdeleteArticle
include_once('../Controller/controllerdeleteArticle.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        require('link/header.php');
        ?>

        <link rel="stylesheet" href="../assets/css/styleForm.css">
        <title>Suppression-article</title>
    </head>

    <body id="Article">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <!--bouton retour-->
                    <button onclick="(window.location = '../espacetroc.php')" class="returnButton"><i class="fas fa-arrow-left"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid my-5">
            <div class="row">
                <div class="col-sm-12 col-lg-6 Article">
                    <?php if ($checkId) { ?> <!-- si l'idUser session est différent de l'objet users_id, afficher l'alerte  -->
                        <div class="alert alert-dark" role="alert">
                            Vous n'avez pas les droits pour supprimer cet article.
                        </div>
                    <?php } else { //sinon afficher la fiche produit
                        ?>

                        <?php if ($showList) { //applique ma booleenne pr afficher/cacher mon form ?>
                            <div id="message">
                                <h1 class="messageH1">Suppression Article</h1>
                                <!--Fiche Produit-->    
                                <ul class="list-group products">
                                    <li class="list-group-item active"><?= 'Fiche de l\'article ' . $pdtSheet->products_name ?></li>
                                    <li class="list-group-item">Marque du produit: <?= $pdtSheet->products_brand ?> </li>
                                    <li class="list-group-item">Quantité: <?= $pdtSheet->products_quantity ?></li>
                                    <li class="list-group-item">Etat: <?= $pdtSheet->products_state ?></li>
                                    <li class="list-group-item">Capacité: <?= $pdtSheet->products_capacity ?></li>
                                    <li class="list-group-item">Expiration: <?= date('d/m/Y', strtotime($pdtSheet->products_expiration)); ?></li>
                                    <li class="list-group-item"><img class="img-fluid" src="<?= $pdtSheet->products_img; ?>" width="150" height="150"></li>
                                </ul>

                                <!--bouton pour afficher demande de confirmation pour la poursuite de la suppression--> 
                                <form method="POST">
                                    <div id="sendButton"><input type="submit" class="btn btn-raised btn-primary" name="sendButton" value="Supprimer" /></div>
                                </form>
                            </div>

                        <?php } else { ?>
                            <!--message pour la demande de confirmation pour la poursuite de la suppression-->
                            <div id="message">
                                <h1 class="messageH1">Confirmation de suppression</h1>
                                <p>Etes vous sûr de vouloir procéder à la suppression de l'article:</p> 
                                <p><?= $pdtSheet->products_name ?></p>
                                <!--span pour message de succès de l’action-->
                                <span class="succes"><?= isset($succesArray['deleteSucces']) ? $succesArray['deleteSucces'] : ''; ?></span>
                                <!--bouton pour la suppression effective de l'article-->
                                <form method="POST">
                                    <div id="sendButton"><input type="submit" class="btn btn-raised btn-primary" name="deleteButton" value="Supprimer" /></div>   
                                </form>
                            </div>
                            <?php
                        }
                    }
                    ?>

                    <div id="closebutton">
                        <button type="button" onclick="(window.location = '../espacetroc.php')" class="btn btn-raised btn-danger">X</button>
                    </div>

                </div>
            </div>

            <?php
            require('link/script.php');
            ?>
    </body>
</html>
