<?php

Class Pret {
    private $num;
    private $numLivre;
    private $numAdherent;
    private $datePret;
    private $dateRetourPrevue;
    private $dateRetourReelle;

    // Getters et setters pour chaque propriété
    public function getNum() {
        return $this->num;
    }

    public function setNum($num) {
        $this->num = $num;
        return $this;
    }

    public function getNumLivre() {
       return Livre::findById($this->numLivre);
    }

    public function setNumLivre(Livre $numLivre) {
        $this->numLivre = $numLivre->getNum();
        return $this;
    }

    public function getNumAdherent() {
        return Adherent::findById($this->numAdherent);
    }

    public function setNumAdherent(Adherent $numAdherent) {
        $this->numAdherent = $numAdherent->getNum();
        return $this;
    }

    public function getDatePret() {
        return $this->datePret;
    }

    public function setDatePret($datePret) {
        $this->datePret = $datePret;
        return $this;
    }

    public function getDateRetourPrevue() {
        return $this->dateRetourPrevue;
    }

    public function setDateRetourPrevue($dateRetourPrevue) {
        $this->dateRetourPrevue = $dateRetourPrevue;
        return $this;
    }

    public function getDateRetourReelle() {
        return $this->dateRetourReelle;
    }

    public function setDateRetourReelle($dateRetourReelle) {
        $this->dateRetourReelle = $dateRetourReelle;
        return $this;
    }

    public static function add(Pret $pret) : int {
        $pdo = PDOConnexion::getInstance()->getConnection();
        $query = $pdo->prepare("INSERT INTO pret (numLivre, numAdherent, datePret, dateRetourPrevue, dateRetourReelle) 
                                VALUES (:numLivre, :numAdherent, :datePret, :dateRetourPrevue, :dateRetourReelle)");
         
         $nLivre = $pret->getNumLivre()->getNum();
         $nAdherent = $pret->getNumAdherent()->getNum();
         $datePret = $pret->getDatePret();
         $dateRetourPrevue = $pret->getDateRetourPrevue();
         $dateRetourReelle = $pret->getDateRetourReelle();

         $query->bindParam(':numLivre',$nLivre);
         $query->bindParam(':numAdherent',$nAdherent);
         $query->bindParam(':datePret',$datePret);
         $query->bindParam(':dateRetourPrevue',$dateRetourPrevue);
         $query->bindParam(':dateRetourReelle',$dateRetourReelle);

         $nb = $query->execute();
         return $nb;
     }

    // Méthode pour mettre à jour un prêt
    public static function update(Pret $pret) : int {
        $pdo = PDOConnexion::getInstance()->getConnection();
        $query = $pdo->prepare("UPDATE pret SET  
                                              numLivre = :numLivre, 
                                              numAdherent = :numAdherent, 
                                              datePret = :datePret, 
                                              dateRetourPrevue = :dateRetourPrevue, 
                                              dateRetourReelle = :dateRetourReelle 
                                              WHERE num = :num");
         $numPret = $pret->getNum();
         $nLivre = $pret->getNumLivre()->getNum();
         $nAdherent = $pret->getNumAdherent()->getNum();
         $datePret = $pret->getDatePret();
         $dateRetourPrevue = $pret->getDateRetourPrevue();
         $dateRetourReelle = $pret->getDateRetourReelle();

         $query->bindParam(':num',$numPret);
         $query->bindParam(':numLivre',$nLivre);
         $query->bindParam(':numAdherent',$nAdherent);
         $query->bindParam(':datePret',$datePret);
         $query->bindParam(':dateRetourPrevue',$dateRetourPrevue);
         $query->bindParam(':dateRetourReelle',$dateRetourReelle);

        $nb = $query->execute();
        return $nb;
    }

    public static function delete(Pret $pret): int {
        $pdo = PDOConnexion::getInstance()->getConnection();
        $query = $pdo->prepare("DELETE FROM pret WHERE num = :num");
        $query->bindParam(':num', $pret->getNum());
        $nb = $query->execute();
        return $nb;
    }

    /**
     * Summary of findAll
     * @param mixed $type
     * @return mixed
     */
    public static function findAll(?string $type) {
        $pdo = PDOConnexion::getInstance()->getConnection();
        if (!empty($type)) {
            if ($type == "datePret") {
                $query = $pdo->prepare("SELECT pret.num AS numPret, pret.datePret AS DatePret, pret.dateRetourPrevue, pret.dateRetourReelle, a.num AS numAdherent, a.nom AS nomAdherent, a.prenom AS prenomAdherent, l.num AS numLivre, l.titre AS Livre , l.img AS Cover
                                        FROM pret pret 
                                        JOIN livre l ON pret.numLivre = l.num 
                                        JOIN adherent a ON pret.numAdherent = a.num 
                                        ORDER BY datePret DESC;");
                $query->setFetchMode(PDO::FETCH_OBJ);
            }
        } else {
            $query = $pdo->prepare("SELECT pret.num AS numPret, pret.datePret, pret.dateRetourPrevue, pret.dateRetourReelle, a.num AS numAdherent, a.nom AS nomAdherent, a.prenom AS prenomAdherent, l.num AS numLivre, l.titre AS Livre 
                                    FROM pret pret 
                                    JOIN livre l ON pret.numLivre = l.num 
                                    JOIN adherent a ON pret.numAdherent = a.num 
                                    ORDER BY pret.num ASC;");
            $query->setFetchMode(PDO::FETCH_OBJ);
        }
        $query->execute();
        return $query->fetchAll();
    }


    /**
     * Summary of findById
     * @param int $id
     * @return mixed
     */
    public static function findById(int $id) {
        $pdo = PDOConnexion::getInstance()->getConnection();

        $query = $pdo->prepare("SELECT * FROM pret WHERE num = :id");
        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Pret');
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(); // Retourne un seul objet Pret
        
    }
    
    /**
     * Summary of count
     * @param mixed $element
     * @return mixed $nb qui compte les prets soit avec rechere specifique soit une recherche globale
     */
    public static function count(?string $type){
        //$element sera mon argument de recherche pour definir une recherche specifique
        $pdo = PDOConnexion::getInstance()->getConnection();
        if(!empty($type)){
            if($type == "Adherent"){
                $query = $pdo->prepare("SELECT numAdherent, COUNT(*) as occurrences 
                                        FROM pret 
                                        GROUP BY numAdherent 
                                        ORDER BY occurrences DESC 
                                        LIMIT 1");

            }elseif($type == "Livre"){
                $query = $pdo->prepare("SELECT numLivre, COUNT(*) as occurrences 
                                        FROM pret 
                                        GROUP BY numLivre 
                                        ORDER BY occurrences DESC 
                                        LIMIT 1");
            } elseif ($type == "pretManquant") {
                $query = $pdo->prepare("SELECT (COUNT(dateRetourPrevue) - COUNT(dateRetourReelle)) AS prets_manquants 
                                        FROM pret;");
            }
        }else{
            $query = $pdo->prepare("SELECT COUNT(DISTINCT num) FROM pret");
        }
        $query->execute();
       return $query->fetch(PDO::FETCH_OBJ);
         
    }
    
    /**
     * Fonction qui retourne soit les livres empruntés par un adhérent, soit les emprunts d'un livre spécifique.
     *
     * @param int $id L'ID de l'adhérent ou du livre.
     * @param string $type Le type de recherche ('adherent' ou 'livre').
     * @return array Un tableau des résultats des prêts selon le type sélectionné.
     */
    public static function typePret(int $id, string $type): array {
        $pdo = PDOConnexion::getInstance()->getConnection();
        
        // On prépare la requête selon le type : emprunts par adhérent ou par livre
        if ($type === 'adherent') {
            // Requête pour récupérer les livres empruntés par un adhérent
            $query = $pdo->prepare("SELECT livre.* 
                                    FROM pret 
                                    JOIN livre ON pret.numLivre = livre.num 
                                    WHERE pret.numAdherent = :id");
        } elseif ($type === 'livre') {
            // Requête pour récupérer les emprunts d'un livre spécifique
            $query = $pdo->prepare("SELECT adherent.* 
                                    FROM pret 
                                    JOIN adherent ON pret.numAdherent = adherent.num 
                                    WHERE pret.numLivre = :id");
        } else {
            // Si le type n'est pas valide, on retourne un tableau vide
            return [];
        }

        // Liaison du paramètre ID
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        
        // Exécution de la requête
        $query->execute();
        
        // Récupération des résultats
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $result;
    }
}


