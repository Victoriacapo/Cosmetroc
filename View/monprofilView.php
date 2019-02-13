<?php
// appel du controller controller
include_once('../Controller/controllermonProfil.php');

session_start();
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
                                    <option  value="MR" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MR') ? 'selected' : ''; //ternaire qui permet de garder les valeurs inscrites à l'envoi                           ?>>MR</option>
                                    <option  value="MME" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MME') ? 'selected' : ''//ternaire qui permet de garder les valeurs inscrites à l'envoi;                            ?>>MME</option>
                                </select>
                                <span class="error"><?= isset($errorsArray['gender']) ? $errorsArray['gender'] : ''; ?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="lastname"> Veuillez entrer votre nom</label>
                                <input type="text" name="lastname" class="form-control" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                                <span class="error"><?= isset($errorsArray['lastname']) ? $errorsArray['lastname'] : ''; ?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="firstname">Prénom:</label>
                                <input type="text" name="firstname" class="form-control" value="<?= isset($_POST['firstname']) ? $firstname : ''; ?>" />
                                <span class="error"><?= isset($errorsArray['firstname']) ? $errorsArray['firstname'] : ''; ?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="email">Email:</label>
                                <input type="text"  name="email" class="form-control" placeholder="email@domaine.com" value="<?= isset($_POST['email']) ? $email : ''; ?>" />
                                <span class="error"><?= isset($errorsArray['email']) ? $errorsArray['email'] : ''; ?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="adress">Adresse:</label>
                                <input type="text" name="adress" class="form-control" value="<?= isset($_POST['adress']) ? $adress : ''; ?>" />
                                <span class="error"><?= isset($errorsArray['adress']) ? $errorsArray['adress'] : ''; ?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="zipcode">Code postal:</label>
                                <input type="text" name="zipcode" class="form-control" value="<?= isset($_POST['zipcode']) ? $zipcode : ''; ?>" />
                                <span class="error"><?= isset($errorsArray['zipcode']) ? $errorsArray['zipcode'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="phonenumber">Téléphone:</label>
                                <input type="tel" name="phonenumber" class="form-control" value="<?= isset($_POST['phonenumber']) ? $phonenumber : ''; ?>" />
                                <span class="error"><?= isset($errorsArray['phonenumber']) ? $errorsArray['phonenumber'] : ''; ?></span>
                            </div>
                            <div class="form-group">
                                <label for="pseudo">Pseudo:</label>
                                <input type="text" name="pseudo" class="form-control" value="<?= isset($_POST['pseudo']) ? $pseudo : ''; ?>" />
                                <span class="error"><?= isset($errorsArray['pseudo']) ? $errorsArray['pseudo'] : ''; ?></span>
                            </div>
                            <div id="sendButton"><input type="submit" class="btn btn-raised btn-primary"  name="sendButton" value="Envoyer" /></div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
        require('link/script.php');
        ?>
    </body>
</html>
