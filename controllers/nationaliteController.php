<?php
$action = $_GET["action"];

switch($action){
    
    case 'list':
        $LesNationalites = Nationalite::findAll();
        $nb = Nationalite::count();

        require_once __DIR__ . "/../vues/category/nationalite/ListeNation.php";
        break;
        
    case 'add' :
        $mode = "Ajouter";
        $LesContinents = Continent::findAll();

        require_once __DIR__ . "/../vues/category/nationalite/formNation.php";
    break;
            
    case 'update' :
        $mode = "Modifier";
        $laNationalite = Nationalite::findById($_GET["num"]);

        $LesContinents = Continent::findAll();

        require_once __DIR__ . "/../vues/category/nationalite/formNation.php";
        break;
        
    case 'delete' :
        $nationalite = Nationalite::findById($_GET["num"]); 
        $nb = Nationalite::delete($nationalite);  

        if($nb == 1){
            $_SESSION["message"] = ["success" => "la nationalité a bien été supprimé"];
        }else{
            $_SESSION["message"] = ["danger" => "la nationalité n'a été supprimé"];
        }
        redirect("/index.php?uc=nationalite&action=list");
    break;
            
    case 'validForm' :
        $nationalite = new Nationalite();

        $continent = Continent::findById($_POST["continent"]);
        
        if(empty($_POST["numNationalite"])){ // cas d une creation

            $nationalite->setLibelle($_POST["nationalite_libelle"]);
            $nationalite->setNumContinent($continent);

            $nb = Nationalite::add($nationalite);

            $message = "ajouté";
        }else{ // cas d'une modification
            $nationalite->setNum($_POST["numNationalite"]);
            $nationalite->setLibelle($_POST["nationalite_libelle"]);
            $nationalite->setNumContinent($continent);

            $nb = Nationalite::update($nationalite);

            $message = "modifié";
        }
        if($nb == 1){
            $_SESSION["message"] = ["success" => "la nationalité a bien été $message"];
        }else{
            $_SESSION["message"] = ["danger" => "la nationalité n'a été $message"];
        }
        redirect("/index.php?uc=nationalite&action=list");
    break;
}