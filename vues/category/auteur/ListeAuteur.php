<div class="container py-4">

    <!-- Titre de ma liste -->
        <div class="row mb-3">
            <div class="col-md-3"><h2>Liste des Auteurs</h2></div>
            <div class="col-md-6 offset-md-1"><h3>Un total de <span class="badge text-bg-success"><?php echo $nb ?></span> auteurs !</h3></div>
            <div class="col-md"><a href="index.php?uc=auteur&action=add" class="btn btn-outline-warning" role="button">Nouvel auteur</a></div>
        </div>
    <!-- End -->

    <!-- Main -->
        <!-- Liste des informations de la table nationalite -->
            <?php 
            if (!empty($LesAuteurs)) {?>
                <div class="row">
                    <?php foreach ($LesAuteurs as $auteur): ?>
                        <div class="col-md-6 mt-4">
                            <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                                <div class="col p-4 d-flex flex-column position-static">
                                    <strong class="d-inline-block mb-2 <?php echo ($auteur->num % 2 === 0) ? "text-primary-emphasis" : "text-success-emphasis"; ?>">Auteur</strong>
                                    <h3 class="mb-0"><?php echo $auteur->prenom . " " . $auteur->nom ?></h3>
                                    <div class="mb-1 text-body-secondary"><?php echo $auteur->date_formatee; ?></div>
                                    <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                                    <a href="index.php?uc=auteur&action=update&num=<?php echo $auteur->num; ?>" class="icon-link gap-1">
                                        Modifier
                                        <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
                                    </a>
                                </div>
                                <div class="col-auto d-none d-lg-block">
                                    <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo $auteur->libelleNationalite?></text></svg>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php } else { ?>
                <h5>Aucun auteur trouvé.</h5>
                </tr>
            <?php } ?>
        <!-- End -->
    </div>
    <!-- End --> 
</div>  


