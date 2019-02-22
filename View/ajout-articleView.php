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
                    <?php if ($showForm) { //applique ma booleenne pr afficher/cacher mon form?>
                        <!--partie form pr uploader image-->
                        <form name="addProduit" action="ajout-articleView.php" method="POST" enctype="multipart/form-data">
                            <h1 class="ArticleFormH1">Article</h1>

                            <!--partie select-->
                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label for="nameproduct">Nom du produit: </label>
                                    <input type="text" name="nameproduct" class="form-control" value="<?= isset($_POST['nameproduct']) ? $pductsObj->products_name : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
                                    <span class="error"><?= isset($errorsArray['nameproduct']) ? $errorsArray['nameproduct'] : ''; ?></span>
                                </div>

                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label for="brand">Marque: </label>
                                    <input type="text" name="brand" class="form-control" value="<?= isset($_POST['brand']) ? $pductsObj->products_brand : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
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
                                        <option value="neuf" <?= (isset($_POST['state']) && $_POST['state'] == 'neuf') ? 'selected' : ''; ?>>Neuf</option> 
                                        <option value="testé" <?= (isset($_POST['state']) && $_POST['state'] == 'testé') ? 'selected' : ''; ?>>testé</option> 
                                        <option value="Utilisé + de 5 fois" <?= (isset($_POST['state']) && $_POST['state'] == 'Utilisé + de 5 fois') ? 'selected' : ''; ?>>Utilisé + de 5 fois</option> 
                                    </select>
                                    <span class="error"><?= isset($errorsArray['state']) ? $errorsArray['state'] : ''; ?></span>
                                </div>

                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label for="capacity">Capacité: </label>
                                    <input type="text" name="capacity" class="form-control" value="<?= isset($_POST['capacity']) ? $pductsObj->products_capacity : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
                                    <span class="error"><?= isset($errorsArray['capacity']) ? $errorsArray['capacity'] : ''; ?></span>
                                </div>

                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label for="expiration">Date d'expiration: </label>
                                    <input type="date" name="expiration" class="form-control" value="<?= isset($_POST['expiration']) ? $pductsObj->products_expiration : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
                                    <span class="error"><?= isset($errorsArray['expiration']) ? $errorsArray['expiration'] : ''; ?></span>
                                </div>

                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label>Catégorie: </label>
                                    <select name="category" class="form-control"> 
                                        <option value="" selected disabled></option>
                                        <?php
                                        foreach ($showMncat as $Maincat) { //boucle pour afficher les categories de la Bdd
                                            ?>
                                            <option value="<?= $Maincat->maincat_id ?>" <?= (isset($_POST['category']) && $_POST['category'] == '') ? 'selected' : ''; ?>><?= $Maincat->maincat_name ?></option> <!--la variable à été gardé car je veux afficher le nom de catégorie et non l'id, l'attibut maincat_name n'est pas compris ds mes attribut ds mn model-->
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="error"><?= isset($errorsArray['category']) ? $errorsArray['category'] : ''; ?></span>
                                </div>


                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label>Sous-Catégorie: </label>
                                    <select name="sbcategory" class="form-control"> 
                                        <option value="" selected disabled></option>
                                        <?php
                                        foreach ($showSbcat as $subcat) { //boucle pour afficher les ss-categories de la Bdd
                                            ?>
                                            <option value="<?= $subcat->subcat_id ?>" <?= (isset($_POST['sbcategory']) && $_POST['sbcategory'] == '') ? 'selected' : ''; ?>><?= $subcat->subcat_name ?></option> <!--la variable à été gardé car je veux afficher le nom de catégorie et non l'id, l'attibut subcat_name n'est pas compris ds mes attribut ds mn model-->
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="error"><?= isset($errorsArray['sbcategory']) ? $errorsArray['sbcategory'] : ''; ?></span>
                                </div>


                                <div class="form-group col-lg-12 col-sm-12 Image">
                                    <label id="labelImg">Image du produit à troqué </label>
                                    <input type="file" name="image" class="form-control" value="<?= isset($_FILES['image']['name']) ? $pductsObj->products_img : ''; ?>">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"><!--controle le format uploadé--> <!-- On limite le fichier à 2Mo -->
                                    <span class="error"><?= isset($errorsArray['image']) ? $errorsArray['image'] : ''; ?></span>
                                    <span class="error"><?= isset($errorImage['image']) ? $errorImage['image'] : ''; ?></span>
                                    <span class="succes"><?= isset($succesArray['image']) ? $succesArray['image'] : ''; ?></span>
                                </div>

                            </div><!--fin div row-->

                            <div id="sendButton"><input type="submit" class="btn btn-raised btn-primary" name="sendButton" value="Envoyer" /></div>
                        </form>

                    <?php } else { ?>
                        <div id="message">
                            <h1 class="messageH1">Confirmation Ajout</h1>
                            <p><?= 'L\'article ' . $pductsObj->products_name . ' a bien été ajouté' ?></p>

                            <ul>
                                <li>Nom du produit: <?= $pductsObj->products_name ?> </li>
                                <li>Marque du produit: <?= $pductsObj->products_brand ?> </li>
                                <li>Quantité: <?= $pductsObj->products_quantity ?></li>
                                <li>Etat: <?= $pductsObj->products_state ?></li>
                                <li>Capacité: <?= $pductsObj->products_capacity ?></li>
                                <li>Expiration: <?= date('d/m/Y', strtotime($date)); ?> <!-- la variable $date est déclarer dns le controller, il contient l'attribut(products_expiration)-->
                            </ul>
                        </div>
                        <div id="plus"><button onclick="(window.location = 'ajout-articleView.php?id=<?= $_SESSION['idUser']; ?>')" class="btn btn-raised btn-primary">Ajouter un article</button></div>

                    <?php } ?>

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
