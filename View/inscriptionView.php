<?php
session_start();
// appel du controller controllerInscription
include_once('../Controller/controllerInscription.php');

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
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/styleForm.css">
        <title>Inscription</title>
    </head>
    <body>
        <div class="container-fluid">
            <!--Formulaire POUR CRÉATION PROFIL-->
            <div class="row">
                <div class="col-sm-12 d-flex justify-content-center">
                    <form name="inscription" action="" method="POST" id="hello">
                        <h1>Inscription</h1>

                        <div><label>Civilité: </label></div>
                        <select name="gender"> 
                            <option  value="" selected disabled></option>
                            <option  value="MR" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MR') ? 'selected' : ''; //ternaire qui permet de garder les valeurs inscrites à l'envoi     ?>>MR</option>
                            <option  value="MME" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MME') ? 'selected' : ''//ternaire qui permet de garder les valeurs inscrites à l'envoi;      ?>>MME</option>
                        </select>
                        <span class="error"><?= isset($errorsArray1['gender']) ? $errorsArray1['gender'] : ''; ?></span>

                        <div><label for="pseudo">Pseudo: </label></div>
                        <input type="text" name="pseudo" id="pseudo" placeholder="pseudo24" value="<?= isset($_POST['pseudo']) ? $pseudo : ''; ?>"/><!--ternaire qui permet que les données saisie reste -->
                        <span class="error"><?= isset($errorsArray1['pseudo']) ? $errorsArray1['pseudo'] : ''; ?></span>

                        <div><label for="password">Mot de passe: </label></div>
                        <p>(6 caractères minimum, comprenant 1 majuscule et 1 miniscule)</p>
                        <input type="password" name="password" id="pseudo" placeholder="Monmotdepasse34" value="<?= isset($_POST['password']) ? $password : ''; ?>"/>
                        <span class="error"><?= isset($errorsArray1['password']) ? $errorsArray1['password'] : ''; ?></span>

                        <div><label for="email">Email: </label></div>
                        <input type="email" name="email" id="pseudo" placeholder="email@domaine.com" value="<?= isset($_POST['email']) ? $email : ''; ?>"/>
                        <span class="error"><?= isset($errorsArray1['email']) ? $errorsArray1['email'] : ''; ?></span>
                        <div><input id="button" type="submit" name="sendButton" value="Envoyer" /></div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
