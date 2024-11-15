        <!-- Ajout d'un auteur -->  
        <div class="container py-4">
            <div class="row">
                <div class="col-md-9 mb-4"><h2 class="text-center"><?php echo $mode ;?> un auteur</h2></div>
            </div>
            <form action="index.php?uc=auteur&action=validForm" method="post" class="col-md-6 offset-md-3 border border-secondary p-3 rounded-3">
                <div class="row text-center">
                    <!-- Modification ou nouvel auteur -->
                        <div class="col-md-6 form-group">
                            <label for="auteur_libelle" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" placeholder="Doe..." name="nom" 
                                value="<?php if($mode == "Modifier") echo $currentAuteur->getNom(); ?>">
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="auteur_libelle" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="auteur_libelle" placeholder="John..." name="prenom" 
                                value="<?php if($mode == "Modifier") echo $currentAuteur->getPrenom(); ?>">
                            <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") echo $currentAuteur->getNum(); ?>">
                        </div>
                    <!-- end -->
                </div>
                <div class="row mt-2 text-center">
                    <!-- Modification ou nouvelle  Nationalité-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="auteur" class="form-label">Nationalité</label>
                                <?php if ($mode == "Modifier"): ?>
                                    <!-- Afficher un champ input readonly avec la valeur du genre actuel -->
                                    <input type="hidden" name="auteur" value="<?php echo $currentAuteur->getNum(); ?>">    
                                    <select name="nationalite" id="nationalite" class="form-select" >
                                        <option value="<?php echo $currentAuteur->getNumNationalite()->getNum(); ?>" selected >
                                            <?php echo $currentAuteur->getNumNationalite()->getLibelle(); ?>
                                        </option>

                                        <?php for ($i = 0; $i < count($LesNationalites); $i++): ?>
                                            <?php if ($LesNationalites[$i]->libelleNationalite != $currentAuteur->getNumNationalite()->getLibelle()): ?>
                                                <option value="<?php echo $LesNationalites[$i]->num; ?>">
                                                    <?php echo $LesNationalites[$i]->libelleNationalite?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endfor; ?>
                                    </select>
                        
                                <?php else: ?>
                                    <!-- Afficher un select avec toutes les options -->
                                    <select name="nationalite" id="nationalite" class="form-select" aria-label="Ajoutez une nouvelle Nationalité">

                                        <option value="<?php echo $LesNationalites[0]->num; ?>" selected> 
                                            <?php echo $LesNationalites[0]->libelleNationalite; ?>
                                        </option>

                                        <?php for ($i = 1; $i < count($LesNationalites); $i++): ?>
                                            <option value="<?php echo $LesNationalites[$i]->num; ?>">
                                                <?php echo $LesNationalites[$i]->libelleNationalite; ?>
                                            </option>
                                        <?php endfor; ?>
                                    </select>
                            <?php endif; ?>
                            </div>
                        </div>
                    <!-- end -->
                    <!-- Modification ou nouvelle date de naissance -->
                        <div class="col-md-6">
                            <label for="date_naissance" class="form-label">Date de naissance</label>
                            <input type="date" name="date_naissance" id="date_naissance"  
                                value="<?php if($mode == "Modifier") echo $currentAuteur->getDate_naissance();?>" 
                                class="form-control">
                        </div>                                                                                          
                    <!-- end -->
                </div>

                <div class="row mt-4">
                    <div class="col">
                        <a href="index.php?uc=auteur&action=list" class="btn btn-outline-warning "  role="button">Revenir à la liste</a>
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-outline-success"><?php echo $mode ;?></button>
                    </div>
                </div>
            </form>
        </div><!-- end container-->