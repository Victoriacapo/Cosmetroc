<?php
// appel du controller controller
include_once('../Controller/controllermonProfil.php');
?>
<!DOCTYPE html>
<html lang="fr">
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
        <title>Informations complémentaires</title>
    </head>

    <body id="profil">
        <div class="container-fluid profil">
            <form id="profilForm" name="Profil" action="" method="POST">
                <h1 class="profilFormH1">Informations complémentaires</h1>
                <div class="form-group"> 
                    <label>Civilité: </label>
                    <select name="gender" class="form-control"> 
                        <option  value="" selected disabled></option>
                        <option  value="MR" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MR') ? 'selected' : ''; //ternaire qui permet de garder les valeurs inscrites à l'envoi                      ?>>MR</option>
                        <option  value="MME" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MME') ? 'selected' : ''//ternaire qui permet de garder les valeurs inscrites à l'envoi;                       ?>>MME</option>
                    </select>
                    <span class="error"><?= isset($errorsArray2['gender']) ? $errorsArray2['gender'] : ''; ?></span>
                </div>
                <div class="form-group"> 
                    <label for="lastname"> Veuillez entrer votre nom</label>
                    <input type="text" name="lastname" class="form-control" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                    <span class="error"><?= isset($errorsArray2['lastname']) ? $errorsArray2['lastname'] : ''; ?></span>
                </div>
                <div class="form-group"> 
                    <label for="firstname">Prénom:</label>
                    <input type="text" name="firstname" class="form-control" value="<?= isset($_POST['firstname']) ? $firstname : ''; ?>" />
                    <span class="error"><?= isset($errorsArray2['firstname']) ? $errorsArray2['firstname'] : ''; ?></span>
                </div>
                <div class="form-group"> 
                    <label for="email">Email:</label>
                    <input type="text"  name="email" class="form-control" placeholder="email@domaine.com" value="<?= isset($_POST['email']) ? $email : ''; ?>" />
                    <span class="error"><?= isset($errorsArray2['email']) ? $errorsArray2['email'] : ''; ?></span>
                </div>
                <div class="form-group"> 
                    <label for="adress">Adresse:</label>
                    <input type="text" name="adress" class="form-control" value="<?= isset($_POST['adress']) ? $adress : ''; ?>" />
                    <span class="error"><?= isset($errorsArray2['adress']) ? $errorsArray2['adress'] : ''; ?></span>
                </div>
                <div class="form-group"> 
                    <label for="zipcode">Code postal:</label>
                    <input type="text" name="zipcode" class="form-control" value="<?= isset($_POST['zipcode']) ? $zipcode : ''; ?>" />
                    <span class="error"><?= isset($errorsArray2['zipcode']) ? $errorsArray2['zipcode'] : ''; ?></span>
                </div>
                <div class="form-group">
                    <label for="phonenumber">Téléphone:</label>
                    <input type="tel" name="phonenumber" class="form-control" value="<?= isset($_POST['phonenumber']) ? $phonenumber : ''; ?>" />
                    <span class="error"><?= isset($errorsArray2['phonenumber']) ? $errorsArray2['phonenumber'] : ''; ?></span>
                </div>

                <div id="sendButton"><input type="submit" class="btn btn-raised btn-primary"  name="sendButton" value="Envoyer" /></div>
            </form>
        </div>



        <script type="text/javascript" src="js/mdb.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js"  crossorigin="anonymous"></script>
        <script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" crossorigin="anonymous"></script>
        <script>$(document).ready(function () {
                $('body').bootstrapMaterialDesign();
            });</script>
    </body>
</html>
