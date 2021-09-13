<?php

/**
 * 
 * On inclus les fichiers nécessaire au fonctionnement du site web
 * 
*/
require "../class/user.php";
require "../class/admin.php";
require "../inc/db.php";

if($_SESSION["admin"] == 0) {
    header("Location: ../index.php");
}

if(isset($_GET["id"])) {
    $_id = htmlspecialchars($_GET["id"]);
    $_ADMIN = new Admin($_PDO);
}

if(isset($_POST["name"])) {
    $_ADMIN->editTrame($_id, $_POST["longitude"], $_POST["latitude"], $_POST["name"]);
}

if($_GET["method"] == "delete") {
    $_ADMIN->delTrame($_id);
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

            <?php $_infoTram = $_ADMIN->getTrameInfo($_id); ?>
            <!-- Form connexion -->
            <form method="POST" action="">
                <div align="center">
                    <div class="form-group">
                        <label for="username">Nom</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo $_infoTram["name"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Longitude</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $_infoTram["longitude"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Latitude</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $_infoTram["latitude"]; ?>">
                        </div>
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
