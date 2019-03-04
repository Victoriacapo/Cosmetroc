<?php
session_start();

// appel du controller controller
include_once('../Controller/controllermonProfil.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
        require('link/header.php');
        ?>
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/styleForm.css">
        <title>Profil</title>
    </head>

    <body id="profil">

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
                <div class="col-sm-12 col-lg-6 profil">
                    <form name="Profil" action="" method="POST">
                        <h1 class="profilFormH1">Profil</h1>
                        <div class="form-group"> 
                            <label>Civilité: </label>
                            <select name="gender" class="form-control"> 
                                <option  value="" selected disabled></option>
                                <option  value="MR" <?= (isset($_POST['gender'])) && $_POST['gender'] == 'MR'  ? $_POST['gender'] : $profil->users_gender == 'MR' ? 'selected' : ''; //ternaire qui permet de garder les valeurs inscrites à l'envoi  ?>>MR</option>
                                <option  value="MME" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MME') ? $_POST['gender'] : $profil->users_gender == 'MME' ? 'selected' : ''; //ternaire qui permet de garder les valeurs inscrites à l'envoi  ?>>MME</option>
                                                   
                            </select>
                            <span class="error"><?= isset($errorsArray['gender']) ? $errorsArray['gender'] : ''; ?></span>
                        </div>
                        <div class="form-group"> 
                            <label for="lastname">Nom: </label>
                            <input type="text" name="lastname" class="form-control" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : $profil->users_lastname ?>" />
                            <span class="error"><?= isset($errorsArray['lastname']) ? $errorsArray['lastname'] : ''; ?></span>
                        </div>
                        <div class="form-group"> 
                            <label for="firstname">Prénom: </label>
                            <input type="text" name="firstname" class="form-control" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : $profil->users_firstname ?>" />
                            <span class="error"><?= isset($errorsArray['firstname']) ? $errorsArray['firstname'] : ''; ?></span>
                        </div>
                        <div class="form-group"> 
                            <label for="address">Adresse: </label>
                            <input type="text" name="address" class="form-control" value="<?= isset($_POST['address']) ? $_POST['address'] : $profil->users_address ?>" />
                            <span class="error"><?= isset($errorsArray['address']) ? $errorsArray['address'] : ''; ?></span>
                        </div>
                        <div class="form-group"> 
                            <label for="city">Ville: </label>
                            <input type="text" name="city" class="form-control" value="<?= isset($_POST['city']) ? $_POST['city'] : $profil->users_city ?>" />
                            <span class="error"><?= isset($errorsArray['city']) ? $errorsArray['city'] : ''; ?></span>
                        </div>
                        <div class="form-group"> 
                            <label for="zipcode">Code postal: </label>
                            <input type="text" name="zipcode" class="form-control" value="<?= isset($_POST['zipcode']) ? $_POST['zipcode'] : $profil->users_CP ?>" />
                            <span class="error"><?= isset($errorsArray['zipcode']) ? $errorsArray['zipcode'] : ''; ?></span>
                        </div>
                        <div class="form-group"> 
                            <label for="email">Email: </label>
                            <input type="email"  name="email" class="form-control" placeholder="email@domaine.com" value="<?= isset($_POST['email']) ? $_POST['email'] : $profil->users_email ?>" />
                            <span class="error"><?= isset($errorsArray['email']) ? $errorsArray['email'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Téléphone: </label>
                            <input type="tel" name="phone" class="form-control" value="<?= isset($_POST['phone']) ? $_POST['phone'] : $profil->users_phone ?>" />
                            <span class="error"><?= isset($errorsArray['phone']) ? $errorsArray['phone'] : ''; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="pseudo">Pseudo: </label>
                            <input type="text" name="pseudo" class="form-control" value="<?= isset($_POST['pseudo']) ? $_POST['pseudo'] : $profil->users_pseudo ?>" />
                            <span class="error"><?= isset($errorsArray['pseudo']) ? $errorsArray['pseudo'] : ''; ?></span>
                        </div>
                        <div id="sendButton"><input type="submit" class="btn btn-raised btn-primary"  name="sendButton" value="Compléter" /></div>
                    </form>
                   
                    <div id="closebutton">
                        <button type="button" onclick="(window.location = '../espacetroc.php')" class="btn btn-raised btn-danger">X</button>
                    </div>
                    
                </div>
            </div>
        </div>

        <?php
        require('link/script.php');
        ?>
    </body>
</html>
