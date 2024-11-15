<?php
$action = $_GET["action"];

switch($action){
    
    case 'list':
        
        $lesGenres = Genre::findAll();
        require_once __DIR__ . "/../vues/category/genre/ListeGenre.php";
        break;
        
    case 'add' :
        $mode = "Ajouter";

        require_once __DIR__ . "/../vues/category/genre/formGenre.php";
        break;
            
    case 'update' :

        $genre = Genre::findById($_GET["num"]);
        $mode = "Modifier";
        require_once __DIR__ . "/../vues/category/genre/formGenre.php";
        break;
        
    case 'delete' :

        $genre = Genre::findById($_GET["num"]); 
        $nb = Genre::delete($genre);  
        if($nb == 1){
            $_SESSION["message"] = ["success" => "Le genre a bien été supprimé"];
        } else {
            $_SESSION["message"] = ["danger" => "Le genre n'a pas été supprimé"];
        }
        // Redirection après suppression
        redirect("/index.php?uc=genre&action=list");
        break;
            
    case 'validForm' :
        $genre = new Genre();
        
        if(empty($_POST["num"])){ // Cas d'une création

            $genre->setLibelle($_POST["libelle"]);
            $nb = Genre::add($genre);
            $message = "ajouté";

        } else { // Cas d'une modification

            $genre = Genre::findById($_POST["num"]);
            $genre->setNum($_POST["num"]);
            $genre->setLibelle($_POST["libelle"]);
            $nb = Genre::update($genre);
            $message = "modifié";
        }

        if($nb == 1){
            $_SESSION["message"] = ["success" => "Le genre a bien été $message"];
        } else {
            $_SESSION["message"] = ["danger" => "Le genre n'a pas été $message"];
        }
        
        redirect("/index.php?uc=genre&action=list");
        break;
}
