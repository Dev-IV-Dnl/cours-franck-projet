<?php
session_start();

use App\Autoloader;

// $app = new Application();
// $app->demarrer();

include("Autoloader.php");

Autoloader::register();
// ou App\Autoloader::register(); si on utilise pas le use tout en haut !

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Police black Ops One-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    <!--CSS font-awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--CSS bootswatch-->
    <link rel="stylesheet" href="https://bootswatch.com/5/united/bootstrap.min.css">
    <!--CSS Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <!--MON CSS-->
    <link rel="stylesheet" href="/moto_mvc/View/assets/css/style.css">
    <title>moto_mvc</title>
</head>

<body>
    <center>
        <div class="monContainer">
            <div class="container-nav-bar">
                <nav class="navbar navbar-expand-lg navbar-dark">
                    <!-- pour class boostrap : bg-primary-->
                    <div class="container-fluid">
                        <a class="navbar-brand" href="/moto_mvc/">MX-IV</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarColor01">
                            <ul class="navbar-nav me-auto">
                                <li class="nav-item">
                                    <a class="nav-link" title="Accueil" href="/moto_mvc/"><i class="fas fa-home"></i>
                                        <span class="visually-hidden">(current)</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" title="Motos" href="/moto_mvc/Produit/listeProduit/moto"><i class="fas fa-motorcycle"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" title="Equipements" href="/moto_mvc/Produit/listeProduit/equipement"><i class="fas fa-mitten"></i></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" title="Goodies" href="/moto_mvc/Produit/listeProduit/goodie"><i class="fas fa-gifts"></i></a>
                                </li>
                                <?php
                                if (!isset($_SESSION['pseudo'])) {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" title="Connexion" href="/moto_mvc/Utilisateur/connexion"><i class="fas fa-user"></i></a>
                                    </li>
                                <?php
                                }
                                if (!isset($_SESSION['pseudo']) && !isset($_SESSION['is_admin'])) {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" title="Inscription" href="/moto_mvc/Utilisateur/inscription"><i class="far fa-user"></i></a>
                                    </li>
                                <?php
                                } else {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" title="Déconnexion" href="/moto_mvc/Utilisateur/deconnexion"><i class="fas fa-user-times"></i></a>
                                    </li>
                                <?php
                                }
                                if (isset($_SESSION['is_admin'])) {
                                ?>
                                    <li class="nav-item">
                                        <a class="nav-link" title="Administration" href="./index.php?page=administration"><i class="fas fa-user-cog"></i></a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <div class="lienPanier">
                                <a href="./index.php?page=panier"><i class="fas fa-cart-plus icone"></i></a>
                            </div>
                            <form class="d-flex" method="GET" action="./index.php?page=recherche">
                                <input name="page" type="hidden" value="recherche">
                                <input name="maRecherche" class="inputRecherche form-control me-sm-2" type="text" placeholder="Votre recherche..." autofocus>
                                <button class="recherche btn btn-secondary my-2 my-sm-0" type="submit"><i id="iconeRecherche" class="iconeRecherche fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </nav>
            </div>


            <?php
            Application::demarrer();
var_dump($_SESSION);
            if (isset($_SESSION["is_admin"]) && $_SESSION["is_admin"]) {
                echo $_SESSION["message"];
                // echo '<h3>Vous êtes bien connecté en tant qu\'administrateur.';
            } else if (isset($_SESSION["pseudo"])) {
                echo $_SESSION["message"];
            }
            ?>
        </div>

        <!--JS bootswatch-->
        <script src="./assets/javascript/projetSite.js"></script>
        <script src="./assets/javascript/projetSite2.js"></script>

        <!-- JS bootstrap-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    </center>
</body>

</html>