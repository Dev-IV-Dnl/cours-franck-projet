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
    <link rel="stylesheet" href="https://bootswatch.com/5/solar/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <?php
        // if(isset($_SESSION["message"])) {
        //     echo $_SESSION["message"];
        //     unset($_SESSION["message"]);
        // }
    ?>

<header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                <a class="nav-link active" href="#">Accueil
                    <span class="visually-hidden">(current)</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">News</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Nous contacter</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">A propos</a>
                </li>
                <li class="nav-item">
                <?php
                if(isset($_SESSION["pseudo"])) {
                ?>
                    <a class="nav-link" href="/coursfranck/mvc/utilisateur/deconnexion">Deconnexion</a>
                <?php
                } else {
                ?>
                    <a class="nav-link" href="/coursfranck/mvc/utilisateur/connexion">Connexion</a>
                <?php
                }
                ?>
                </li>
                <!-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
                </li> -->
            </ul>
            <form class="d-flex">
                <input class="form-control me-sm-2" type="text" placeholder="Search">
                <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
            </div>
        </div>
        </nav>  
</header>
    <?php
        Application::demarrer();
    // if(isset($_SESSION["admin"]) && $_SESSION["admin"]) {
    //     echo "<p>Vous êtes bien connecté en tant qu'administrateur.</p>";
    // } elseif(isset($_SESSION["pseudo"])) {
    //     echo "<p>Vous êtes bien connecté en tant qu'utilisateur.</p>";
    // }
    ?>
    
</body>
</html>