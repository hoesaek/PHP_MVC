<div class="container py-4">
    <!-- bouton-->
    <div class="col-md offset-md-9">
        <a href="index.php?uc=pret&action=add" class="btn btn-success" role="button">Nouveau Prêt</a>
    </div>
    <!-- End -->

     <div class="row">    
        <div class="col-md-4 offset-md-6 mt-3">   
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
     <?php 
        if (!empty($LesPrets)) { ?>
            <div class="col-md-4 offset-md-1 mb-3 mb-sm-0">
                <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary rounded-3 " style="width: 380px; height: 520px; overflow-y: auto;">
                    <a href="index.php?uc=pret&action=list" class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom ">
                        <span class="fs-5 fw-semibold badge text-bg-warning ">Liste des prets</span>
                    </a>
                    <div class="list-group list-group-flush border-bottom " id="scrollableList" style="overflow-y: auto;">
                        <?php foreach ($LesPrets as $pret): ?>
                            <a href="index.php?uc=pret&action=list&numPret=<?php echo $pret->numPret; ?>" 
                                class="list-group-item list-group-item-action list-group-item-secondary <?php if (isset($_GET['numPret']) && $pret->numPret == $_GET['numPret']) { echo 'active'; } ?> py-3 lh-sm">
                                
                                <div class="d-flex w-100 align-items-center justify-content-between">
                                    <strong class="mb-1"><?php echo $pret->nomAdherent . " " . $pret->prenomAdherent; ?></strong>
                                    <em><small><?php echo $pret->datePret; ?></small></em>
                                </div>
                                <div class="col-10 mb-1 small text-center">Livre emprunté : <em><?php echo $pret->Livre ?></em></div>
                            </a>

                        <?php endforeach; ?>
                    </div>
                </div>
            </div>


            <?php if(!empty($currentpret)){ ?>
                <div class="card col-md-4 offset-md-3 ms-3 mt-5" style="width: 35rem; height: 25rem;">
                    <div class="row">
                        <div class="card-body col-md-8">
                            <div class="card-header text-center">
                                <?php echo $currentpret->getNumAdherent()->getNom() . " " . $currentpret->getNumAdherent()->getPrenom() ?>
                            </div>
                            <div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <p class="text-center">
                                            <strong>
                                                Livre emprunté :<br><em><?php echo $currentpret->getNumLivre()->getTitre() ?></em>
                                            </strong>
                                        </p>
                                    </li>
                                    <li class="list-group-item">Emprunté le :<br><?php echo $currentpret->getDatePret() ?></li>
                                    <li class="list-group-item">Date prévue de retour le : <?php echo $currentpret->getDateRetourPrevue() ?></li>
                                    <li class="list-group-item">Date réelle de retour le : <?php echo $currentpret->getDateRetourReelle() ?></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4 bg-dark bg-gradient"></div>
                    </div>
                    <div class="d-grid gap-2">
                        <div class="position-absolute bottom-0 start-5 mb-2">
                            <!-- Bouton pour éditer -->
                            <a href="/index.php?uc=pret&action=update&numPret=<?php echo $currentpret->getNum() ?>" 
                            class="btn btn-outline-secondary" 
                            role="button">
                                Éditer
                            </a>
                        </div>
                        <div class="position-absolute bottom-0 start-50 mb-2">
                            <!-- Bouton pour supprimer -->
                            <a href="#modalSuppression" 
                            data-suppression="index.php?uc=pret&action=delete&numPret=<?php echo $currentpret->getNum() ?>" 
                            type="button" 
                            class="btn btn-outline-danger" 
                            data-bs-toggle="modal" 
                            data-message="Êtes-vous sûr de vouloir supprimer ce prêt ?" 
                            data-bs-target="#modalSuppression">
                                Supprimer
                            </a>
                        </div>
                    </div>
                </div>
            <?php } else{ ?>
            <!-- else -->
            <div class="card col-md-4 offset-md-3 ms-3 mt-5" style="width: 35rem; height: 25rem;" aria-hidden="true">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-header text-center placeholder-glow mt-5">
                                <span class="placeholder col-6"></span>
                            </h5>
                            <span class="placeholder col-7"></span>
                            <span class="placeholder col-4"></span>
                            <span class="placeholder col-4"></span>
                            <span class="placeholder col-8"></span>
                            <span class="placeholder col-6"></span>
                            <span class="placeholder col-4"></span>
                            <span class="placeholder col-7"></span>
                            <span class="placeholder col-6"></span>
                            
                        </div>
                    </div>
                    <div class="col-md-4 bg-dark bg-gradient"></div>
                    <a class="btn btn-outline-secondary disabled placeholder position-absolute col-2 bottom-0 start-5 ms-2 mb-2" aria-disabled="true"></a>
                    <a class="btn btn-outline-danger placeholder position-absolute col-2 bottom-0 start-50 mb-2" aria-disabled="true"></a>
                </div>
            </div>
            <?php } ?>    
        <?php } else { ?>
                <h5 colspan="4" class="text-center">Aucun pret trouvé.</h5>
        <?php } ?>  
     </div>
</div>
<!-- End --> 
