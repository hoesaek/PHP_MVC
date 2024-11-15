        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Bibliothèque</a>
            <button 
                class="navbar-toggler" 
                type="button" 
                data-bs-toggle="collapse" 
                data-bs-target="#navbarSupportedContent" 
                aria-controls="navbarSupportedContent" 
                aria-expanded="false" 
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <!-- Livre -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Gestion des Livres
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a href="index.php?uc=livre&action=list" class="dropdown-item">Liste des livres</a>
                            <a href="index.php?uc=livre&action=add" class="dropdown-item">Ajouter des livres</a>
                            <hr class="dropdown-divider">
                            <a href="index.php?uc=pret&action=list" class="dropdown-item">Liste des prets</a>
                        </div>
                    </li>
 
                    <!-- Genre -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion des genres
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <a href="index.php?uc=genre&action=list" class="dropdown-item">Liste des genres</a>
                            <a href="index.php?uc=genre&action=add" class="dropdown-item">Ajouter des genres</a>
                        </div>
                    </li>  
                    <!-- Auteur -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown02" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion des auteurs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown02">
                            <a href="index.php?uc=auteur&action=list" class="dropdown-item">Liste des auteurs</a>
                            <a href="index.php?uc=auteur&action=add" class="dropdown-item">Ajouter des auteurs</a>
                        </div>
                    </li>
                    <!-- Adherent -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown02" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion des adherent
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown02">
                            <a href="index.php?uc=adherent&action=list" class="dropdown-item">Liste des adherents</a>
                            <a href="#" class="dropdown-item">Ajouter des adherent</a>
                        </div>
                    </li>  
                    <!-- Nationalité -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion des nationalités
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            
                            <a href="index.php?uc=nationalite&action=list" class="dropdown-item">Liste des nationalités</a>
                            <a href="index.php?uc=nationalite&action=add" class="dropdown-item">Ajouter des nationalités</a>
                        </div>
                    </li>
                    <!-- Continent -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestion des continents
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdown03">
                            
                            <a href="index.php?uc=continent&action=list" class="dropdown-item">Liste des continents</a>
                            <a href="index.php?uc=continent&action=add" class="dropdown-item">Ajouter des continents</a>
                        </div>
                    </li>

                </ul>
                <?php
                    $selectedCategory = isset($_GET['uc']) ? htmlspecialchars($_GET['uc']) : '';
                ?>
                <form action="index.php?uc=search" class="d-flex me-5" role="search" method="post">
                    <!-- <select 
                        class="form-select me-2 rounded-4" 
                        name="category" 
                        aria-label="Search category"
                        id="categorySelect"
                        onchange="toggleSearchInput()">
                        <option value="" <?= $selectedCategory === '' ? 'selected' : '' ?>>
                            Toutes nos catégories
                        </option>
                        <option value="continent" <?= $selectedCategory === 'continent' ? 'selected' : '' ?>>
                            Continent
                        </option>
                        <option value="livre" <?= $selectedCategory === 'livre' ? 'selected' : '' ?>>
                            Livre
                        </option>
                        <option value="auteur" <?= $selectedCategory === 'auteur' ? 'selected' : '' ?>>
                            Auteur
                        </option>
                        <option value="genre" <?= $selectedCategory === 'genre' ? 'selected' : '' ?>>
                            Genre
                        </option>
                        <option value="nationalite" <?= $selectedCategory === 'nationalite' ? 'selected' : '' ?>>
                            Nationalité
                        </option>
                        <option value="adherent" <?= $selectedCategory === 'adherent' ? 'selected' : '' ?>>
                            Adhérent
                        </option>
                        <option value="pret" <?= $selectedCategory === 'pret' ? 'selected' : '' ?>>
                            Prêt
                        </option>
                    </select> -->
                    <input 
                        class="form-control me-2 rounded-4" 
                        name="search" 
                        type="search" 
                        placeholder="Search..." 
                        aria-label="Search" 
                        id="searchInput"
                        <?= "disabled"//$selectedCategory === '' ? 'disabled' : '' ?> >
                    <button class="btn btn-outline-success rounded-4" type="submit" disabled>Search</button>
                </form>
            </div>
        </div>


        