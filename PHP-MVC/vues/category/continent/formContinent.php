<!-- Fenetre de continents -->  
    <div class="container py-4">
        <div class="row">
            <div class="col-md-9 mb-4"><h2 class="text-center"><?php echo $mode ;?> un continent</h2></div>
        </div>

        <form action="index.php?uc=continent&action=validForm" method="post" 
            class="col-md-6 offset-md-3 border border-secondary p-3 rounded-3">
            <div class="form-group">
                <label for="libelle" class="form-label">Continent</label>
                <input type="text" class="form-control" id="libelle" placeholder="Example Continent" name="libelle"
                value="<?php if($mode == "Modifier") {echo $continent->getLibelle() ;}?>">
            </div>                    
            <input type="hidden" id="num" name="num" value="<?php if($mode == "Modifier") echo $continent->getNum() ;?>">             
            <div class="row mt-4">
                <div class="col">
                    <a href="index.php?uc=continent&action=list" class="btn btn-outline-warning " role="button">Revenir à la liste</a>
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-outline-success"><?php echo $mode ;?></button>
                </div>
            </div>
        </form>
    </div>
<!-- end container-->