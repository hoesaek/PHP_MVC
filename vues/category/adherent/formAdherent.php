<form action="index.php?uc=adherent&action=validForm" method="post">
    <div class="card container mt-5" style="width: 25rem;">
        <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fcdn4.iconfinder.com%2Fdata%2Ficons%2Fclassic-single-user-7%2F25%2Fsingle_user_information_1_classic_color_shadow_f-1024.png&f=1&nofb=1&ipt=61aea1fbad23f11b12a5bca9d346571090831aefdd7c53ca236b944859e379a3&ipo=images" 
            class="card-img-top" alt="...">
        <div class="card-body">
            <div class="card-header">
                Adherent :
            </div>
            <div class="row">
                <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") echo $adherent->getNum(); ?>">
                <div class="col-md-6">
                    <div class="form-group m-2">
                        <label for="nom">Nom :</label>
                        <input type="text" id="nom" name="nom" class="form-control" 
                            value="<?php if($mode == "Modifier") echo $adherent->getNom(); ?>" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group m-2">
                        <label for="prenom">Prenom :</label>
                        <input type="text" id="prenom" name="prenom" class="form-control" 
                            value="<?php if($mode == "Modifier") echo $adherent->getPrenom(); ?>" />
                    </div>
                </div>
            </div>
            <div class="form-group m-2">
                <label for="adresseRue">Rue :</label>
                <input type="text" id="adresseRue" name="adresseRue" class="form-control" 
                    value="<?php if($mode == "Modifier") echo $adherent->getAdrRue(); ?>" />
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group m-2">
                        <label for="adresseCP">Code Postal :</label>
                        <input type="text" id="adresseCP" name="adresseCP" class="form-control" 
                            value="<?php if($mode == "Modifier") echo $adherent->getAdrCP(); ?>" />
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group m-2">
                        <label for="adresseVille">Ville :</label>
                        <input type="text" id="adresseVille" name="adresseVille" class="form-control" 
                            value="<?php if($mode == "Modifier") echo $adherent->getAdrVille(); ?>" />
                    </div>
                </div>
            </div>
            <div class="form-group m-2">
                <label for="email">Mel :</label>
                <input type="email" id="email" name="email" class="form-control" 
                    value="<?php if($mode == "Modifier") echo $adherent->getMel(); ?>" />
            </div>
            <div class="form-group m-2">
                <label for="telephone">Tél :</label>
                <input type="tel" id="telephone" name="telephone" class="form-control" 
                    value="<?php if($mode == "Modifier") echo $adherent->getTel(); ?>" />
            </div>
        </div>

        <div class="row m-2">
            <div class="col">
                <a href="index.php?uc=adherent&action=list" class="btn btn-outline-warning "  role="button">Revenir à la liste</a>
            </div>
        
            <div class="col">
                <button type="submit" class="btn btn-outline-success"><?php echo $mode ;?></button>
            </div>
        </div>
    </div>
    
</form>



    