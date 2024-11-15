<!-- liste livre -->
    <tr>
        <th scope="row" class="align-middle col-md"><?php echo $livre->num; ?></th>
        <td class="align-middle col-md"><?php echo $livre->titre; ?></td><!-- Titre fait-->
        <td class="align-middle col-md"><?php echo $livre->aNom; ?></td><!-- nom Auteur proviennant d'autre table fait-->
        <td class="align-middle col-md"><?php echo $livre->aPrenom; ?></td><!-- prenom Auteur proviennant d'autre table fait-->
        <td class="align-middle col-md"><?php echo $livre->lGenre; ?></td><!-- Genre proviennant d'autre table -->
        <td class="align-middle col-md"><?php echo $livre->prix; ?>.00€</td><!-- Prix -->
        <td class="align-middle col-md"><?php echo $livre->editeur; ?></td><!-- Éditeur -->
        <td class="align-middle col-md"><?php echo $livre->annee; ?></td><!-- Annee -->
        <td class="align-middle col-md"><?php echo $livre->langue; ?></td><!-- Langue -->
        <td class="align-middle col-md"><?php echo $livre->isbn; ?></td><!-- Isbn -->
        <td class="col-md">
            <!-- <?php var_dump($livre->aNum , $livre->gNum) ?> -->
            <a href="/index.php?uc=livre&action=update&num=<?php echo $livre->num; ?>&numAuteur=<?php echo $livre->aNum; ?>&numGenre=<?php echo $livre->gNum; ?>" class="btn btn-outline-secondary" role="button">Editer</a>
            <!-- modale pour la confirmation de suppression -->
                <a href="#modalSuppression" 
                data-suppression="index.php?uc=livre&action=delete&num=<?php echo $livre->num; ?>" 
                type="button" class="btn btn-outline-danger" 
                data-bs-toggle="modal" 
                data-message="Êtes-vous sûr de vouloir supprimer ce livre ?" 
                data-bs-target="#modalSuppression">
                    Supprimer
                </a>
            </td>
        <!-- End -->
    </tr>

    <td class="col-md">
        <a href="/index.php?uc=livre&action=update&num=<?php echo $livre->num; ?>&numAuteur=<?php echo $livre->aNum; ?>&numGenre=<?php echo $livre->gNum; ?>" class="btn btn-outline-secondary" role="button">Editer</a>
            <!-- modale pour la confirmation de suppression -->
                <a href="#modalSuppression" 
                data-suppression="index.php?uc=livre&action=delete&num=<?php echo $livre->num; ?>" 
                type="button" class="btn btn-outline-danger" 
                data-bs-toggle="modal" 
                data-message="Êtes-vous sûr de vouloir supprimer ce livre ?" 
                data-bs-target="#modalSuppression">
                    Supprimer
        </a>
    </td>       
<!-- End -->

<!-- More info Livre -->
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
                                                            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn.wallpapersafari.com%2F83%2F55%2Fjp8GTn.jpg&f=1&nofb=1&ipt=9003782aa18c6e41cb8d0bdc87bc80d8bd410d865cb3d9dad56ec1628c0aace4&ipo=images" 
                                                        </div>
                                                        <div class="card-body col-md-6">
                                                            <div class="card-header">
                                                                <?php echo $currentpret->getNumAdherent()->getNom() . " " . $currentpret->getNumAdherent()->getPrenom() ?>
                                                            </div>
                                                            <div>
                                                                <ul class="list-group list-group-flush">
                                                                    <li class="list-group-item">
                                                                        <p class="text-center">
                                                                            <strong>
                                                                                Livre emprunté :</br> <em><?php echo $currentpret->getNumLivre()->getTitre() ?></em>
                                                                            </strong>
                                                                        </p>
                                                                    </li>
                                                                    <li class="list-group-item">Emprunter le : </br><?php echo $currentpret->getDatePret() ?></li>
                                                                    <li class="list-group-item">Date prévue de retour le : <?php echo $currentpret->getDateRetourPrevue() ?></li>
                                                                    <li class="list-group-item">Date réelle de retour le : <?php echo $currentpret->getDateRetourReelle() ?></li>
                                                                </ul>
                                                            </div>
                                                        </div>
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
                                                '
                                        data-bs-target="#modalMoreInfo">
                                        <?php echo $pret->titre; ?>
                                        </a>
                                    </p>
                                <!-- end moreinfo -->
<!-- End -->

