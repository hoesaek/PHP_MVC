<?php
$action = $_GET["action"];

switch($action){
    
    case 'list':
        $LesPrets = Pret::findAll("");

        if(!empty($_GET["numPret"])) {
            $currentpret = Pret::findById($_GET["numPret"]);
            require_once __DIR__ . "/../vues/category/pret/ListePret.php";
        }else{
            require_once __DIR__ . "/../vues/category/pret/ListePret.php";
        }
        break;
        
    case 'add' :
        $mode = "Ajouter";

        $LesAdherents = Adherent::findAll();
        $LesLivres = Livre::findAll();
        
        require_once __DIR__ . "/../vues/category/pret/formPret.php";
    break;
            
    case 'update' :
        $mode = "Modifier";
        
        $currentpret = Pret::findById($_GET["numPret"]);

        $LesAdherents = Adherent::findAll();
        $LesLivres = Livre::findAll();

        require_once __DIR__ . "/../vues/category/pret/formPret.php";
        break;
        
    case 'delete' :
        $pret = Pret::findById($_GET["numPret"]); 
        $nb = Pret::delete($pret); 

        if($nb == 1){
            $_SESSION["message"] = ["success" => "le pret a bien été supprimé"];
        }else{
            $_SESSION["message"] = ["danger" => "le pret n'a été supprimé"];
        }
        redirect("/index.php?uc=pret&action=list");
    break;

    case 'validForm' :
        $pret = new Pret();

        
        if(empty($_POST["numPret"])){ // cas d une creation
            
            $adherent = Adherent::findById($_POST["infoAdherent"]);
            $livre = Livre::findById($_POST["infoLivre"]);

            var_dump($adherent);

            $pret->setNumAdherent($adherent);
            $pret->setNumLivre($livre);
            $pret->setDatePret($_POST["datePret"]);
            $pret->setDateRetourPrevue($_POST["dateRetourPrevue"]);
            $pret->setDateRetourReelle($_POST["dateRetourReelle"]);
            
            $nb = Pret::add($pret);
            
            $message = "ajouté";
        }else{ // cas d'une modification
            
            $livre = Livre::findById($_POST["numLivre"]);
            $adherent = Adherent::findById($_POST["numAdherent"]);

            $pret->setNumLivre($livre);
            $pret->setNumAdherent($adherent);
            $pret->setDatePret($_POST["datePret"]);
            $pret->setDateRetourPrevue($_POST["dateRetourPrevue"]);
            $pret->setDateRetourReelle($_POST["dateRetourReelle"]);

            $nb = Pret::update($pret);

            $message = "modifié";
        }
        if($nb == 1){
            $_SESSION["message"] = ["success" => "le pret a bien été $message"];
        }else{
            $_SESSION["message"] = ["danger" => "le pret n'a été $message"];
        }
        redirect("/index.php?uc=pret&action=list");
    break;
}