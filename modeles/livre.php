<?php 
    class Livre{

        private $num;
        private $isbn;
        private $titre;
        private $prix;
        private $editeur;
        private $annee;
        private $langue;
        private $numAuteur;
        private $numGenre;
        private $img;
        

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
         * Get the value of isbn
         */ 
        public function getIsbn(): mixed
        {
                return $this->isbn;
        }

        /**
         * Set the value of isbn
         *
         * @return  self
         */ 
        public function setIsbn($isbn)
        {
                $this->isbn = $isbn;

                return $this;
        }

        /**
         * Get the value of titre
         */ 
        public function getTitre():string
        {
                return $this->titre;
        }

        /**
         * Set the value of titre
         *
         * @return  self
         */ 
        public function setTitre($titre)
        {
                $this->titre = $titre;

                return $this;
        }

        /**
         * Get the value of prix
         */ 
        public function getPrix()
        {
                return $this->prix;
        }

        /**
         * Set the value of prix
         *
         * @return  self
         */ 
        public function setPrix($prix)
        {
                $this->prix = $prix;

                return $this;
        }

        /**
         * Get the value of editeur
         */ 
        public function getEditeur(): string
        {
                return $this->editeur;
        }

        /**
         * Set the value of editeur
         *
         * @return  self
         */ 
        public function setEditeur($editeur)
        {
                $this->editeur = $editeur;

                return $this;
        }

        /**
         * Get the value of annee
         */ 
        public function getAnnee(): mixed
        {
                return $this->annee;
        }

        /**
         * Set the value of annee
         *
         * @return  self
         */ 
        public function setAnnee($annee)
        {
                $this->annee = $annee;

                return $this;
        }

        /**
         * Get the value of langue
         */ 
        public function getLangue():string
        {
                return $this->langue;
        }

        /**
         * Set the value of langue
         *
         * @return  self
         */ 
        public function setLangue($langue)
        {
                $this->langue = $langue;

                return $this;
        }

        /**
         * Get the value of numAuteur
         */ 
        public function getNumAuteur(): Auteur
        {
                return Auteur::findById($this->numAuteur);
        }

        /**
         * Set the value of numAuteur
         *
         * @return  self
         */ 
        public function setNumAuteur(Auteur $numAuteur): self
        {
                $this->numAuteur = $numAuteur->getNum();

                return $this;
        }

        /**
         * Get the value of numGenre
         */ 
        public function getNumGenre():Genre
        {
                return Genre::findById($this->numGenre);
        }

        /**
         * Set the value of numGenre
         *
         * @return  self
         */ 
        public function setNumGenre(Genre $numGenre):self
        {
                $this->numGenre = $numGenre->getNum();

                return $this;
        }

        /**
         * Summary of getImg
         * @return mixed
         */
        public function getImg()
        {
                return $this->img;
        }

        /**
         * Set the value of img
         *
         * @return  self
         */ 
        public function setImg($img)
        {
                $this->img = $img;

                return $this;
        }

        /**
         * Récupère l'ensemble des info de la table livre. 
         * 
         * "Attention, fetch_class ignore les colonnes qui ne correspondent pas aux propriétés de la classe, 
         *  notamment celles provenant de clés étrangères ou de jointures." 
         *  Dans le cas present on utilise plutot l'attribut "fetch_obj"
         * * @return array
         */
        public static function findAll() : array
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT l.num, l.isbn, l.titre, l.prix, l.editeur, l.annee, l.langue, l.img AS Cover, 
                                        g.num AS gNum, 
                                        g.libelle AS lGenre, 
                                        a.num AS aNum, 
                                        a.nom AS aNom, 
                                        a.prenom AS aPrenom
                                    FROM livre l
                                    JOIN genre g ON l.numGenre = g.num
                                    JOIN auteur a ON l.numAuteur = a.num 
                                    ORDER BY l.num ;");
            $query->setFetchMode(PDO::FETCH_OBJ);
            $query->execute();
            $results=$query->fetchAll();

            return $results;
        }

        /**
         * Trouve un livre par son num 
         * @param int $id numéro du livre
         * @return Livre objet trouvé
         */
        public static function findById(int $id) :Livre
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("SELECT * FROM livre WHERE num = :id");
            $query->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE,'Livre');
            $query->bindParam(':id',$id);
            $query->execute();
            $result=$query->fetch();

            return $result;
        }

        /**
         * Permet d'ajouter un Livre
         * @param Livre $livre le livre a ajouter
         * @return int resultat de l'operation d'insertion de Livre (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function add(Livre $livre) : int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("INSERT INTO livre(isbn, titre, prix, editeur, annee, langue, numAuteur, numGenre, img) 
                                                VALUES (:isbn, :titre, :prix, :editeur, :annee, :langue, :numAuteur, :numGenre, :img)");
            
            $isbn = $livre->getIsbn();
            $titre = $livre->getTitre();
            $prix = $livre->getPrix();
            $editeur = $livre->getEditeur();
            $annee = $livre->getAnnee();
            $langue = $livre->getLangue();
            $nAuteur = $livre->numAuteur;
            $nGenre = $livre->numGenre;
            $img = $livre->getImg();

            $query->bindParam(':isbn',$isbn);
            $query->bindParam(':titre',$titre);
            $query->bindParam(':prix',$prix);
            $query->bindParam(':editeur',$editeur);
            $query->bindParam(':annee',$annee);
            $query->bindParam(':langue',$langue);
            $query->bindParam(':numAuteur',$nAuteur);
            $query->bindParam(':numGenre',$nGenre);
            $query->bindParam(':img',$img);

            $nb = $query->execute();
            return $nb;
        }

        /**
         * Permet de modifier un Livre
         * @param Livre $livre le Livre a modifier 
         * @return int resultat de l'operation d'insertion de Livre (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function update(Livre $livre) : int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("UPDATE livre SET 
            isbn = :isbn, 
            titre = :titre, 
            prix = :prix, 
            editeur = :editeur, 
            annee = :annee, 
            langue = :langue, 
            numAuteur = :numAuteur, 
            numGenre = :numGenre,
            img = :img 
            WHERE num = :id"); 
            
            $num = $livre->getNum();
            $isbn = $livre->getIsbn();
            $titre = $livre->getTitre();
            $prix = $livre->getPrix();
            $editeur = $livre->getEditeur();
            $annee = $livre->getAnnee();
            $langue = $livre->getLangue();
            $img = $livre->getImg();

            $query->bindParam(':id',$num);    
            $query->bindParam(':isbn',$isbn);
            $query->bindParam(':titre',$titre);
            $query->bindParam(':prix',$prix);
            $query->bindParam(':editeur',$editeur);
            $query->bindParam(':annee',$annee);
            $query->bindParam(':langue',$langue);
            $query->bindParam(':numAuteur',$livre->numAuteur);
            $query->bindParam(':numGenre',$livre->numGenre);
            $query->bindParam(':img',$img);

            $nb = $query->execute();
            return $nb;
        }

        /**
         * Permet de supprimer un Livre
         * @param Livre $livre le livre a supprimer 
         * @return int resultat de l'operation d'insertion de Livre (0 si l'insertion a échouer 1 si ça c'est bien passé)
         */
        public static function delete(Livre $livre): int 
        {
            $pdo = PDOConnexion::getInstance()->getConnection();
            $query = $pdo->prepare("DELETE FROM livre WHERE num = :id");
            $num = $livre->getNum();
            $query->bindParam(':id',$num);
            $nb = $query->execute();
            return $nb;
        }

        public static function count(?string $genre) {
                $pdo = PDOConnexion::getInstance()->getConnection();
                
                if (!empty($genre)) {
                    $query = $pdo->prepare("
                        SELECT 
                            g.libelle AS genre, 
                            COUNT(l.numGenre) AS nombre_livres,
                            (COUNT(l.numGenre) / (SELECT COUNT(*) FROM livre) * 100) AS pourcentage
                        FROM 
                            livre l
                        JOIN genre g ON l.numGenre = g.num
                        WHERE g.libelle = :genre
                        GROUP BY g.libelle
                    ");
                    $query->bindParam(':genre', $genre, PDO::PARAM_STR);
                } else {
                    $query = $pdo->prepare("SELECT COUNT(*) AS total_livres FROM livre");
                }
            
                $query->execute();
                if (!empty($genre)) {
                    $nb = $query->fetch(PDO::FETCH_ASSOC); // Utilisation de FETCH_ASSOC pour récupérer les résultats sous forme de tableau associatif
                    return [
                        'nombre_livres' => $nb['nombre_livres'],
                        'pourcentage' => $nb['pourcentage']
                    ];
                } else {
                    $nb = $query->fetch(PDO::FETCH_ASSOC);
                    return $nb['total_livres'];
                }
        }
    }