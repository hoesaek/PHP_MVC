<?php

Class Genre{
    private $num;
    private $libelle;
    
    
    
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
     * Get the value of libelle
     */ 
    public function getLibelle():string
    {
        return $this->libelle;
    }
    
        /**
         * Set the value of libelle
         *
         * @return  self
         */ 
        public function setLibelle($libelle)
        {
                $this->libelle = $libelle;

                return $this;
        }

        /**
         * Retourne l'ensemble des genres
         * @return Genre[] tableau d'objet genre
         */
        public static function findAll() : array
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT * FROM genre");
            $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Genre');
            $query->execute();
            $results=$query->fetchAll();

            return $results;
        }

        /**
         * Trouve un genre par son num 
         * @param int $id numéro du genre
         * @return Genre objet trouvé
         */
        public static function findById(int $id) :Genre
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT * FROM genre WHERE num = :id");
            $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Genre');
            $query->BindParam(':id',$id);
            $query->execute();
            $result=$query->fetch();

            return $result;
        }

        /**
         * Permet d'ajouter un Genre
         * @param Genre $genre le genre a ajouter
         * @return int resultat de l'operation d'insertion de Genre (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function add(Genre $genre) : int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("INSERT INTO genre(libelle) VALUES (:libelle)");
            $libelle = $genre->getLibelle();
            $query->BindParam(':libelle',$libelle);
            $nb = $query->execute();
            return $nb;
        }

        /**
         * Permet de modifier un Genre
         * @param Genre $genre le Genre a modifier 
         * @return int resultat de l'operation d'insertion de Genre (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function update(Genre $genre) : int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("UPDATE genre SET libelle = :libelle WHERE num = :id");
            $num = $genre->getNum();
            $libelle = $genre->getLibelle();
            $query->BindParam(':id',$num);
            $query->BindParam(':libelle',$libelle);
            $nb = $query->execute();
            return $nb;
        }

        /**
         * Permet de supprimer un Genre
         * @param Genre $genre le genre a supprimer 
         * @return int resultat de l'operation d'insertion de Genre (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function delete(Genre $genre): int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("DELETE FROM genre WHERE num = :id");
            $num = $genre->getNum();
            $query->BindParam(':id',$num);
            $nb = $query->execute();
            return $nb;
        }

    }