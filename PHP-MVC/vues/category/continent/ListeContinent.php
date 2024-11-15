<div class="container py-4">
    <!-- Titre de ma liste -->
    <div class="row mb-3">
        <div class="col-md-3"><h2>Liste des Continent</h2></div>
        <div class="col-md-6 offset-md-1"></div>
        <div class="col-md m-2">
            <a href="index.php?uc=continent&action=add" class="btn btn-outline-primary mb-2" role="button">Nouveau continent</a>
            <a href="index.php?uc=continent&action=list" class="btn btn-outline-secondary" role="button" aria-label="Revenir à la liste">
                Revenir à la liste
            </a>
        </div>
    </div>
    <!-- End -->

     <!-- Liste des informations de la table nationalite -->
     <table class="mt-3 table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col" class="col-md-2">#</th>
                    <th scope="col" class="col-md-8">Continent</th>
                    <th scope="col" class="col-md-2">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                if(empty($mode) && !$result): ?>
                <?php if (!empty($LesContinents)): ?>
                    <?php foreach ($LesContinents as $continent): ?>
                        <tr>
                            <th scope="row" class="align-middle"><?php echo htmlspecialchars($continent->getNum(), ENT_QUOTES, 'UTF-8'); ?></th>
                            <td class="align-middle"><?php echo htmlspecialchars($continent->getLibelle(), ENT_QUOTES, 'UTF-8'); ?></td>
                            <td class="text-center">
                                <a href="index.php?uc=continent&action=update&num=<?php echo $continent->getNum(); ?>" 
                                   class="btn btn-outline-secondary btn-sm" role="button" aria-label="Modifier le continent">
                                    Éditer
                                </a>
                                <a href="#modalSuppression" 
                                   data-suppression="index.php?uc=continent&action=delete&num=<?php echo $continent->getNum(); ?>" 
                                   class="btn btn-outline-danger btn-sm" 
                                   data-bs-toggle="modal" 
                                   data-message="Êtes-vous sûr de vouloir supprimer ce continent ?" 
                                   data-bs-target="#modalSuppression" 
                                   aria-label="Supprimer le continent">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center text-muted">Aucun continent trouvé.</td>
                    </tr>
                <?php endif; ?>
            <?php elseif ($result): ?>
                <tr>
                    <?php 
                    // var_dump($result) 
                    foreach ($result as $continent):?>   
                        <tr>
                            <th scope="row" class="align-middle">
                                <?php echo htmlspecialchars($continent->getNum(), ENT_QUOTES, 'UTF-8'); ?>
                            </th>
                            <td class="align-middle">
                                <?php echo htmlspecialchars($continent->getLibelle(), ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td class="text-center">
                                <a href="index.php?uc=continent&action=update&num=<?php echo $continent->getNum(); ?>" 
                                class="btn btn-outline-secondary btn-sm" role="button" aria-label="Modifier le continent">
                                    Éditer
                                </a>
                                <a href="#modalSuppression" 
                                data-suppression="index.php?uc=continent&action=delete&num=<?php echo $continent->getNum(); ?>" 
                                class="btn btn-outline-danger btn-sm" 
                                data-bs-toggle="modal" 
                                data-message="Êtes-vous sûr de vouloir supprimer ce continent ?" 
                                data-bs-target="#modalSuppression" 
                                aria-label="Supprimer le continent">
                                    Supprimer
                                </a>
                            </td>
                        </tr>
                    <?php endforeach?>
                </tr>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center text-muted">Aucun résultat trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <!-- Fin de la liste -->
</div>
