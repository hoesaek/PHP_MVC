<div class="container py-4">

    <!-- Titre de ma liste -->
        <div class="row mb-3">
            <div class="col-md-9"><h2>Liste des genre</h2></div>
            <div class="col-md-3">
                <a href="index.php?uc=genre&action=add" class="btn btn-outline-warning" role="button">Nouveau genre</a>
            </div>
        </div>
    <!-- End -->

    <!-- Liste des informations de la table nationalite -->
        <table class="mt-3 table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col" class="col-md-2">#</th>
                    <th scope="col" class="col-md-8">Genre</th>
                    <th scope="col" class="col-md-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if (!empty($lesGenres)) {
                    foreach ($lesGenres as $genre): ?>
                        <tr>
                            <th scope="row" class="align-middle col-md-2"><?php echo $genre->getNum(); ?></th>
                            <td class="align-middle col-md-4"><?php echo $genre->getLibelle(); ?></td>
                            <!-- modale pour la confirmation de suppression -->
                                <td class="col-md-2">
                                    <a href="index.php?uc=genre&action=update&num=<?php echo $genre->getNum(); ?>" class="btn btn-outline-secondary" role="button">Editer</a>
                                    <a href="#modalSuppression" 
                                    data-suppression="index.php?uc=genre&action=delete&num=<?php echo $genre->getNum(); ?>" 
                                    type="button" class="btn btn-outline-danger" 
                                    data-bs-toggle="modal" 
                                    data-message="Êtes-vous sûr de vouloir supprimer ce continent ?" 
                                    data-bs-target="#modalSuppression">
                                        Supprimer
                                    </a>
                                </td>
                            <!-- End -->
                        </tr>
                    <?php endforeach;
                } else { ?>
                    <tr>
                        <td colspan="4" class="text-center">Aucun continent trouvé.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <!-- End --> 
</div>  