<?php
    Class Nationalite{
        
        /**
         * Numero de nationalité
         * @var int
         */
        private $num;

        /**
         * Libelle de la nationalité
         * @var string
         */
        private $libelle;

        private $numContinent;
        
        /**
         * Get the value of num
         */ 
        public function getNum()
        {
            return $this->num;
        }

        
        /**
         * Set numero de nationalité
         *
         * @param  int  $num  Numero de nationalité
         *
         * @return  self
         */ 
        public function setNum(int $num)
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
         * Ecrit dans le libelle de nationalite
         * @param string $libelle
         * @return self
         */
        public function setLibelle(string $libelle): self
        {
            $this->libelle = $libelle;

            return $this;
        }

        /**
         * renvoie l'objet continent associé getNumContinent
         * @return Continent
         */
        public function getNumContinent(): Continent
        {
            return Continent::findById($this->numContinent);
        }

        /**
         * Ecrit le num continent
         * @param Continent $continent
         * @return static
         */
        public function setNumContinent(Continent $continent): self
        {
            $this->numContinent = $continent->getNum();

            return $this;
        }

        /**
         * Récupère l'ensemble des nationalités. 
         * 
         * "Attention, fetch_class ignore les colonnes qui ne correspondent pas aux propriétés de la classe, 
         *  notamment celles provenant de clés étrangères ou de jointures." 
         *  Dans le cas present on utilise plutot l'attribut "fetch_obj"
         * * @return array
         */
        public static function findAll() : array
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT n.num, n.libelle AS libelleNationalite, c.num AS numContient, c.libelle AS libelleContinent
                                    FROM nationalite n
                                    JOIN continent c ON n.numContinent = c.num
                                    ORDER BY n.num ASC;");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $results=$query->fetchAll();

            return $results;
        }

        /**
         * Trouve un Nationalite par son num 
         * @param int $id numéro du Nationalite
         * @return Nationalite objet trouvé
         */
        public static function findById(int $id) :Nationalite
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT * FROM nationalite WHERE num = :id");
            $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Nationalite');
            $query->BindParam(':id',$id);
            $query->execute();
            $result=$query->fetch();

            return $result;
        }

        /**
         * Permet d'ajouter un Nationalite
         * @param Nationalite $Nationalite la Nationalite a ajouter
         * @return int resultat de l'operation d'insertion de Nationalite (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function add(Nationalite $Nationalite) : int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("INSERT INTO nationalite(libelle,numContinent) VALUES (:libelle,:numContinent)");
            $libelle = $Nationalite->getLibelle();
            $query->BindParam(':libelle',$libelle);
            $query->BindParam(':numContinent',$Nationalite->numContinent);
            $nb = $query->execute();
            return $nb;
        }

        /**
         * permet de modifier les informations de la table nationalite
         * @param Nationalite $Nationalite
         * @return int resultat de l'operation d'insertion de Nationalite (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function update(Nationalite $Nationalite) : int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("UPDATE nationalite 
                                    SET libelle = :libelle, 
                                        numContinent = :numContinent  
                                    WHERE num = :id");
            $query->BindParam(':id',$Nationalite->getNum());
            $query->BindParam(':libelle',$Nationalite->getLibelle());
            $query->BindParam(':numContinent',$Nationalite->numContinent);
            $nb = $query->execute();
            return $nb;
        }

        /**
         * Permet de supprimer un Nationalite
         * @param Nationalite $Nationalite le Nationalite a supprimer 
         * @return int resultat de l'operation d'insertion de Nationalite (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function delete(Nationalite $Nationalite): int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("DELETE FROM nationalite WHERE num = :id");
            $query->BindParam(':id',$Nationalite->getNum());
            $nb = $query->execute();
            return $nb;
        }

        /**
         * Retourne le nombre de nationalité present dans la table
         * @return mixed
         */
        public static function count(){
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT COUNT(DISTINCT num) FROM nationalite");
            $query->execute();
            $nb = $query->fetch(PDO::FETCH_NUM);
            return $nb[0];
        }



    }