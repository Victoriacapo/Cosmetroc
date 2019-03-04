<?php
// appel du controller controllerZipcode
include_once('Controller/controllerZipcode.php');

//permet qu'une fois mon formulaire complet et envoyé, d'être redirigé ver la page inscription
if (!isset($errorsArray['zipCode']) && isset($_POST['sendButton'])) {
    header('location:View/inscriptionView.php'); //redirection vers la page inscription si le code postal est correct.
}
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
            <div class="modal" id="pageZipcode"><!--Id permet de lier le modal au bouton situé dans la page index.php-->
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Code Postal</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">
                            <!--Formulaire POUR CODE POSTAL-->
                            <form name="ok" action="index.php" method="POST" novalidate>
                                <h1>Vérification adresse</h1>
                                <label for="zipCode">Veuillez entrer votre code postal </label>
                                    <input type="text" placeholder="34000" name="zipCode" id="zipCode" value="<?= isset($_POST['zipCode']) ? $zipCode : ''; ?>"/><!--ternaire pr que la valeur saisie ne soit pas refresh -->
                                    <span class="error"><?= isset($errorsArray['zipCode']) ? $errorsArray['zipCode'] : ''; ?></span>
                                <input type="submit" name="sendButton" value="Envoyer" />
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
