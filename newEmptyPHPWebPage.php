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
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <!--Formulaire POUR CRÉATION PROFIL-->
        <div class="row">
            <div class="col-sm-12 d-flex justify-content-center">
                <form name="inscription" action="" method="POST" id="hello">
                    <h1>Inscription</h1>

                    <div><label>Civilité: </label></div>
                    <select name="gender"> 
                        <option  value="" selected disabled></option>
                        <option  value="MR" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MR') ? 'selected' : ''; //ternaire qui permet de garder les valeurs inscrites à l'envoi        ?>>MR</option>
                        <option  value="MME" <?= (isset($_POST['gender']) && $_POST['gender'] == 'MME') ? 'selected' : ''//ternaire qui permet de garder les valeurs inscrites à l'envoi;         ?>>MME</option>
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



        <div class="menunavVertical">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Home</a>
                <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Profile</a>
                <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
            </div>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">..okkkkk.</div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">..weeeep.</div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">.olleeeeee..</div>
            <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">..wiiiiiiiii.</div>
        </div>


        <?php
//        Permet verif password
        //On test la valeur password dans l'array $_POST, si elle existe via premier if
        if (isset($_POST['users_password'])) {
        // Variable password qui vérifie que les caractères speciaux soit converties en entité html via password_hash = protection
        $users->users_password = password_hash($_POST['users_password'], PASSWORD_DEFAULT);
        // On test que la variable n'est pas égale à la regex
        if (!preg_match($regexPassword, $users->users_password)) {
        // J'affiche l'erreur
        $errorArray['users_password'] = 'Mot de passe à 6 caractères minimum';
        } //puis vérif si vide
        if (empty($users->users_password)) {
        // J'affiche le message d'erreur
        $errorArray['users_password'] = 'Veuillez saisir un mot de passe';
        }
        }

//permet de récuperer ls données session
        if (isset($_POST['sendButton']) && (count($errorsArray) == 0)) {
        //stocke les cookies
        $_SESSION['pseudo'] = $_POST['pseudo'];
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
        //header('location:../View/monprofilView.php');
        }
        ?>
        
            <?php } else { ?>
            <div><?= 'Bonjour ' . $usersObj->users_pseudo . ' votre compte a bien été crée.' ?></div>
        <?php } ?>
           
            
            <?php if (isset($_SESSION['userlogin'])) { ?>
        Bienvenue  <a href="moncompte.php" class="userprofil" ><i class="far fa-user"></i></a> 
    <?= $_SESSION['users_login'] ?>
        
        
            <!--button lié au modal dans l'index-->
             <button id="modalbutton" class="btn btn-raised btn-primary" data-toggle="modal" data-target="#pageconnexion">Connexion</button>
    </body>
</html>
