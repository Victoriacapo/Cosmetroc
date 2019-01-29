<?php
// appel du controller controller
include_once('Controller/controllerConnexion.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cosmetroc</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
         
 
            <!-- The Modal -->
            <div class="modal" id="pageconnexion">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Connexion</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <!--Formulaire pour connexion-->
                            <form name="Connexion" action="index.php" method="POST" novalidate>
                                <h1>Connexion</h1>
                                <label for="pseudo"> Veuillez entrer votre pseudo </label>
                                <input type="text" name="pseudo" id="pseudo" placeholder="pseudo24" value="<?= isset($_POST['pseudo']) ? $pseudo : ''; ?>" required/><!--ternaire qui permet que les données saisie reste -->
                                <span class="error"><?= isset($errorsArray1['pseudo']) ? $errorsArray1['pseudo'] : ''; ?></span>

                                <label for="password"> Veuillez choisir un mot de passe, 6 caractères minimum, comprenant 1 majuscule et 1 miniscule au minimum, et un caractère spécial</label>
                                <input type="password" name="password" id="pseudo" placeholder="Monmotdepasse34" value="<?= isset($_POST['password']) ? $password : ''; ?>" required/>
                                <span class="error"><?= isset($errorsArray1['password']) ? $errorsArray1['password'] : ''; ?></span>
                                <input type="submit" name="sendButton" value="Connexion" />
                            </form>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
</html>

