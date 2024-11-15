<?php 
ob_start();
if (session_status() === PHP_SESSION_NONE) { session_start(); }
if (!isset($_SESSION["search"])) { $_SESSION["search"] = []; }

// 
require_once __DIR__ . "/vues/category/Main/header.php";
require_once __DIR__ . "/vues/category/Information/messageFlash.php";
require_once __DIR__ . "/modeles/bdd/connexion.php";
require_once __DIR__ . "/modeles/continent.php";
require_once __DIR__ . "/modeles/nationalite.php";
require_once __DIR__ . "/modeles/auteur.php";
require_once __DIR__ . "/modeles/livre.php";
require_once __DIR__ . "/modeles/genre.php";
require_once __DIR__ . "/modeles/adherent.php";
require_once __DIR__ . "/modeles/pret.php";
require_once __DIR__ . "/function/function.php";
//  

$uc = empty($_GET["uc"]) ? "accueil" : $_GET["uc"] ;

switch($uc){
    case 'accueil' :
        $_SESSION["search"]["table"] = $uc;

        $nbMaxAdherent = Pret::count("Adherent");
        $nbMaxLivre = Pret::count("Livre");

        $dataPoints = array( 
            array(
                "label" => "Littérature", 
                "y" => Livre::count("Littérature")["pourcentage"], 
                "nombre_livres" => Livre::count("Littérature")["nombre_livres"]
            ),
            array(
                "label" => "Terreur", 
                "y" => Livre::count("Terreur")["pourcentage"], 
                "nombre_livres" => Livre::count("Terreur")["nombre_livres"]
            ),
            array(
                "label" => "Science-Fiction", 
                "y" => Livre::count("Science-Fiction")["pourcentage"], 
                "nombre_livres" => Livre::count("Science-Fiction")["nombre_livres"]
            ),
            array(
                "label" => "BD", 
                "y" => Livre::count("BD")["pourcentage"], 
                "nombre_livres" => Livre::count("BD")["nombre_livres"]
            ),
            array(
                "label" => "Essai", 
                "y" => Livre::count("Essai")["pourcentage"], 
                "nombre_livres" => Livre::count("Essai")["nombre_livres"]
            ),
            array(
                "label" => "Policier", 
                "y" => Livre::count("Policier")["pourcentage"], 
                "nombre_livres" => Livre::count("Policier")["nombre_livres"]
            ),
            array(
                "label" => "Roman contemporain", 
                "y" => Livre::count("Roman contemporain")["pourcentage"], 
                "nombre_livres" => Livre::count("Roman contemporain")["nombre_livres"]
                )
        );

        $MaxAdherent = Pret::findById($nbMaxAdherent->numAdherent);
        $MaxLivre = Pret::findById($nbMaxLivre->numLivre);

        $lastPret = Pret::findAll("datePret");

        require_once __DIR__ . "/vues/category/Main/accueil.php";
        break;
    case 'continent' :
        require_once __DIR__ . "/controllers/continentController.php";
        break;
    case 'nationalite' :
        require_once __DIR__ . "/controllers/nationaliteController.php";
        break;
    case 'livre' :
        require_once __DIR__ . "/controllers/livreController.php";
        break;
    case 'genre' :
        require_once __DIR__ . "/controllers/genreController.php";
        break;
    case 'auteur' :
        require_once __DIR__ . "/controllers/auteurController.php";
        break;
    case 'adherent' :
        require_once __DIR__ . "/controllers/adherentController.php";
        break;
    case 'pret' :
        require_once __DIR__ . "/controllers/pretController.php";
        break;
    case 'search' :
        $table = $_POST["category"];
        $condition = $_POST["search"];
        require_once __DIR__ . "/controllers/searchController.php";
        break;
    default :
        require_once __DIR__ . "/vues/category/Main/accueil.php";
        break;
}
require_once __DIR__ . "/vues/category/Main/footer.php"; 