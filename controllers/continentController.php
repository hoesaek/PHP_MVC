<?php
$action = $_GET["action"];

switch($action){
    
    case 'list':
        $result = false;
        $LesContinents = Continent::findAll();
        require_once __DIR__ . "/../vues/category/continent/ListeContinent.php";
        break;
        
    case 'add' :
        $mode = "Ajouter";
        require_once __DIR__ . "/../vues/category/continent/formContinent.php";
    break;
            
    case 'update' :
        $continent = Continent::findById($_GET["num"]);
        $mode = "Modifier";
        require_once __DIR__ . "/../vues/category/continent/formContinent.php";
        break;
        
    case 'delete' :
        $continent = Continent::findById($_GET["num"]); 
        $nb = Continent::delete($continent);  
        if($nb == 1){
            $_SESSION["message"] = ["success" => "le continent a bien été supprimé"];
        }else{
            $_SESSION["message"] = ["danger" => "le continent n'a été supprimé"];
        }
        redirect("/index.php?uc=continent&action=list");
    break;
            
    case 'validForm' :
        $continent = new Continent();
        
        if(empty($_POST["num"])){ // cas d une creation
            $continent->setLibelle($_POST["libelle"]);
            $nb = Continent::add($continent);
            $message = "ajouté";
        }else{ // cas d'une modification
            $continent->setNum($_POST["num"]);
            $continent->setLibelle($_POST["libelle"]);
            $nb = Continent::update($continent);
            $message = "modifié";
        }
        if($nb == 1){
            $_SESSION["message"] = ["success" => "le continent a bien été $message"];
        }else{
            $_SESSION["message"] = ["danger" => "le continent n'a été $message"];
        }
        redirect("/index.php?uc=continent&action=list");
    break;
}