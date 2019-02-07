<?php
// appel du controller controller
include_once('Controller/controllerConnexion.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- style -->
        <link rel="stylesheet" href="../assets/css/styleForm.css">
         
        <title></title>
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
                                <div class="form-group"> 
                                    <label for="pseudo">Veuillez entrer votre pseudo </label>
                                    <input type="text" name="pseudo" class="form-control" value="<?= isset($_POST['pseudo']) ? $pseudo : ''; ?>" required/><!--ternaire qui permet que les données saisie reste -->
                                    <span class="error"><?= isset($errorsArray['pseudo']) ? $errorsArray['pseudo'] : ''; ?></span>
                                </div>
                                <div class="form-group"> 
                                    <label for="password">Mot-de-passe</label>
                                    <input type="password" name="password" class="form-control" value="<?= isset($_POST['password']) ? $password : ''; ?>" required/>
                                    <span class="error"><?= isset($errorsArray['password']) ? $errorsArray['password'] : ''; ?></span>
                                </div>
                                <div id="sendButton"> <input type="submit" class="btn btn-raised btn-primary" name="sendButton" value="Connexion" /></div>
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

