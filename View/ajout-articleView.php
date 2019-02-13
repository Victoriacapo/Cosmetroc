<?php
session_start();
// appel du controller controllerAjout-article
include_once('../Controller/controllerAjout-article.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Material Design for Bootstrap fonts and icons -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <!-- Material Design for Bootstrap CSS -->
        <link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" crossorigin="anonymous">
        <!-- fontawesome --> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" crossorigin="anonymous">
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/styleForm.css">
        <title>Ajout-article</title>
    </head>
    <body id="Article">

        <!--bouton retour-->
        <div><button onclick="(window.location = '../espacetroc.php')" class="returnButton"><i class="fas fa-arrow-left"></i></button></div>

        <div class="container-fluid Article">
            <h1 class="ArticleFormH1">Article</h1>

            <!--partie form pr uploader image-->
            <form id="ArticleForm" name="ajoutProduit" action="ajout-articleView.php" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="image">Image du produit à troqué </label>
                    <input type="file" name="image" class="form-control">
                    <input type="hidden" name="MAX_FILE_SIZE" value="100000"><!--controle le format uploadé--> <!-- On limite le fichier à 100Ko -->
                    <span class="error"><?= isset($errorsArray['image']) ? $errorsArray['image'] : ''; ?></span>
                </div>

                <!--partie select-->
                <div class="row">
                    <div class="form-group col-lg-4 col-sm-6"> 
                        <label>Catégorie: </label>
                        <select name="category" class="form-control"> 
                            <option value="" selected disabled></option>
                            <option value="Maquillage" <?= (isset($_POST['category']) && $_POST['category'] == 'Maquillage') ? 'selected' : ''; ?>>Maquillage</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                            <option value="Soin_Visage" <?= (isset($_POST['category']) && $_POST['category'] == 'Soin_Visage') ? 'selected' : ''; ?>>Soin Visage</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                            <option value="Soin_Corps" <?= (isset($_POST['category']) && $_POST['category'] == 'Soin_Corps') ? 'selected' : ''; ?>>Soin Corps</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                        </select>
                        <span class="error"><?= isset($errorsArray['category']) ? $errorsArray['category'] : ''; ?></span>
                    </div>

                    <div class="form-group col-lg-4 col-sm-6"> 
                        <label>Sous-Catégorie: </label>
                        <select name="sbcategory" class="form-control"> 
                            <option value="" selected disabled></option>
                            <option value="dyed" <?= (isset($_POST['category']) && $_POST['category'] == 'dyed') ? 'selected' : ''; ?>>Teint</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                            <option value="eyes" <?= (isset($_POST['category']) && $_POST['category'] == 'eyes') ? 'selected' : ''; ?>>Yeux</option>
                            <option value="lips" <?= (isset($_POST['category']) && $_POST['category'] == 'lips') ? 'selected' : ''; ?>>Lèvre</option>
                            <option value="Cleansing" <?= (isset($_POST['category']) && $_POST['category'] == 'Cleansing') ? 'selected' : ''; ?>>Nettoyant/Démaquillant</option>
                            <option value="FaceCream" <?= (isset($_POST['category']) && $_POST['category'] == 'FaceCream') ? 'selected' : ''; ?>>Crème</option>
                            <option value="scrub" <?= (isset($_POST['category']) && $_POST['category'] == 'scrub') ? 'selected' : ''; ?>>Masque/Gommage</option>
                            <option value="scrub" <?= (isset($_POST['category']) && $_POST['category'] == 'scrub') ? 'selected' : ''; ?>>Masque/Gommage</option>
                            <option value="scrub" <?= (isset($_POST['category']) && $_POST['category'] == 'scrub') ? 'selected' : ''; ?>>Masque/Gommage</option>
                            <option value="FDT" <?= (isset($_POST['sbcategory']) && $_POST['sbcategory'] == 'FDT') ? 'selected' : ''; ?>>Fond de Teint</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                            <option value="powder" <?= (isset($_POST['sbcategory']) && $_POST['sbcategory'] == 'powder') ? 'selected' : ''; ?>>Poudre</option>
                            <option value="blush" <?= (isset($_POST['sbcategory']) && $_POST['sbcategory'] == 'blush') ? 'selected' : ''; ?>>Blush</option>
                            <option value="concealer" <?= (isset($_POST['sbcategory']) && $_POST['sbcategory'] == 'concealer') ? 'selected' : ''; ?>>Anticerne</option>
                            <option value="highlighter" <?= (isset($_POST['sbcategory']) && $_POST['sbcategory'] == 'highlighter') ? 'selected' : ''; ?>>Illuminateur</option>
                            <option value="foundation" <?= (isset($_POST['sbcategory']) && $_POST['sbcategory'] == 'foundation') ? 'selected' : ''; ?>>Base de Teint</option>
                        </select>
                        <span class="error"><?= isset($errorsArray['sbcategory']) ? $errorsArray['sbcategory'] : ''; ?></span>
                    </div>

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
                            <option value="dyed" <?= (isset($_POST['state']) && $_POST['state'] == 'dyed') ? 'selected' : ''; ?>>Neuf</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                            <option value="dyed" <?= (isset($_POST['state']) && $_POST['state'] == 'dyed') ? 'selected' : ''; ?>>testé</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                            <option value="dyed" <?= (isset($_POST['state']) && $_POST['state'] == 'dyed') ? 'selected' : ''; ?>>Utilisé + de 5 fois</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                        </select>
                        <span class="error"><?= isset($errorsArray['state']) ? $errorsArray['state'] : ''; ?></span>
                    </div>
                    <!-- /partie select-->

                </div> <!--fin div row -->

                <div id="sendButton"><input type="submit" class="btn btn-raised btn-primary" name="sendButton" value="Envoyer" /></div>

            </form>
        </div><!--fin div container -->




        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"  crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" crossorigin="anonymous"></script>
        <script>$(document).ready(function () {
                $('body').bootstrapMaterialDesign();
            });
        </script>
    </body>
</html>
