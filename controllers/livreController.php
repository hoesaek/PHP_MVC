<?php
$action = $_GET["action"];

switch($action){
    
    case 'list':
        $LesLivres = Livre::findAll();
        require_once __DIR__ . "/../vues/category/livre/ListeLivre.php";
        break;
        
    case 'add' :
        $mode = "Ajouter";

        $LesGenres = Genre::findAll();
        $LesAuteurs = Auteur::findAll();  

        require_once __DIR__ . "/../vues/category/livre/formLivre.php";
    break;
            
    case 'update' :
        $mode = "Modifier";
        
        $LesGenres = Genre::findAll();
        $LesAuteurs = Auteur::findAll();   

        $livre = Livre::findById($_GET["num"]);

        require_once __DIR__ . "/../vues/category/livre/formLivre.php";
        break;
        
    case 'delete' :
        $livre = Livre::findById($_GET["num"]); 
        $nb = Livre::delete($livre);  
        
        if($nb == 1){
            $_SESSION["message"] = ["success" => "le livre a bien été supprimé"];
        }else{
            $_SESSION["message"] = ["danger" => "le livre n'a été supprimé"];
        }
        redirect("/index.php?uc=livre&action=list");
    break;
            
    case 'validForm' :
        $livre = new Livre();

        $genre = Genre::findById($_POST["genre"]);
        $auteur = Auteur::findById($_POST["auteur"]);

        if(empty($_POST["numLivre"])){ // cas d une creation
            $livre->setIsbn(isbn: $_POST["isbn"]);
            $livre->setTitre(titre: $_POST["titre"]);
            $livre->setPrix(prix: $_POST["prix"]);
            $livre->setEditeur(editeur: $_POST["editeur"]);
            $livre->setAnnee(annee: $_POST["annee"]);
            $livre->setLangue(langue: $_POST["langue"]);
            $livre->setNumAuteur(numAuteur: $auteur); 
            $livre->setNumGenre(numGenre: $genre); 
            $livre->setImg(img: $_POST["img"]); 

            $nb = Livre::add($livre);

            $message = "ajouté";

        }else{ // cas d'une modification

            $livre->setNum(num: $_POST["numLivre"]);
            $livre->setIsbn(isbn: $_POST["isbn"]);
            $livre->setTitre(titre: $_POST["titre"]);
            $livre->setPrix(prix: $_POST["prix"]);
            $livre->setEditeur(editeur: $_POST["editeur"]);
            $livre->setAnnee(annee: $_POST["annee"]);
            $livre->setLangue(langue: $_POST["langue"]);
            $livre->setNumAuteur( numAuteur: $auteur);
            $livre->setNumGenre(numGenre: $genre);
            $livre->setImg(img: $_POST["img"]); 
            
            $nb = Livre::update($livre);

            $message = "modifié";
        }

        //var_dump(value: $nb);

        if($nb == 1){
            $_SESSION["message"] = ["success" => "le livre a bien été $message"];
        }else{
            $_SESSION["message"] = ["danger" => "le livre n'a pas été $message"];
        }
        //var_dump($_SESSION["message"]);
        redirect("/index.php?uc=livre&action=list");
    break;

}