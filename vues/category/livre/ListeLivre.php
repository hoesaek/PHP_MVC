<div class="container py-4">

    <!-- Titre de ma liste -->
        <div class="row mb-3">
            <div class="col-md-3">
                <h2>Liste des Livres</h2>
            </div>
            <div class="col-md-3 offset-md-6">
                <a href="index.php?uc=pret&action=list" class="btn btn-outline-info" role="button">Pret</a>
                <a href="index.php?uc=livre&action=add" class="btn btn-outline-success" role="button">Nouveau Livre</a>
            </div>
        </div>
    <!-- End -->


    
    <div class="row">
        <?php 
            if (!empty($LesLivres)) {
                foreach ($LesLivres as $livre): ?>
                        <div class="card col-md-6 m-2" style="width: 18rem;">
                            <img src="<?php echo htmlspecialchars($livre->Cover); ?>" class="card-img-top img-fluid img-thumbnail mt-3" alt="<?php echo htmlspecialchars($livre->titre); ?>">
                            
                            <div class="card-body">
                                <!-- Bouton pour plus d'infos / Titre -->
                                    <p class="text-center"><a href="#modalMoreInfo" 
                                        type="button" 
                                        class="btn btn-outline-warning" 
                                        data-bs-toggle="modal" 
                                        data-moreInfo="index.php?uc=livre&action=list"
                                        data-message='
                                                <div class="card container" style="width: 35rem;">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <img src="<?php echo htmlspecialchars($livre->Cover); ?>" class="card-img-top img-thumbnail mt-3" alt="<?php echo htmlspecialchars($livre->titre); ?>">
                                                        </div>
                                                        <div class="card-body col-md-6">
                                                            <div class="card-header">
                                                                <?php echo htmlspecialchars($livre->titre); ?>
                                                            </div>
                                                            <div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item"><strong>Numéro :</strong> <?php echo htmlspecialchars($livre->num); ?></li>
                                                                    <li class="list-group-item"><strong>Titre :</strong> <?php echo htmlspecialchars($livre->titre); ?></li>
                                                                    <li class="list-group-item"><strong>Auteur :</strong> <?php echo htmlspecialchars($livre->aNom . ' ' . $livre->aPrenom); ?></li>
                                                                    <li class="list-group-item"><strong>Genre :</strong> <?php echo htmlspecialchars($livre->lGenre); ?></li>
                                                                    <li class="list-group-item"><strong>Prix :</strong> <?php echo htmlspecialchars($livre->prix); ?>€</li>
                                                                    <li class="list-group-item"><strong>Éditeur :</strong> <?php echo htmlspecialchars($livre->editeur); ?></li>
                                                                    <li class="list-group-item"><strong>Année :</strong> <?php echo htmlspecialchars($livre->annee); ?></li>
                                                                    <li class="list-group-item"><strong>Langue :</strong> <?php echo htmlspecialchars($livre->langue); ?></li>
                                                                    <li class="list-group-item"><strong>ISBN :</strong> <?php echo htmlspecialchars($livre->isbn); ?></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <!-- <a href="index.php?uc=pret&action=list&numLivre=<?php echo htmlspecialchars($livre->num); ?>&type=livre" class="btn btn-outline-warning d-grid" type="button" >Prêt</a> -->
                                                    </div>
                                                </div>
                                                '
                                        data-bs-target="#modalMoreInfo">
                                        <?php echo $livre->titre; ?>
                                        </a>
                                    </p> 
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item"><?php echo htmlspecialchars($livre->aNom . ' ' . $livre->aPrenom); ?></li>
                                            <li class="list-group-item">Éditer par : <?php echo htmlspecialchars($livre->editeur); ?></li>
                                            <li class="list-group-item mb-2">
                                                <p class="text-center">
                                                    <strong>
                                                        <?php echo htmlspecialchars($livre->prix); ?>€
                                                    </strong>
                                                </p>
                                            </li>
                                        </ul>
                                        </br>
                                        <div class="d-grid gap-2">
                                            <div class="position-absolute bottom-0 start-5 mb-2">
                                                <!-- Bouton pour éditer -->
                                                <a href="/index.php?uc=livre&action=update&num=<?php echo $livre->num; ?>" 
                                                class="btn btn-outline-secondary" 
                                                role="button">
                                                    Éditer
                                                </a>
                                            </div>
                                            <div class="position-absolute bottom-0 start-50 mb-2">
                                                <!-- Bouton pour supprimer -->
                                                <a href="#modalSuppression" 
                                                data-suppression="index.php?uc=livre&action=delete&num=<?php echo urlencode($livre->num); ?>" 
                                                type="button" 
                                                class="btn btn-outline-danger" 
                                                data-bs-toggle="modal" 
                                                data-message="Êtes-vous sûr de vouloir supprimer ce livre ?" 
                                                data-bs-target="#modalSuppression">
                                                    Supprimer
                                                </a>
                                            </div>
                                        </div>
                            </div>
                        </div>
                        <?php endforeach;
            } else { ?>
                <h5 colspan="4" class="text-center">Aucun livre trouvé.</h5>
        <?php } ?>
    </div>
    
    <!-- End --> 
</div>  