<div class="container">
        <div class="row mt-5">
            <div class="col-md-3"><h2>Liste des adherents</h2></div>
            <div class="col-md-6 offset-md-1"></div>
            <div class="col-md"><a href="index.php?uc=adherent&action=add" class="btn btn-outline-warning" role="button">Nouvel adherent</a></div>
        </div>
    <div class="row">
        <?php foreach($lesAdherents as $adherent): ?>
            <div class="col-md p-3">
                <div class="card" style="width: 18rem;">
                    <img src="https://img.icons8.com/dotty/512/user.png" 
                        class="card-img-top" alt="user images">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $adherent->getNom() . " " . $adherent->getPrenom()?></h5>
                        <p class="card-text">Mel : <?php echo $adherent->getMel()?></p>
                        <p class="card-text">Num : <?php echo $adherent->getTel()?></p>
                        <!-- Pop up pour plus d'info -->
                                    <a href="#modalMoreInfo" 
                                        type="button" class="btn btn-outline-warning mb-3" 
                                        data-bs-toggle="modal" 
                                        data-moreInfo = "index.php?uc=adherent&action=list"
                                        data-message='<div class="card container" style="width: 18rem;">
                                                        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn4.iconfinder.com%2Fdata%2Ficons%2Fclassic-single-user-7%2F25%2Fsingle_user_information_1_classic_color_shadow_f-1024.png&f=1&nofb=1&ipt=61aea1fbad23f11b12a5bca9d346571090831aefdd7c53ca236b944859e379a3&ipo=images" 
                                                            class="card-img-top" alt="...">
                                                        <div class="card-body">
                                                            <div class="card-header">
                                                                <?php echo $adherent->getNom() . " " . $adherent->getPrenom()?>
                                                            </div>
                                                            <ul class="list-group list-group-flush">
                                                                <li class="list-group-item">Adresse : <?php echo $adherent->getAdrRue() . " " . $adherent->getAdrCP() . " " . $adherent->getAdrVille() ?></li>
                                                                <li class="list-group-item">Mel : <?php echo $adherent->getMel() ?></li>
                                                                <li class="list-group-item">Tél : <?php echo $adherent->getTel() ?></li>
                                                                <!-- <button type="button" class="btn btn-outline-warning">Pret</button>                                                        -->
                                                            </ul> 
                                                        </div>
                                                    </div>'

                                        data-bs-target="#modalMoreInfo">
                                            More info
                                    </a> </br>
                            <a href="index.php?uc=adherent&action=update&num=<?php echo $adherent->getNum(); ?>" class="btn btn-outline-secondary" role="button">Editer</a>
                            <a href="#modalSuppression" 
                                data-suppression="index.php?uc=adherent&action=delete&num=<?php echo $adherent->getNum(); ?>" 
                                type="button" class="btn btn-outline-danger" 
                                data-bs-toggle="modal" 
                                data-message="Êtes-vous sûr de vouloir supprimer ce adherent ?" 
                                data-bs-target="#modalSuppression">
                                    Supprimer
                            </a>
                        
                    </div>
                </div>
            </div>
        <?php endforeach;?>
    </div>
</div>



