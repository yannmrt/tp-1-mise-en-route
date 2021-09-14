<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">TP 1 - Mise en route</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Accueil</a></li>
                        <!--<li class="nav-item"><a class="nav-link" href="#">Voir la map</a></li>-->
                            <?php 

                            if(isset($_SESSION["username"])) {
                                echo '<li class="nav-item"><a class="nav-link" href="logout.php">Déconnexion</a></li>';
                                if($_SESSION["admin"] == 1) {
                                    echo '<li class="nav-item"><a class="nav-link" href="admin/index.php">Administration</a></li>';
                                }
                            } else {
                                echo '<li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Espace membre</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="login.php">Connexion</a></li>
                                    <li><a class="dropdown-item" href="register.php">Inscription</a></li>
                                    <li><hr class="dropdown-divider" /></li>
                                    <li><a class="dropdown-item" href="pwreset.php">Mot de passe oublié ?</a></li>
                                </ul>
                            </li>';
                            }


                            ?>

                    </ul>
                </div>
            </div>
        </nav>