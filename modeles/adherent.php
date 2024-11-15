<?php


Class Adherent{

    private $num;
    private $nom;
    private $prenom;
    private $adrRue;
    private $adrCP;
    private $adrVille;
    private $tel;
    private $mel;
    private $genre;



    /**
     * Get the value of num
     */ 
    public function getNum()
    {
        return $this->num;
    }
    
    /**
     * Set the value of num
     *
     * @return  self
     */ 
    public function setNum($num)
    {
        $this->num = $num;
    
        return $this;
    }


    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of prenom
     */ 
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of prenom
     *
     * @return  self
     */ 
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get the value of adrRue
     */ 
    public function getAdrRue()
    {
        return $this->adrRue;
    }

    /**
     * Set the value of adrRue
     *
     * @return  self
     */ 
    public function setAdrRue($adrRue)
    {
        $this->adrRue = $adrRue;

        return $this;
    }

    /**
     * Get the value of adrCP
     */ 
    public function getAdrCP()
    {
        return $this->adrCP;
    }

    /**
     * Set the value of adrCP
     *
     * @return  self
     */ 
    public function setAdrCP($adrCP)
    {
        $this->adrCP = $adrCP;

        return $this;
    }

    /**
     * Get the value of adrVille
     */ 
    public function getAdrVille()
    {
        return $this->adrVille;
    }

    /**
     * Set the value of adrVille
     *
     * @return  self
     */ 
    public function setAdrVille($adrVille)
    {
        $this->adrVille = $adrVille;

        return $this;
    }

    /**
     * Get the value of tel
     */ 
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set the value of tel
     *
     * @return  self
     */ 
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of mel
     */ 
    public function getMel()
    {
        return $this->mel;
    }

    /**
     * Set the value of mel
     *
     * @return  self
     */ 
    public function setMel($mel)
    {
        $this->mel = $mel;

        return $this;
    }

     /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

    public static function findAll()
    {
        $pdo = PDOConnexion::getInstance()->getConnection();
        $query = $pdo->prepare("SELECT * FROM adherent");
        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Adherent');
        $query->execute();
        $result=$query->fetchAll();

        return $result;
    }
    
    public static function findById(int $id) :Adherent
    {
        $pdo = PDOConnexion::getInstance()->getConnection();
        $query = $pdo->prepare("SELECT * FROM adherent WHERE num = :id");
        $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Adherent');
        $query->BindParam(':id',$id);
        $query->execute();
        $result=$query->fetch();

        return $result;
    }

    public static function search($term) {
        // Exemple de requête SQL pour rechercher dans la table Adherent
        $pdo = PDOConnexion::getInstance()->getConnection();
        $query = $pdo->prepare("SELECT * FROM adherents WHERE nom LIKE :term OR prenom LIKE :term");
        $query->bindParam(':term',$term);
        $query = $query->execute(['term' => '%' . $term . '%']);
        return $query->fetchAll();
    }

    public static function add(Adherent $adherent) : int 
    {
        $pdo = PDOConnexion::getInstance()->getConnection();
        $query = $pdo->prepare("INSERT INTO adherent (nom, prenom, adrRue, adrCP, adrVille, tel, mel) 
                                VALUES (:nom, :prenom, :adrRue, :adrCP, :adrVille, :tel, :mel)");
        
        $nom = $adherent->getNom();
        $prenom = $adherent->getPrenom();
        $adrRue = $adherent->getAdrRue();
        $adrCP = $adherent->getAdrCP();
        $adrVille = $adherent->getAdrVille();
        $tel = $adherent->getTel();
        $mel = $adherent->getMel();

        
        $query->bindParam(':nom', $nom);
        $query->bindParam(':prenom', $prenom);
        $query->bindParam(':adrRue', $adrRue);
        $query->bindParam(':adrCP', $adrCP);
        $query->bindParam(':adrVille', $adrVille);
        $query->bindParam(':tel', $tel);
        $query->bindParam(':mel', $mel);
        $nb = $query->execute();

        return $nb;
    }

    /**
 * Permet de modifier un Adherent
 * @param Adherent $adherent l'Adherent à modifier 
 * @return int Résultat de l'opération d'update de l'Adherent (0 si l'update a échoué, 1 si ça s'est bien passé)
 */
public static function update(Adherent $adherent) : int 
{
    $pdo = PDOConnexion::getInstance()->getConnection();
    $query = $pdo->prepare("UPDATE adherent SET nom = :nom, 
                                                prenom = :prenom, 
                                                adrRue = :adrRue, 
                                                adrCP = :adrCP, 
                                                adrVille = :adrVille, 
                                                tel = :tel, 
                                                mel = :mel
                                            WHERE num = :id ");
    $num = $adherent->getNum();
    $nom = $adherent->getNom();
    $prenom = $adherent->getPrenom();
    $adrRue = $adherent->getAdrRue();
    $adrCP = $adherent->getAdrCP();
    $adrVille = $adherent->getAdrVille();
    $tel = $adherent->getTel();
    $mel = $adherent->getMel();

    
    $query->bindParam(':id', $num);
    $query->bindParam(':nom', $nom);
    $query->bindParam(':prenom', $prenom);
    $query->bindParam(':adrRue', $adrRue);
    $query->bindParam(':adrCP', $adrCP);
    $query->bindParam(':adrVille', $adrVille);
    $query->bindParam(':tel', $tel);
    $query->bindParam(':mel', $mel);

    $nb = $query->execute();
    
    return $nb;
}


    /**
     * Permet de supprimer un Adherent
     * @param Adherent $adherent L'Adherent à supprimer 
     * @return int Résultat de l'opération de suppression de l'Adherent (0 si la suppression a échoué, 1 si elle a réussi)
     */
    public static function delete(Adherent $adherent): int 
    {
        $pdo = PDOConnexion::getInstance()->getConnection();
        $query = $pdo->prepare("DELETE FROM adherent WHERE num = :num");
        $id = $adherent->getNum();
        $query->bindParam(':num', $id);
        $nb = $query->execute();
        
        return $nb;
    }


    /**
     * Permet de compter le nombre d'Adherents distincts
     * @return int Le nombre total d'Adherents
     */
    public static function count(): int 
    {
        $pdo = PDOConnexion::getInstance()->getConnection();
        $query = $pdo->prepare("SELECT COUNT(DISTINCT num) FROM adherent");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_NUM);
        return (int)$result[0];
    }
   
}