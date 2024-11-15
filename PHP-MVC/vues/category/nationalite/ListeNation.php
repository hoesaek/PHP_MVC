<div class="container py-4">

    <!-- Titre de ma liste -->
        <div class="row mb-3">
            <div class="col-md-3"><h2>Liste des Livres</h2></div>
            <div class="col-md-6 offset-md-1"><h3>Un total de <span class="badge text-bg-success"><?php echo $nb ?></span> nationalités !</h3></div>
            <div class="col-md"><a href="index.php?uc=nationalite&action=add" class="btn btn-outline-warning" role="button">Nouvelle Nationalité</a></div>
        </div>
    <!-- End -->

            <!-- Liste des informations de la table nationalite -->
            <table class="mt-3 table table-hover table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="col-md-2">#</th>
                        <th scope="col" class="col-md-4">Nationalité</th>
                        <th scope="col" class="col-md-4">Continent</th>
                        <th scope="col" class="col-md-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    if (!empty($LesNationalites)) {
                        foreach ($LesNationalites as $nationalite): ?>
                            <tr>
                                <th scope="row" class="align-middle col-md-2"><?php echo $nationalite->num; ?></th>
                                <td class="align-middle col-md-4"><?php echo $nationalite->libelleNationalite; ?></td>
                                <td class="align-middle col-md-4"><?php echo $nationalite->libelleContinent; ?></td>
                                <td class="col-md-2">
                                    <a href="index.php?uc=nationalite&action=update&num=<?php echo $nationalite->num; ?>" class="btn btn-outline-secondary" role="button">Editer</a>
                                    <a href="#modalSuppression" 
                                    data-suppression="index.php?uc=nationalite&action=delete&num=<?php echo $nationalite->num; ?>" 
                                    type="button" class="btn btn-outline-danger" 
                                    data-bs-toggle="modal" 
                                    data-message="Êtes-vous sûr de vouloir supprimer cette nationalité ?" 
                                    data-bs-target="#modalSuppression">
                                        Supprimer
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach;
                    } else { ?>
                        <tr>
                            <td colspan="4" class="text-center">Aucune nationalité trouvée.</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <!-- End --> 
    <!-- End --> 
</div>  