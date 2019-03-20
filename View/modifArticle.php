<?php
session_start();
// appel du controller controllerAjout-article
include_once('../Controller/controllerModifArticle.php');
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
        <title>Modif-article</title>
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
                    

                    <?php if ($showForm) { //applique ma booleenne pr afficher/cacher mon form 
                    if ($filePdt->products_validate == 0) { //condition si la variable $filePdt == 0, indiquer à l'utilisateur que son produit est en cours de validation'?>

                        <div class="alert alert-dark" role="alert">
                            Votre article n'est pas encore visible sur le site, il sera traité par l'administrateur.
                        </div>
                     <?php   }  ?>
                        <form name="addProduit" action="modifArticle.php" method="POST" enctype="multipart/form-data">
                            <h1 class="ArticleFormH1">Modification Article</h1>

                            <div class="row">
                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label for="nameproduct">Nom du produit: </label>
                                    <input type="text" name="nameproduct" class="form-control" value="<?= isset($nameproduct) ? $nameproduct : $filePdt->products_name ?>"/><!--ternaire qui permet que les données saisie reste -->
                                    <span class="error"><?= isset($errorsArray['nameproduct']) ? $errorsArray['nameproduct'] : ''; ?></span>
                                </div>

                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label for="brand">Marque: </label>
                                    <input type="text" name="brand" class="form-control" value="<?= isset($_POST['brand']) ? $_POST['brand'] : $filePdt->products_brand ?>"/><!--ternaire qui permet que les données saisie reste -->
                                    <span class="error"><?= isset($errorsArray['brand']) ? $errorsArray['brand'] : ''; ?></span>
                                </div>

                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label>Quantité: </label>
                                    <select name="quantity" class="form-control"> 
                                        <option value="" selected disabled></option>
                                        <!--Si la variable $quantity  est récupéré et qu’elle est égale à 1, afficher $quantity sinon afficher l’objet (qui contient la valeur  initiale)-->
                                        <option value="1" <?= isset($quantity) && $quantity == 1 ? $quantity : $filePdt->products_quantity == '1' ? 'selected' : '' ?>>1</option> <!--ternaire qui permet de garder les valeurs inscrites à l'envoi -->
                                        <option value="2" <?= isset($quantity) && $quantity == 2 ? $quantity : $filePdt->products_quantity == '2' ? 'selected' : '' ?>>2</option>
                                        <option value="3" <?= isset($quantity) && $quantity == 3 ? $quantity : $filePdt->products_quantity == '3' ? 'selected' : '' ?>>3</option>
                                        <option value="4" <?= isset($quantity) && $quantity == 4 ? $quantity : $filePdt->products_quantity == '4' ? 'selected' : '' ?>>4</option>
                                        <option value="5" <?= isset($quantity) && $quantity == 5 ? $quantity : $filePdt->products_quantity == '5' ? 'selected' : '' ?>>5</option>
                                    </select>
                                    <span class="error"><?= isset($errorsArray['quantity']) ? $errorsArray['quantity'] : ''; ?></span>
                                </div>

                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label>Etat: </label>
                                    <select name="state" class="form-control"> 
                                        <option value=""selected disabled></option>
                                        <option value="neuf" <?= isset($state) && $state == 'neuf' ? $state : $filePdt->products_state == 'neuf' ? 'selected' : '' ?>>Neuf</option> 
                                        <option value="testé" <?= isset($state) && $state == 'testé' ? $state : $filePdt->products_state == 'testé' ? 'selected' : '' ?>>testé</option> 
                                        <option value="Utilisé + de 5 fois" <?= isset($state) && $state == 'Utilisé + de 5 fois' ? $state : $filePdt->products_state == 'Utilisé + de 5 fois' ? 'selected' : '' ?>>Utilisé + de 5 fois</option> 
                                    </select>
                                    <span class="error"><?= isset($errorsArray['state']) ? $errorsArray['state'] : ''; ?></span>
                                </div>

                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label for="capacity">Capacité: </label>
                                    <input type="text" name="capacity" class="form-control" value="<?= isset($_POST['capacity']) ? $_POST['capacity'] : $filePdt->products_capacity ?>"/><!--ternaire qui permet que les données saisie reste -->
                                    <span class="error"><?= isset($errorsArray['capacity']) ? $errorsArray['capacity'] : ''; ?></span>
                                </div>

                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label for="expiration">Date d'expiration: </label>
                                    <input type="date" name="expiration" class="form-control" value="<?= isset($_POST['expiration']) ? $_POST['expiration'] : date('Y-m-d', strtotime($filePdt->products_expiration)); ?>"/><!--La date d’expiration est formaté  au format français dans la vue-->
                                    <span class="error"><?= isset($errorsArray['expiration']) ? $errorsArray['expiration'] : ''; ?></span>
                                </div>

                                <div class="form-group col-lg-4 col-sm-6"> 
                                    <label>Catégorie: </label>
                                    <select name="category" class="form-control"> 
                                        <option value="" selected disabled>Choix</option>
                                        <?php
                                        foreach ($showMncat as $Maincat) { //boucle pour afficher les categories de la Bdd
                                            ?>
                                            <!-- Si la variable $category est récupéré et qu’elle est égale  $Maincat->maincat_id, afficher $category , sinon $Maincat->maincat_id == à la valeur initiale-->
                                            <option value="<?= $Maincat->maincat_id ?>" <?= isset($category) && $category == $Maincat->maincat_id ? $category : $Maincat->maincat_id == $filePdt->maincat_id ? 'selected' : '' ?>><?= $Maincat->maincat_name ?></option> 
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
                                            <option value="<?= $subcat->subcat_id ?>" <?= isset($sbcategory) && $sbcategory == $subcat->subcat_id ? $sbcategory : $subcat->subcat_id == $filePdt->subcat_id ? 'selected' : '' ?>><?= $subcat->subcat_name ?></option> 
                                            <?php
                                        }
                                        ?>
                                    </select>
                                    <span class="error"><?= isset($errorsArray['sbcategory']) ? $errorsArray['sbcategory'] : ''; ?></span>
                                </div>


                                <div class="form-group col-lg-12 col-sm-12 Image">
                                    <label id="labelImg">Image du produit à troqué </label>
                                    <p><img class="img-fluid" src="<?= isset($filePdt->products_img) ? $filePdt->products_img : $OnepductsObj->products_img ?>" width="82" height="82"></p>
                                    <input type="file" name="image" class="form-control" value="<?= isset($_FILES['image']['name']) ? $_FILES['image']['name'] : $filePdt->products_img; ?>">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="2000000"><!--controle le format uploadé--> <!-- On limite le fichier à 2Mo -->
                                    <span class="error"><?= isset($errorsArray['image']) ? $errorsArray['image'] : ''; ?></span>
                                    <span class="succes"><?= isset($succesArray['image']) ? $succesArray['image'] : ''; ?></span>
                                    <span class="error"><?= isset($errorImage['image']) ? $errorImage['image'] : ''; ?></span>
                                </div>

                            </div><!--fin div row-->

                            <div id="sendButton"><input type="submit" class="btn btn-raised btn-primary" name="sendButton" value="Modifier" /></div>
                        </form>
                        <?php
                    } else { ?>
                    
                        <div id="message">
                        <h1 class="messageH1">Modification effectuée</h1>
                        <p><?= 'La modification de l\'article ' . $OnepductsObj->products_name .', a bien été effectué, il sera soumis à l\'administrateur pour validation. '
                        ?></p>

                        <ul class="list-group products">
                            <li class="list-group-item active">Nom du produit: <?= $OnepductsObj->products_name ?> </li>
                            <li class="list-group-item">Marque du produit: <?= $OnepductsObj->products_brand ?> </li>
                            <li class="list-group-item">Quantité: <?= $OnepductsObj->products_quantity ?></li>
                            <li class="list-group-item">Etat: <?= $OnepductsObj->products_state ?></li>
                            <li class="list-group-item">Capacité: <?= $OnepductsObj->products_capacity ?></li>
                            <li class="list-group-item">Expiration: <?= date('d/m/Y', strtotime($OnepductsObj->products_expiration)); ?> <!-- la variable $date est déclarer dns le controller, il contient l'attribut(products_expiration)-->
                            <li class="list-group-item"><img class="img-fluid" src="<?= $OnepductsObj->products_img?>" width="102" height="102"></li>
                        </ul>
                    </div>


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
