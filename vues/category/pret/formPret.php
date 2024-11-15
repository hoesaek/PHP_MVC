<!-- Fenetre de pret -->  
<div class="container py-4">
        <div class="row">
            <div class="col-md-9 mb-4">
                <h2 class="text-center"><?php echo $mode ;?> un pret</h2>
            </div>
        </div>

        <form action="index.php?uc=pret&action=validForm" method="post" 
            class="col-md-6 offset-md-3 border border-secondary p-3 rounded-3">
            <div class="form-group">
                <!-- Livre - adherent -->
                <div class="row mt-2"> 
                    <div class="col-md">
                        <label for="titre" class="form-label">Titre Du Livre</label>
                        <?php if ($mode == "Modifier"): ?>
                            <input type="text" class="form-control" id="titre" placeholder="Example Livre" name="titre" value="<?php if($mode == "Modifier") {echo $currentpret->getNumLivre()->getTitre() ;}?>" readonly>
                            <input type="hidden" name="numLivre" value="<?php echo $currentpret->getNumLivre()->getNum(); ?>">
                        <?php else: ?>
                            <select name="infoLivre" id="infoLivre" class="form-select" aria-label="Default select">
                                <option value="<?php echo $LesLivres[0]->num ?>" selected>
                                    <?php echo htmlspecialchars($LesLivres[0]->titre); ?>
                                </option>
                                <?php for ($i = 1; $i < count($LesLivres); $i++): ?>
                                    <option value="<?php echo $LesLivres[$i]->num; ?>">
                                        <?php echo htmlspecialchars($LesLivres[$i]->titre); ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        <?php endif; ?>
                         
                    </div>
                    <div class="col-md">
                        <label for="adherent" class="form-label">Adherent</label>
                        <?php if ($mode == "Modifier"): ?>
                            <!-- Afficher un champ input readonly avec la valeur de l'auteur actuel -->
                            <input type="text" name="infoAdherent" id="adherent_libelle" class="form-control" value="<?php echo htmlspecialchars($currentpret->getNumAdherent()->getNom() . " " . $currentpret->getNumAdherent()->getPrenom()); ?>" readonly>
                            <input type="hidden" name="numAdherent" value="<?php echo $currentpret->getNumAdherent()->getNum(); ?>">                        
                        <?php else: ?>
                            <!-- Afficher un select avec toutes les options -->
                            <select name="infoAdherent" id="infoAdherent" class="form-select" aria-label="Default select">
                                <option value="<?php echo $LesAdherents[0]->getNum() ?>" selected>
                                    <?php echo htmlspecialchars($LesAdherents[0]->getNom() . " " . $LesAdherents[0]->getPrenom()); ?>
                                </option>
                                <?php for ($i = 1; $i < count($LesAdherents); $i++): ?>
                                    <option value="<?php echo $LesAdherents[$i]->getNum(); ?>">
                                        <?php echo htmlspecialchars($LesAdherents[$i]->getNom() . " " . $LesAdherents[$i]->getPrenom()); ?>
                                    </option>
                                <?php endfor; ?>
                            </select>
                        <?php endif; ?>

                        </select>
                    </div>
                </div>
                <!-- datePret - dateRetourPrevue - dateRetourReelle -->
                <div class="row mt-2">
                    <div class="col-md-4">
                        <label for="datePret" class="form-label">date de Pret</label>
                        <input type="date" class="form-control" id="datePret"  name="datePret"
                        value="<?php if($mode == "Modifier") {echo $currentpret->getDatePret() ;}?>">
                    </div>
                    <div class="col-md-4">
                        <label for="dateRetourPrevue" class="form-label">date de Retour Prevue</label>
                        <input type="date" class="form-control" id="dateRetourPrevue" name="dateRetourPrevue"
                        value="<?php if($mode == "Modifier") {echo $currentpret->getDateRetourPrevue() ;}?>">
                    </div>
                    <div class="col-md-4">
                        <label for="dateRetourReelle" class="form-label">date de retour reelle</label>
                        <input type="date" class="form-control" id="dateRetourReelle" name="dateRetourReelle"
                        value="<?php if($mode == "Modifier") {echo $currentpret->getDateRetourReelle() ;}?>">
                    </div>
                </div>
            </div> 

            <input type="hidden" id="num" name="numPret" value="<?php if($mode === "Modifier") echo $currentpret->getNum() ;?>">                      
            
            <div class="row mt-4">
                <div class="col">
                    <a href="index.php?uc=pret&action=list" class="btn btn-outline-warning " role="button">Revenir à la liste</a>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-outline-success"><?php echo $mode ;?></button>
                </div>
            </div>
        </form>
    </div>
<!-- end container-->