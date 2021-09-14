<?php

/**
 * 
 * On inclus les fichiers nécessaire au fonctionnement du site web
 * 
*/
require "../class/user.php";
require "../inc/db.php";

if($_SESSION["admin"] == 0) {
    header("Location: ../index.php");
}

if(isset($_GET["id"])) {
    $_id = htmlspecialchars($_GET["id"]);
    $_USER = new User($_PDO);
}

if(isset($_POST["username"])) {
    $error = $_USER->editUser($_POST["username"], $_POST["email"], $_POST["securityPhrase"], $_POST["admin"], $_id);
}

if(isset($_GET["method"])) {
    if($_GET["method"] == "delete") {
        $_USER->delUser($_id);
    }
}

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Modifier une trame</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include("header.php"); ?> 
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>Modifier la trame n°<?php echo $_id; ?></h1>
                <p class="lead">Il est nécessaire de remplir tous les champs afin de modifier cette trame.</p>
            </div>

            <?php if(isset($error)) { echo $error; } ?>

            <?php $_infoUser = $_USER->getUserInfo($_id); ?>
            <!-- Form connexion -->
            <form method="POST" action="">
                <div align="center">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_infoUser["username"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <div class="col-sm-4">
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $_infoUser["email"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="securityPhrase">Phrase de sécurité</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="securityPhrase" name="securityPhrase" value="<?php echo $_infoUser["securityPhrase"]; ?>">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="admin">Permission</label>
                    <select id="admin" name="admin" class="form-control">

                            <?php
                            
                            if($_infoUser["admin"] == 0) {
                                echo "<option value='0' selected>Utilisateur</option>";
                                echo "<option value='1'>Administrateur</option>";
                            }

                            if($_infoUser["admin"] == 1) {
                                echo "<option value='1' selected>Administrateur</option>";
                                echo "<option value='0'>Utilisateur</option>";
                            }

                            ?>
                    </select>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>

        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