<!-- bin sql script -->
 ```sql
    UPDATE `auteur` SET `num`=1, `nom`='Dostoeïvski', `prenom`='Fédor', `numNationalite`=1, `date_naissance`='1821-11-11' WHERE `num`=1;
    UPDATE `auteur` SET `num`=2, `nom`='Semprun', `prenom`='Jorge', `numNationalite`=2, `date_naissance`='1923-12-10' WHERE `num`=2;
    UPDATE `auteur` SET `num`=3, `nom`='Tolstoï', `prenom`='Leon', `numNationalite`=1, `date_naissance`='1828-09-09' WHERE `num`=3;
    UPDATE `auteur` SET `num`=4, `nom`='Steinbeck', `prenom`='John', `numNationalite`=3, `date_naissance`='1902-02-27' WHERE `num`=4;
    UPDATE `auteur` SET `num`=5, `nom`='Ferro', `prenom`='Marc', `numNationalite`=4, `date_naissance`='1924-04-27' WHERE `num`=5;
    UPDATE `auteur` SET `num`=6, `nom`='Stocker', `prenom`='Bram', `numNationalite`=5, `date_naissance`='1847-11-08' WHERE `num`=6;
    UPDATE `auteur` SET `num`=7, `nom`='Shelley', `prenom`='Marie', `numNationalite`=6, `date_naissance`='1797-08-30' WHERE `num`=7;
    UPDATE `auteur` SET `num`=8, `nom`='King', `prenom`='Stephen', `numNationalite`=3, `date_naissance`='1947-09-21' WHERE `num`=8;
    UPDATE `auteur` SET `num`=9, `nom`='Grass', `prenom`='Günter', `numNationalite`=7, `date_naissance`='1927-10-16' WHERE `num`=9;
    UPDATE `auteur` SET `num`=10, `nom`='Barjavel', `prenom`='René', `numNationalite`=4, `date_naissance`='1911-01-24' WHERE `num`=10;
    UPDATE `auteur` SET `num`=11, `nom`='Simmons', `prenom`='Dan', `numNationalite`=3, `date_naissance`='1948-04-04' WHERE `num`=11;
    UPDATE `auteur` SET `num`=12, `nom`='Herbert', `prenom`='Frank', `numNationalite`=3, `date_naissance`='1920-10-08' WHERE `num`=12;
    UPDATE `auteur` SET `num`=13, `nom`='Clarke', `prenom`='Arthur C.', `numNationalite`=6, `date_naissance`='1917-12-16' WHERE `num`=13;
    UPDATE `auteur` SET `num`=14, `nom`='Bradbury', `prenom`='Ray', `numNationalite`=3, `date_naissance`='1920-08-22' WHERE `num`=14;
    UPDATE `auteur` SET `num`=15, `nom`='Dick', `prenom`='Philip K.', `numNationalite`=3, `date_naissance`='1928-12-16' WHERE `num`=15;
    UPDATE `auteur` SET `num`=16, `nom`='Orwell', `prenom`='Georges', `numNationalite`=6, `date_naissance`='1903-06-25' WHERE `num`=16;
    UPDATE `auteur` SET `num`=17, `nom`='Hugo', `prenom`='Victor', `numNationalite`=4, `date_naissance`='1802-02-26' WHERE `num`=17;
    UPDATE `auteur` SET `num`=18, `nom`='Zola', `prenom`='Emile', `numNationalite`=4, `date_naissance`='1840-04-02' WHERE `num`=18;
    UPDATE `auteur` SET `num`=19, `nom`='Morris', `prenom`=NULL, `numNationalite`=8, `date_naissance`='1834-03-24' WHERE `num`=19;
    UPDATE `auteur` SET `num`=20, `nom`='Flaubert', `prenom`='Gustave', `numNationalite`=4, `date_naissance`='1821-12-12' WHERE `num`=20;
    UPDATE `auteur` SET `num`=21, `nom`='Asimov', `prenom`='Isaac', `numNationalite`=3, `date_naissance`='1920-01-02' WHERE `num`=21;
    UPDATE `auteur` SET `num`=22, `nom`='Miller', `prenom`='Frank', `numNationalite`=3, `date_naissance`='1957-01-27' WHERE `num`=22;
    UPDATE `auteur` SET `num`=23, `nom`='Eco', `prenom`='Umberto', `numNationalite`=9, `date_naissance`='1932-01-05' WHERE `num`=23;
    UPDATE `auteur` SET `num`=24, `nom`='Irving', `prenom`='John', `numNationalite`=3, `date_naissance`='1942-03-02' WHERE `num`=24;
    UPDATE `auteur` SET `num`=25, `nom`='Braudel', `prenom`='Fernand', `numNationalite`=4, `date_naissance`='1902-08-24' WHERE `num`=25;
    UPDATE `auteur` SET `num`=26, `nom`='Camus', `prenom`='Albert', `numNationalite`=4, `date_naissance`='1913-11-07' WHERE `num`=26;
    UPDATE `auteur` SET `num`=27, `nom`='Vian', `prenom`='Boris', `numNationalite`=4, `date_naissance`='1920-03-10' WHERE `num`=27;
    UPDATE `auteur` SET `num`=28, `nom`='Lehane', `prenom`='Dennis', `numNationalite`=3, `date_naissance`='1965-08-04' WHERE `num`=28;
    UPDATE `auteur` SET `num`=29, `nom`='Oe', `prenom`='Kenzaburo', `numNationalite`=10, `date_naissance`='1935-01-31' WHERE `num`=29;
    UPDATE `auteur` SET `num`=30, `nom`='Kertész', `prenom`='Imre', `numNationalite`=10, `date_naissance`='1929-11-09' WHERE `num`=30;
    UPDATE `auteur` SET `num`=31, `nom`='García Márquez', `prenom`='Gabriel', `numNationalite`=2, `date_naissance`='1927-03-06' WHERE `num`=31;
    UPDATE `auteur` SET `num`=32, `nom`='Pratt', `prenom`='Hugo', `numNationalite`=5, `date_naissance`='1927-06-15' WHERE `num`=32;
    UPDATE `auteur` SET `num`=33, `nom`='Cooper', `prenom`='Fenimore', `numNationalite`=11, `date_naissance`='1789-09-15' WHERE `num`=33;
 ```
<!-- end -->