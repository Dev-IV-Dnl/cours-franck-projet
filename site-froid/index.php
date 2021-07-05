<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
    <title>Site internet</title>

</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Correction 11 juin</a>
      <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="navbar-collapse collapse" id="navbarColor01" style="">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <a class="nav-link active" href="index.php?page=accueil">Accueil
              <span class="visually-hidden">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=connexion">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?page=ajout-article">Ajout article</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-sm-2" type="text" placeholder="Search">
          <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

<center>
<?php
/**
 * Permet de retourner un objet PDO
 * pour se connecter à la base de données
 * @param $bdd = nom de la base de données
 * @param $hote = nom d'hote de la base de données
 * @param $utilisateur = nom d'utilisateur de la base de données
 * @param $mdp = nom du mdp de l'utilisateur de la base de données
 * 
 * @return objet PDO pour la connexion à la base de données
 */
function connectBdd(
  $bdd,
  $hote = "localhost:3306",
  $utilisateur = "root",
   $mdp = ""
) {
  $maConnexion = NEW PDO
  (
    "mysql:host=$hote;dbname=$bdd;charset=UTF8",
    $utilisateur,
    $mdp
  );
  $maConnexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $maConnexion;
}
$connexion = connectBdd("correction-11juin");


    $page = 'accueil';

    $listePagesDIsponibles = [
        'accueil',
        'connexion',
        'deconnexion',
        'ajout-article',
        '404'
    ];

    //$listePagesBackOffice = [
    //  'ajout-article'
  //];

    if(isset($_GET['page'])) {
        if(in_array($_GET['page'], $listePagesDIsponibles)) {

          $page = $_GET['page'];

         // if(in_array($_GET['page'], $listePagesBackOffice)) {
          //  $page = $_GET['page'];
         // } else {
          // if($_GET['page']=='ajout-article') {

          //   //s'il est connecté :
          //   if(isset($_SESSION['pseudo'])) {
          //     $page = $_GET['page'];
          //   } else {
          //     $page = 'connexion';
          //   }
          //   //sinon si ce n'est pas une page d'administration
          // } else {
          //   $page = $_GET['page'];
          // }
          //  $page = $_GET['page'];
          //}
        } else {
            $page = '404';
        }
    }

    include('./'.$page.'.php');
?>
</center>