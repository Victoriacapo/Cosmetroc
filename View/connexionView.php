<?php
session_start();
// appel du controller controller
include_once('../Controller/controllerConnexion.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
        require('link/header.php');
        ?>
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/styleForm.css">
        <title>Connexion</title>
    </head>

    <body id="connexion">
        
        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <!--bouton retour-->
                    <button onclick="(window.location = '../index.php')" class="returnButton"><i class="fas fa-arrow-left"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 col-lg-6 connexion">

                    <!--Formulaire pour connexion-->
                    <form name="Connexion" action="" method="POST">
                        <h1 class="connexionFormH1">Connexion</h1>
                        <div class="form-group"> 
                            <label for="pseudo">Pseudo: </label>
                            <input type="text" name="pseudo" class="form-control" value="<?= isset($_POST['pseudo']) ? $usersObj->users_pseudo : ''; ?>" required/><!--ternaire qui permet que les données saisie reste -->
                            <span class="error"><?= isset($errorsArray['pseudo']) ? $errorsArray['pseudo'] : ''; ?></span>
                        </div>
                        <div class="form-group"> 
                            <label for="password">Mot-de-passe: </label>
                            <input type="password" name="password" class="form-control" value="<?= isset($_POST['password']) ? $usersObj->users_password : ''; ?>" required/>
                            <span class="error"><?= isset($errorsArray['password']) ? $errorsArray['password'] : ''; ?></span>
                        </div>
                        <div id="sendButton"> <input type="submit" class="btn btn-raised btn-primary" name="sendButton" value="Connexion" /></div>
                    </form>

                    <div id="closebutton">
                        <button type="button" onclick="(window.location = '../index.php')" class="btn btn-raised btn-danger">X</button>
                    </div>

                </div>
            </div>
        </div>



        <?php
        require('link/script.php');
        ?>
    </body>
</html>

