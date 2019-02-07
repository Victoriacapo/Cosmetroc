<?php
session_start();
// appel du controller controllerInscription
include_once('Controller/controllerInscription.php');

//permet qu'une fois mon formulaire complet et envoyé, d'être redirigé ver la page mon profil
if (isset($_POST['submit']) && (count($errorsArray) == 0)) {
    $_SESSION['gender'] = $_POST['gender']; //stocke les cookies
    $_SESSION['pseudo'] = $_POST['pseudo'];
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['email'] = $_POST['email'];
    header('location:../View/monprofilView.php');
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/styleForm.css">

        <title>Inscription</title>
    </head>
    <body>
        <div class="container-fluid">
            <!-- The Modal -->
            <div class="modal" id="pageInscription"><!--Id permet de lier le modal au bouton situé dans la page index.php-->
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Inscription</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <!--Formulaire POUR CRÉATION PROFIL-->

                            <form name="inscription" action="index.php" method="POST" novalidate>
                                <div class="form-group"> 
                                    <label>Civilité: </label>
                                    <select name="gender" class="form-control"> 
                                        <option  value="" selected disabled></option>
                                        <option  value="MR" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MR') ? 'selected' : ''; //ternaire qui permet de garder les valeurs inscrites à l'envoi                                         ?>>MR</option>
                                        <option  value="MME" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MME') ? 'selected' : ''; //ternaire qui permet de garder les valeurs inscrites à l'envoi;                                          ?>>MME</option>
                                    </select>
                                    <span class="error"><?= isset($errorsArray['gender']) ? $errorsArray['gender'] : ''; ?></span>
                                </div>
                                <div class="form-group"> 
                                    <label for="pseudo">Pseudo: </label>
                                    <input type="text" name="pseudo" class="form-control" value="<?= isset($_POST['pseudo']) ? $pseudo : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
                                    <span class="error"><?= isset($errorsArray['pseudo']) ? $errorsArray['pseudo'] : ''; ?></span>
                                </div>
                                <div class="form-group"> 
                                    <label for="password">Mot de passe: (6 caractères minimum, comprenant 1 majuscule et 1 miniscule)</label>
                                    <!--<span class="bmd-help">(6 caractères minimum, comprenant 1 majuscule et 1 miniscule)</span>-->
                                    <input type="password" name="password" class="form-control" value="<?= isset($_POST['password']) ? $password : ''; ?>"/>
                                    <span class="error"><?= isset($errorsArray['password']) ? $errorsArray['password'] : ''; ?></span>
                                </div>
                                <div class="form-group"> 
                                    <label for="email" class="bmd-label-floating">Email: </label>
                                    <input type="email" name="email" class="form-control" value="<?= isset($_POST['email']) ? $email : ''; ?>"/>
                                    <span class="error"><?= isset($errorsArray['email']) ? $errorsArray['email'] : ''; ?></span>
                                </div>

                                <div id="sendButton"><input type="submit" class="btn btn-raised btn-primary"  name="sendButton" value="Envoyer" /></div>
                            </form>

                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-raised btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>  
        </div>


    </body>
</html>
