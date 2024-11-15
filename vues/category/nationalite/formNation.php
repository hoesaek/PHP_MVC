        <!-- Ajout de Nationalité -->  
        <div class="container py-4">
            <div class="row">
                <div class="col-md-9 mb-4"><h2 class="text-center"><?php echo $mode ;?> une nationalité</h2></div>
            </div>
            <form action="index.php?uc=nationalite&action=validForm" method="post" class="col-md-6 offset-md-3 border border-secondary p-3 rounded-3">
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="nationalite_libelle" class="form-label">Nationalité</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="libelle" 
                            placeholder="Exemple Nationalité" 
                            name="nationalite_libelle" 
                            value="<?php if($mode == 'Modifier') echo $laNationalite->getLibelle(); ?>"
                        >
                        <input 
                            type="hidden" 
                            id="num" 
                            name="numNationalite" 
                            value="<?php if($mode == 'Modifier') echo $laNationalite->getNum(); ?>"
                        >
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="continent" class="form-label">Continent</label>
                            <?php if ($mode == "Modifier"): ?>
                                <input 
                                    type="hidden" 
                                    name="numContinent" 
                                    value="<?php echo $laNationalite->getNumContinent()->getNum(); ?>"
                                >    

                                <select 
                                    name="continent" 
                                    id="continent" 
                                    class="form-select" 
                                    aria-label="Default select example"
                                >
                                    <option 
                                        value="<?php echo $laNationalite->getNumContinent()->getNum(); ?>" 
                                        selected
                                    >
                                        <?php echo $laNationalite->getNumContinent()->getLibelle(); ?>
                                    </option>
                                    <?php for ($i = 1; $i < count($LesContinents); $i++): ?>
                                        <?php if ($LesContinents[$i]->getLibelle() != $laNationalite->getNumContinent()->getLibelle()): ?>
                                            <option value="<?php echo $LesContinents[$i]->getNum(); ?>">
                                                <?php echo $LesContinents[$i]->getLibelle(); ?>
                                            </option>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </select>
                            <?php else: ?>
                                <!-- Afficher un select avec toutes les options -->
                                <select 
                                    name="continent" 
                                    id="continent" 
                                    class="form-select" 
                                    aria-label="Default select example"
                                >
                                    <option 
                                        value="<?php echo $LesContinents[0]->getNum(); ?>" 
                                        selected
                                    >
                                        <?php echo $LesContinents[0]->getLibelle(); ?>
                                    </option>
                                    <?php for ($i = 1; $i < count($LesContinents); $i++): ?>
                                        <option value="<?php echo $LesContinents[$i]->getNum(); ?>">
                                            <?php echo $LesContinents[$i]->getLibelle(); ?>
                                        </option>
                                    <?php endfor; ?>
                                </select>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>



                <div class="row mt-4">
                    <div class="col">
                        <a href="index.php?uc=nationalite&action=list" class="btn btn-outline-warning "  role="button">Revenir à la liste</a>
                    </div>

                    <div class="col">
                        <button type="submit" class="btn btn-outline-success"><?php echo $mode ;?></button>
                    </div>
                </div>
            </form>
        </div><!-- end container-->