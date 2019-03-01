
<?php
// appel du controller controllerInscription
include_once('../Controller/controllerInscription.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <?php
        require('link/header.php');
        ?>
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/styleForm.css">
        <title>Inscription</title>
    </head>

    <body id="inscription">

        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 col-lg-6 ">
                    <!--bouton retour-->
                    <button onclick="(window.location = '../index.php')" class="returnButton"><i class="fas fa-arrow-left"></i></button>
                </div>
            </div>
        </div>

        <div class="container-fluid ">
            <div class="row">
                <div class="col-sm-12 col-lg-6 inscription">
                    <?php if ($showForm) { //applique ma booleenne pr afficher/cacher mon form?>
                        <form name="inscription" action="" method="POST">
                            <h1 class="inscriptionFormH1">Inscription</h1>
                            <div class="form-group"> 
                                <label>Civilité: </label>
                                <select name="gender" class="form-control"> 
                                    <option  value="" selected disabled></option>
                                    <option  value="MR" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MR') ? 'selected' : ''; //ternaire qui permet de garder les valeurs inscrites à l'envoi                                                       ?>>MR</option>
                                    <option  value="MME" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MME') ? 'selected' : ''; //ternaire qui permet de garder les valeurs inscrites à l'envoi;                                                        ?>>MME</option>
                                </select>
                                <span class="error"><?= isset($errorsArray['gender']) ? $errorsArray['gender'] : ''; ?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="pseudo">Pseudo: </label>
                                <input type="text" name="pseudo" class="form-control" value="<?= isset($_POST['pseudo']) ? $usersObj->users_pseudo : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
                                <span class="error"><?= isset($errorsArray['pseudo']) ? $errorsArray['pseudo'] : ''; ?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="password">Mot de passe: (6 caractères minimum, comprenant 1 majuscule et 1 miniscule)</label>
                            
                                <input type="password" name="password" class="form-control" value="<?= isset($_POST['password']) ? $usersObj->users_password : ''; ?>"/>
                                <span class="error"><?= isset($errorsArray['password']) ? $errorsArray['password'] : ''; ?></span>
                            </div>
                            <div class="form-group"> 
                                <label for="email" class="bmd-label-floating">Email: </label>
                                <input type="email" name="email" class="form-control" value="<?= isset($_POST['email']) ? $usersObj->users_email : ''; ?>"/>
                                <span class="error"><?= isset($errorsArray['email']) ? $errorsArray['email'] : ''; ?></span>
                            </div>

                            <div id="sendButton">
                                <input type="submit" class="btn btn-raised btn-primary" name="sendButton" value="Envoyer" />
                            </div>
                        </form>

                    <?php } else { ?>
                        <div id="message">
                            <h1 class="messageH1">Inscription</h1>
                            <p><?= 'Bienvenue ' . $usersObj->users_pseudo . ' , votre inscription à bien été pris en compte ' ?></p>
                        </div>
                    <?php } ?>

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
