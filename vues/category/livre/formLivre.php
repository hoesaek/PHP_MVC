<!-- Fenetre de continents -->  
    <div class="container py-4">
        <div class="row">
            <div class="col-md-9 mb-4">
                <h2 class="text-center"><?php echo $mode ;?> un livre</h2>
            </div>
        </div>

        <form action="index.php?uc=livre&action=validForm" method="post" 
            class="col-md-6 offset-md-3 border border-secondary p-3 rounded-3">
            <div class="form-group">
                <!-- Titre - isbn -->
                <div class="row mt-2"> 
                    <div class="col-md">
                        <label for="titre" class="form-label">Titre</label>
                        <input type="text" class="form-control" id="titre" placeholder="Example Livre" name="titre"
                        value="<?php if($mode == "Modifier") {echo $livre->getTitre() ;}?>">
                    </div>
                    <div class="col-md">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="text" class="form-control" id="isbn" placeholder="XXX-XXX-XXX" name="isbn"
                        value="<?php if($mode == "Modifier") {echo $livre->getIsbn() ;}?>">
                    </div>
                </div>
                <!-- editeur - annee - langue -->
                <div class="row mt-2">
                    <div class="col-md-4">
                        <label for="editeur" class="form-label">Editeur</label>
                        <input type="text" class="form-control" id="editeur" placeholder="Mr. XXX" name="editeur"
                        value="<?php if($mode == "Modifier") {echo $livre->getEditeur() ;}?>">
                    </div>
                    <div class="col-md">
                        <label for="annee" class="form-label">Annee</label>
                        <input type="number" class="form-control" id="annee" placeholder="XX/XX/XXXX" name="annee"
                        value="<?php if($mode == "Modifier") {echo $livre->getAnnee() ;}?>">
                    </div>
                    <div class="col-md">
                        <label for="langue" class="form-label">Langue</label>
                        <input type="text" class="form-control" id="langue" placeholder="Langue" name="langue"
                        value="<?php if($mode == "Modifier") {echo $livre->getLangue() ;}?>">
                    </div>
                </div>
                <!-- Auteur - genre en select option-->
                <div class="row mt-2">
                    <div class="col-md">
                        <label for="auteur" class="form-label">Auteur</label>
                        <?php if ($mode == "Modifier"): ?>
                            <!-- Afficher un champ input readonly avec la valeur de l'auteur actuel -->
                            <input type="text" name="auteur_libelle" id="auteur_libelle" class="form-control" value="<?php echo htmlspecialchars($livre->getNumAuteur()->getNom() . " " . $livre->getNumAuteur()->getPrenom()); ?>" readonly>
                            <input type="hidden" name="auteur" value="<?php echo $livre->getNumAuteur()->getNum(); ?>">                        
                        <?php else: ?>
                            <!-- Afficher un select avec toutes les options -->
                            <select name="auteur" id="auteur" class="form-select" aria-label="Default select example">
                                <option value="<?php echo $LesAuteurs[0]->num; ?>" selected>
                                    <?php echo htmlspecialchars($LesAuteurs[0]->nom . " " . $LesAuteurs[0]->prenom); ?>
                                </option>
                                <?php for ($i = 1; $i < count($LesAuteurs); $i++): ?>
                                    <option value="<?php echo $LesAuteurs[$i]->num; ?>">
                                        <?php echo htmlspecialchars($LesAuteurs[$i]->nom . " " . $LesAuteurs[$i]->prenom); ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        <?php endif; ?>

                        </select>
                    </div>
                    <!-- End -->
                    <div class="col-md">
                        <label for="genre" class="form-label">Genre</label>
                        <?php if ($mode == "Modifier"): ?>
                            <!-- Afficher un champ input readonly avec la valeur du genre actuel -->
                            <input type="text" name="genre_libelle" id="genre_libelle" class="form-control" value="<?php echo htmlspecialchars($livre->getNumGenre()->getLibelle()); ?>" readonly>
                            <input type="hidden" name="genre" value="<?php echo $livre->getNumGenre()->getNum(); ?>">                        
                        <?php else: ?>
                            <!-- Afficher un select avec toutes les options -->
                            <select name="genre" id="genre" class="form-select" aria-label="Default select example">
                                <option value="<?php echo $LesGenres[0]->getNum(); ?>" selected>
                                    <?php echo $LesGenres[0]->getLibelle(); ?>
                                </option>
                                <?php for ($i = 1; $i < count($LesGenres); $i++): ?>
                                    <option value="<?php echo $LesGenres[$i]->getNum(); ?>">
                                        <?php echo $LesGenres[$i]->getLibelle(); ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        <?php endif; ?>
                    </div>
                </div>
                <!-- img -->
                <div class="row mt-2">
                    <div class="col-md-12">
                        <label for="img" class="form-label">Image de Couverture</label>
                        <textarea class="form-control text-center" id="img" name="img" style="overflow: hidden; height: 150px;"><?php if ($mode == "Modifier") { echo $livre->getImg(); } ?></textarea>
                    </div>
                </div>
                <!-- Prix-->
                <div class="row mt-2">
                    <div class="col-md-6 offset-md-3">
                        <label for="isbn" class="form-label ">Prix</label>
                        <input type="number" class="form-control text-center" id="prix" placeholder="00.00" name="prix"
                        value="<?php if($mode == "Modifier") {echo $livre->getPrix() ;}?>">
                    </div>
                </div>
            </div> 

            <input type="hidden" id="num" name="numLivre" value="<?php if($mode === "Modifier") echo $livre->getNum() ;?>">                      
            
            <div class="row mt-4">
                <div class="col">
                    <a href="index.php?uc=livre&action=list" class="btn btn-outline-warning " role="button">Revenir à la liste</a>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-outline-success"><?php echo $mode ;?></button>
                </div>
            </div>
        </form>
    </div>
<!-- end container-->