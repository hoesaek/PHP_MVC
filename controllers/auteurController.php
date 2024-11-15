<?php
$action = $_GET["action"];

switch($action){
    
    case 'list':
        $LesAuteurs = Auteur::findAll();
        $nb = Auteur::count();
        require_once __DIR__ . "/../vues/category/auteur/ListeAuteur.php";
        break;
        
    case 'add' :
        $mode = "Ajouter";
        $LesNationalites = Nationalite::findAll();
        require_once __DIR__ . "/../vues/category/auteur/formAuteur.php";
    break;
            
    case 'update' :
        $currentAuteur = Auteur::findById($_GET["num"]);
        $LesNationalites = Nationalite::findAll();

        $mode = "Modifier";
        require_once __DIR__ . "/../vues/category/auteur/formAuteur.php";
        break;
        
    case 'delete' :
        $auteur = Auteur::findById($_GET["num"]); 
        $nb = Auteur::delete($auteur);  
        if($nb == 1){
            $_SESSION["message"] = ["success" => "l'auteur a bien été supprimé"];
        }else{
            $_SESSION["message"] = ["danger" => "l'auteur n'a été supprimé"];
        }
        redirect("/index.php?uc=auteur&action=list");
    break;
            
    case 'validForm' :
        $auteur = new Auteur();

        $nationalite = Nationalite::findById($_POST["nationalite"]);

        if(empty($_POST["num"])){ // cas d une creation
            $auteur->setNom($_POST["nom"]);
            $auteur->setPrenom($_POST["prenom"]);
            $auteur->setNumNationalite($nationalite); // a voir
            $auteur->setDate_naissance($_POST["date_naissance"]);

            $nb = Auteur::add($auteur);

            $message = "ajouté";
        }else{ // cas d'une modification
            $auteur->setNum($_POST["auteur"]);
            $auteur->setNom($_POST["nom"]);
            $auteur->setPrenom($_POST["prenom"]);
            $auteur->setNumNationalite($nationalite); // a voir
            $auteur->setDate_naissance($_POST["date_naissance"]);

            $nb = Auteur::update($auteur);

            $message = "modifié";
        }
        if($nb == 1){
            $_SESSION["message"] = ["success" => "le auteur a bien été $message"];
        }else{
            $_SESSION["message"] = ["danger" => "le auteur n'a été $message"];
        }
        redirect("/index.php?uc=auteur&action=list");
    break;
}