<?php
switch ($table) {
    case 'continent':
        $result = Continent::search($condition);
        $mode = "Recherche";
        if(!$result){$result = false;}
        require_once __DIR__ . "/../vues/category/Liste/ListeContinent.php";
        break;

    case 'nationalite':
        $query = "SELECT * FROM $table";
        $conditions = [
            "libelle LIKE :search"
        ];

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" OR ", $conditions);
        }
        require_once __DIR__ . "/../vues/category/Form/formSearch.php";
        break;

    case 'livre':
        $query = "SELECT * FROM $table";
        $conditions = [
            "titre LIKE :search"
        ];

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" OR ", $conditions);
        }
        require_once __DIR__ . "/../vues/category/Form/formSearch.php";
        break;

    case 'auteur':
        $query = "SELECT * FROM $table";
        $conditions = [
            "nom LIKE :search",
            "prenom LIKE :search"
        ];

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" OR ", $conditions);
        }
        require_once __DIR__ . "/../vues/category/Form/formSearch.php";
        break;

    case 'adherent':
        $query = "SELECT * FROM $table";
        $conditions = [
            "nom LIKE :search",
            "prenom LIKE :search",
            "email LIKE :search"
        ];

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" OR ", $conditions);
        }
        require_once __DIR__ . "/../vues/category/Form/formSearch.php";
        break;

    case 'pret':
        $query = "SELECT * FROM $table";
        $conditions = [
            "numPret LIKE :search",
            "numAdherent LIKE :search"
        ];

        if (!empty($conditions)) {
            $query .= " WHERE " . implode(" OR ", $conditions);
        }
        require_once __DIR__ . "/../vues/category/Form/formSearch.php";
        break;

    default:
        die("Table non reconnue pour la recherche.");
}
