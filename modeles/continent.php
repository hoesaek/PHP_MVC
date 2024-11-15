<?php 
    class Continent{

        /**
         * Numero du continent
         * @var int
         */
        private $num;

        /**
         * Libelle du continent
         * @var string
         */
        private $libelle;

        /**
         * Get the value of num
         */ 
        public function getNum()
        {
            return $this->num;
        }
        
        /**
         * Set numero du continent
         *
         * @param  int  $num  Numero du continent
         *
         * @return  self
         */ 
        public function setNum(int $num): self
        {
                $this->num = $num;

                return $this;
        }

        /**
         * Lit le libelle
         * @return string
         */
        public function getLibelle(): string
        {
            return $this->libelle;
        }

        /**
         * Summary of setLibelle
         * @param string $libelle
         * @return self
         */
        public function setLibelle(string $libelle): self
        {
            $this->libelle = $libelle;

            return $this;
        }

        /**
         * Retourne l'ensemble des continents
         * @return Continent[] tableau d'objet continent
         */
        public static function findAll() : array
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT * FROM continent");
            $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Continent');
            $query->execute();
            $results=$query->fetchAll();

            return $results;
        }

        /**
         * Trouve un continent par son num 
         * @param int $id numéro du continent
         * @return Continent objet trouvé
         */
        public static function findById(int $id) :Continent
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT * FROM continent WHERE num = :id");
            $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'continent');
            $query->BindParam(':id',$id);
            $query->execute();
            $result=$query->fetch();

            return $result;
        }

        /**
         * Permet d'ajouter un Continent
         * @param Continent $continent le continent a ajouter
         * @return int resultat de l'operation d'insertion de Continent (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function add(Continent $continent) : int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("INSERT INTO continent(libelle) VALUES (:libelle)");
            $libelle = $continent->getLibelle();
            $query->BindParam(':libelle',$libelle);
            $nb = $query->execute();
            return $nb;
        }

        /**
         * Permet de modifier un Continent
         * @param Continent $continent le Continent a modifier 
         * @return int resultat de l'operation d'insertion de Continent (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function update(Continent $continent) : int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("UPDATE continent SET libelle = :libelle WHERE num = :id");
            $num = $continent->getNum();
            $libelle = $continent->getLibelle();
            $query->BindParam(':id',$num);
            $query->BindParam(':libelle',$libelle);
            $nb = $query->execute();
            return $nb;
        }

        /**
         * Permet de supprimer un Continent
         * @param Continent $continent le continent a supprimer 
         * @return int resultat de l'operation d'insertion de Continent (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function delete(Continent $continent): int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("DELETE FROM continent WHERE num = :id");
            $num = $continent->getNum();
            $query->BindParam(':id',$num);
            $nb = $query->execute();
            return $nb;
        }

        public static function search($term) {
            // Exemple de requête SQL pour rechercher dans la table Adherent
            $pdo = PDOConnexion::getInstance()->getConnection();
            $term = '%' . $term . '%';
            $query = $pdo->prepare("SELECT * FROM continent WHERE libelle LIKE :term ");
            $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'continent');
            $query->BindParam(':term',$term);
            $query->execute();
            $result=$query->fetchAll();

            return $result;
        }

    }