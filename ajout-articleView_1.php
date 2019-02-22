<?php
session_start();
// appel du controller controllerAjout-article
include_once('../Controller/controllerAjout-article.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <?php
        require('link/header.php');
        ?>
        <!--script-->
          <!--<script src="../assets/js/js.js"></script>-->
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/styleForm.css">
        <title>Ajout-article</title>
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


        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 col-lg-6 Article">

                    <!--partie form pr uploader image-->
                    <form name="addProduit" action="ajout-articleView.php" method="POST" enctype="multipart/form-data">
                        <h1 class="ArticleFormH1">Article</h1>

                        <!--partie select-->
                        <div class="row">
                            <div class="form-group col-lg-4 col-sm-6"> 
                                <label for="nameproduct">Nom du produit: </label>
                                <input type="text" name="nameproduct" class="form-control" value="<?= isset($_POST['nameproduct']) ? $nameproduct : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
                                <span class="error"><?= isset($errorsArray['nameproduct']) ? $errorsArray['nameproduct'] : ''; ?></span>
                            </div>

                            <div class="form-group col-lg-4 col-sm-6"> 
                                <label for="brand">Marque: </label>
                                <input type="text" name="brand" class="form-control" value="<?= isset($_POST['brand']) ? $brand : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
                                <span class="error"><?= isset($errorsArray['brand']) ? $errorsArray['brand'] : ''; ?></span>
                            </div>

                            <div class="form-group col-lg-4 col-sm-6"> 
                                <label>Quantité: </label>
                                <select name="quantity" class="form-control"> 
                                    <option value="" selected disabled></option>
                                    <option value="1" <?= (isset($_POST['quantity']) && $_POST['quantity'] == '1') ? 'selected' : ''; ?>>1</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                                    <option value="2" <?= (isset($_POST['quantity']) && $_POST['quantity'] == '2') ? 'selected' : ''; ?>>2</option>
                                    <option value="3" <?= (isset($_POST['quantity']) && $_POST['quantity'] == '3') ? 'selected' : ''; ?>>3</option>
                                    <option value="4" <?= (isset($_POST['quantity']) && $_POST['quantity'] == '4') ? 'selected' : ''; ?>>4</option>
                                    <option value="5" <?= (isset($_POST['quantity']) && $_POST['quantity'] == '5') ? 'selected' : ''; ?>>5</option>
                                </select>
                                <span class="error"><?= isset($errorsArray['quantity']) ? $errorsArray['quantity'] : ''; ?></span>
                            </div>

                            <div class="form-group col-lg-4 col-sm-6"> 
                                <label>Etat: </label>
                                <select name="state" class="form-control"> 
                                    <option value="" selected disabled></option>
                                    <option value="new" <?= (isset($_POST['state']) && $_POST['state'] == 'new') ? 'selected' : ''; ?>>Neuf</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                                    <option value="tested" <?= (isset($_POST['state']) && $_POST['state'] == 'tested') ? 'selected' : ''; ?>>testé</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                                    <option value="use" <?= (isset($_POST['state']) && $_POST['state'] == 'use') ? 'selected' : ''; ?>>Utilisé + de 5 fois</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                                </select>
                                <span class="error"><?= isset($errorsArray['state']) ? $errorsArray['state'] : ''; ?></span>
                            </div>

                            <div class="form-group col-lg-4 col-sm-6"> 
                                <label for="capacity">Capacité: </label>
                                <input type="text" name="capacity" class="form-control" value="<?= isset($_POST['capacity']) ? $capacity : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
                                <span class="error"><?= isset($errorsArray['capacity']) ? $errorsArray['capacity'] : ''; ?></span>
                            </div>

                            <div class="form-group col-lg-4 col-sm-6"> 
                                <label for="expiration">Date d'expiration: </label>
                                <input type="date" name="expiration" class="form-control" value="<?= isset($_POST['expiration']) ? $expiration : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
                                <span class="error"><?= isset($errorsArray['expiration']) ? $errorsArray['expiration'] : ''; ?></span>
                            </div>






                            <div class="form-group col-lg-4 col-sm-6"> 
                                <label>Catégorie: </label>
                                <?php
                                foreach ($showMncat as $Maincat) { //boucle pour afficher les categories de la Bdd
                                    ?>
                                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample<?= $Maincat->maincat_id ?>" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <?= $Maincat->maincat_name ?>
                                    </a>
                                    <div class="collapse" id="collapseExample<?= $Maincat->maincat_id ?>">
                                        <select name="sbcategory" class="form-control">                                             
                                            <?php
                                            foreach ($showSbcat as $subcat) { //boucle pour afficher les categories de la Bdd
                                                if ($subcat->maincat_id !== $Maincat->maincat_id) {
                                                } else {
                                                
                                                ?>
                                                <option value="<?= $subcat->subcat_id ?>" <?= (isset($_POST['category']) && $_POST['category'] == '') ? 'selected' : ''; ?>><?= $subcat->subcat_name ?></option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                                                <?php
                                            }}
                                            ?>
                                        </select>
                                    </div>
                                    <?php
                                }
                                ?>






                                <div class="form-group col-lg-12 col-sm-12 Image">
                                    <label id="labelImg">Image du produit à troqué </label>
                                    <input type="file" name="image" class="form-control">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="100000"><!--controle le format uploadé--> <!-- On limite le fichier à 100Ko -->
                                    <span class="error"><?= isset($errorsArray['image']) ? $errorsArray['image'] : ''; ?></span>
                                </div>

                            </div><!--fin div row-->

                            <div id="sendButton"><input type="submit" class="btn btn-raised btn-primary" name="sendButton" value="Envoyer" /></div>
                    </form>

                    <div id="closebutton">
                        <button type="button" onclick="(window.location = '../espacetroc.php')" class="btn btn-raised btn-danger">X</button>
                    </div>
                </div><!--fin div container -->
            </div>
        </div>


        <?php
        require('link/script.php');
        ?>
    </body>
</html>
