<?php 

    Class Auteur{
        private $num;
        private $nom;
        private $prenom;
        private $date_naissance;
        private $numNationalite;

        /**
         * Get the value of num
         */ 
        public function getNum()
        {
                return $this->num;
        }
        /**
         * Setter the value of num
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
         * Get the value of numNationalite
         */ 
        public function getNumNationalite(): Nationalite
        {
            return Nationalite::findById($this->numNationalite);
        }
        
        /**
         * Set the value of numNationalite
         *
         * @return  self
         */ 
        public function setNumNationalite(Nationalite $numNationalite)
        {
            $this->numNationalite = $numNationalite->getNum();
            
            return $this;
        }
        
        /**
         * Get the value of date_naissance
         */ 
        public function getDate_naissance()
        {
                return $this->date_naissance;
        }
        
        /**
         * Set the value of date_naissance
         *
         * @return  self
         */ 
        public function setDate_naissance($date_naissance)
        {
                $this->date_naissance = $date_naissance;
        
                return $this;
        }

        /**
         * Récupère l'ensemble des info de la table auteur. 
         * 
         * "Attention, fetch_class ignore les colonnes qui ne correspondent pas aux propriétés de la classe, 
         *  notamment celles provenant de clés étrangères ou de jointures." 
         *  Dans le cas present on utilise plutot l'attribut "fetch_obj"
         * * @return array
         */
        public static function findAll() : array
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT a.num, a.nom, a.prenom, DATE_FORMAT(date_naissance, '%d %M %Y') AS date_formatee , n.libelle AS libelleNationalite
                                    FROM auteur a
                                    JOIN nationalite n ON a.numNationalite = n.num
                                    ORDER BY num ASC;");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $results=$query->fetchAll();

            return $results;
        }

        /**
         * Trouve un auteur par son num 
         * @param int $id numéro du auteur
         * @return Auteur objet trouvé
         */
        public static function findById(int $id) :Auteur
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT * FROM auteur WHERE num = :id");
            $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Auteur');
            $query->BindParam(':id',$id);
            $query->execute();
            $result=$query->fetch();

            return $result;
        }

        /**
         * Permet d'ajouter un Auteur
         * @param Auteur $auteur le auteur a ajouter
         * @return int resultat de l'operation d'insertion de Auteur (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function add(Auteur $auteur) : int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("INSERT INTO auteur(nom, prenom, date_naissance, numNationalite) 
                                                VALUES (:nom,:prenom,:date_naissance,:numNationalite)");

            $query->BindParam(':nom',$auteur->getNom());
            $query->BindParam(':prenom',$auteur->getPrenom());
            $query->BindParam(':date_naissance',$auteur->getDate_naissance());
            $query->BindParam(':numNationalite',$auteur->numNationalite);
            $nb = $query->execute();
            return $nb;
        }

        /**
         * Permet de modifier un Auteur
         * @param Auteur $auteur le Auteur a modifier 
         * @return int resultat de l'operation d'insertion de Auteur (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function update(Auteur $auteur) : int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("UPDATE auteur 
                                    SET nom=:a_nom, 
                                        prenom=:a_prenom, 
                                        numNationalite=:a_numNationalite, 
                                        date_naissance=:a_date_naissance 
                                    WHERE num = :id");
            
            $num = $auteur->getNum();
            $aNom = $auteur->getNom();
            $aPrenom = $auteur->getPrenom();
            $date_naissance = $auteur->getDate_naissance();
            $a_numNationalite = $auteur->numNationalite;

            $query->BindParam(':id',$num);
            $query->BindParam(':a_nom',$aNom);
            $query->BindParam(':a_prenom',$aPrenom);
            $query->BindParam(':a_date_naissance',$date_naissance);
            $query->BindParam(':a_numNationalite',$a_numNationalite);
            $nb = $query->execute();
            return $nb;
        }

        /**
         * Permet de supprimer un Auteur
         * @param Auteur $auteur le auteur a supprimer 
         * @return int resultat de l'operation d'insertion de Auteur (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function delete(Auteur $auteur): int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("DELETE FROM auteur WHERE num = :id");
            $num = $auteur->getNum();
            $query->BindParam(':id',$num);
            $nb = $query->execute();
            return $nb;
        }

        public static function count(){
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT COUNT(DISTINCT num) FROM auteur");
            $query->execute();
            $nb = $query->fetch(PDO::FETCH_NUM);
            return $nb[0];
        }

    }