<?php
$action = $_GET["action"];

switch($action){
    
    case 'list':
        $lesAdherents = Adherent::findAll();
        require_once __DIR__ . "/../vues/category/adherent/ListeAdherent.php";
        break;
        
    case 'add' :
        $mode = "Ajouter";

        require_once __DIR__ . "/../vues/category/adherent/formAdherent.php";
        break;
            
    case 'update' :
        $adherent = Adherent::findById($_GET["num"]);
        $mode = "Modifier";
        require_once __DIR__ . "/../vues/category/adherent/formAdherent.php";
        break;
        
    case 'delete' :
        $adherent = Adherent::findById($_GET["num"]); 
        $nb = Adherent::delete($adherent);  
        if($nb == 1){
            $_SESSION["message"] = ["success" => "L'adhérent a bien été supprimé"];
        } else {
            $_SESSION["message"] = ["danger" => "L'adhérent n'a pas été supprimé"];
        }
        redirect("/index.php?uc=adherent&action=list");
        break;
            
    case 'validForm' :
        $adherent = new Adherent();
        
        if(empty($_POST["num"])){ // Cas d'une création
            $adherent->setNom($_POST["nom"]);
            $adherent->setPrenom($_POST["prenom"]);
            $adherent->setAdrRue($_POST["adresseRue"]);
            $adherent->setAdrCP($_POST["adresseCP"]);
            $adherent->setAdrVille($_POST["adresseVille"]);
            $adherent->setTel($_POST["telephone"]);
            $adherent->setMel($_POST["email"]);

            $nb = Adherent::add($adherent);
            $message = "ajouté";

        } else { // Cas d'une modification
            $adherent = Adherent::findById($_POST["num"]); 
            $adherent->setNom($_POST["nom"]);
            $adherent->setPrenom($_POST["prenom"]);
            $adherent->setAdrRue($_POST["adresseRue"]);
            $adherent->setAdrCP($_POST["adresseCP"]);
            $adherent->setAdrVille($_POST["adresseVille"]);
            $adherent->setTel($_POST["telephone"]);
            $adherent->setMel($_POST["email"]);

            $nb = Adherent::update($adherent);
            $message = "modifié";
        }
        
        if($nb == 1){
            $_SESSION["message"] = ["success" => "L'adhérent a bien été $message"];
        } else {
            $_SESSION["message"] = ["danger" => "L'adhérent n'a pas été $message"];
        }
        
        redirect("/index.php?uc=adherent&action=list");
        break;
}
