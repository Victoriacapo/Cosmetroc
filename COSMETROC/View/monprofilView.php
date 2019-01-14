<?php
// appel du controller controller
include_once('controllermonProfil.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <title>Informations complémentaires</title>
    </head>
    <body>
        <form name="Profil" action="" method="POST">

            <h1>Informations complémentaires</h1>

            <p><label for="lastname"> Veuillez entrer votre nom</label>
                <input type="text" placeholder="Doe" name="lastname" id="lastname" value="<?= isset($_POST['lastname']) ? $lastname : ''; ?>" />
                <span class="error"><?= isset($errorsArray2['lastname']) ? $errorsArray2['lastname'] : ''; ?></span></p>

            <p><label for="firstname"> Veuillez entrer votre prénom</label>
                <input type="text" placeholder="John" name="firstname" id="firstname" value="<?= isset($_POST['firstname']) ? $firstname : ''; ?>" />
                <span class="error"><?= isset($errorsArray2['firstname']) ? $errorsArray2['firstname'] : ''; ?></span></p>

            <p><label for="email"> Veuillez entrer votre email</label>
                <input type="text" placeholder="email@domaine.com" name="email" id="email" value="<?= isset($_POST['email']) ? $email : ''; ?>" />
                <span class="error"><?= isset($errorsArray2['email']) ? $errorsArray2['email'] : ''; ?></span></p>

            <p><label for="adress"> Veuillez entrer votre adresse</label>
                <input type="text" placeholder="10 rue des Mirabelles" name="adress" id="adress" value="<?= isset($_POST['adress']) ? $adress : ''; ?>" />
                <span class="error"><?= isset($errorsArray2['adress']) ? $errorsArray2['adress'] : ''; ?></span></p>

            <p><label for="zipcode"> Veuillez entrer votre code postal</label>
                <input type="text" placeholder="34000" name="zipcode" id="zipcode" value="<?= isset($_POST['zipcode']) ? $zipcode : ''; ?>" />
                <span class="error"><?= isset($errorsArray2['zipcode']) ? $errorsArray2['zipcode'] : ''; ?></span></p>

            <p><label for="phonenumber"> Veuillez entrer votre numéro de téléphone</label>
                <input type="tel" placeholder="0660 66 66 66" name="phonenumber" id="phonenumber" value="<?= isset($_POST['phonenumber']) ? $phonenumber : ''; ?>" />
                <span class="error"><?= isset($errorsArray2['phonenumber']) ? $errorsArray2['phonenumber'] : ''; ?></span></p>

            <input type="submit" value="envoyer" /> 

        </form>

        <?php
// put your code here
        ?>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    </body>
</html>
