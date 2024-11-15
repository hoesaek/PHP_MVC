<?php
$locale = 'fr_FR.UTF-8';
setlocale(LC_TIME, $locale);
// Créer un objet DateTime
$date = new DateTime();

// Formatter la date
$fmt = new IntlDateFormatter($locale, IntlDateFormatter::LONG, IntlDateFormatter::NONE);
$fmt->setPattern('d MMMM yyyy');
?>
    <main role="main">
        <div class="container py-4">
            <div class="p-4 p-md-5 mb-4 rounded text-body-emphasis bg-body-secondary">
                <div class="row py-lg-5">
                    <div class="col-lg-6 col-md-8 mx-auto">
                        <h1 class="fw-light">Mon gestionnaire de bibliotèque en ligne</h1>
                        <p class="lead text-body-secondary">permettant de gérer des collections de livres, revues, ou autres documents numériques. Il permet aux utilisateurs d'accéder à une bibliothèque à distance, d'effectuer des recherches dans le catalogue, de consulter des informations sur les ouvrages (titres, auteurs, résumés, etc.), et parfois de réserver ou emprunter des exemplaires disponibles.</p>
                            </br>
                        <a href="index.php?uc=livre&action=list" class="btn btn-outline-primary my-2 rounded-pill">Mes Livres</a>
                        <a href="index.php?uc=auteur&action=list" class="btn btn-outline-secondary my-2 rounded-pill ">Mes auteurs</a>
                        
                    </div>
                </div>
            </div>

            <div class="row mb-2">
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-primary-emphasis">Livre en vogue</strong>
                            <h3 class="mb-0"><?php echo $MaxLivre->getNumLivre()->getTitre()?></h3>
                            <div class="mb-1 text-body-secondary">Nov 12</div>
                            <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <a href="index.php?uc=livre&action=list" class="icon-link gap-1 icon-link-hover stretched-link">
                                En savoir plus 
                                <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <img class="bd-placeholder-img" 
                                width="200" height="300" 
                                src="<?php echo $MaxLivre->getNumLivre()->getImg()?>"
                                role="img" aria-label="Placeholder: Thumbnail" 
                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Title</title>
                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                            </img>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            <strong class="d-inline-block mb-2 text-success-emphasis">Adherent le plus actif :</strong>
                            <h3 class="mb-0"><?php echo $MaxAdherent->getNumAdherent()->getNom() . " " . $MaxAdherent->getNumAdherent()->getPrenom()?></h3>
                            <div class="mb-1 text-body-secondary">Nov 11</div>
                            <p class="mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
                            <a href="index.php?uc=auteur&action=list" class="icon-link gap-1 icon-link-hover stretched-link">
                                En savoir plus
                                <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
                            </a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200" height="300" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?php echo date("Y") ?></text></svg>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-5">
                <div class="col-md-8">
                    <h3 class="pb-4 mb-4 fst-italic border-bottom">
                        From the Library - Differente Tables
                    </h3>

                    <article class="blog-post">
                        <!-- graphique php de la bdd -->
                        <ul>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Élément</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><a href="index.php?uc=nationalite&action=list" class="btn btn-outline-warning rounded-5 m-2">Nationalité</a></td>
                                        <td>Accédez à la <strong>liste des nationalités</strong> disponibles pour les livres de notre catalogue.</td>
                                    </tr>
                                    <tr>
                                        <td><a href="index.php?uc=continent&action=list" class="btn btn-outline-warning rounded-5 m-2">Continent</a></td>
                                        <td>Découvrez les <strong>continents</strong> auxquels sont associés les nationalités et les ouvrages.</td>
                                    </tr>
                                    <tr>
                                        <td><a href="index.php?uc=adherent&action=list" class="btn btn-outline-warning rounded-5 m-2">Adherent</a></td>
                                        <td>Consultez la <strong>liste des adhérents</strong> inscrits dans notre système.</td>
                                    </tr>
                                    <tr>
                                        <td><a href="index.php?uc=auteur&action=list" class="btn btn-outline-warning rounded-5 m-2">Auteur</a></td>
                                        <td>Accédez aux <strong>détails des auteurs</strong> qui ont contribué à notre bibliothèque.</td>
                                    </tr>
                                    <tr>
                                        <td><a href="index.php?uc=genre&action=list" class="btn btn-outline-warning rounded-5 m-2">Genre</a></td>
                                        <td>Explorez les <strong>différents genres littéraires</strong> présents dans notre collection.</td>
                                    </tr>
                                    <tr>
                                        <td><a href="index.php?uc=livre&action=list" class="btn btn-outline-warning rounded-5 m-2">Livre</a></td>
                                        <td>Parcourez la <strong>liste complète des livres</strong> disponibles dans notre bibliothèque.</td>
                                    </tr>
                                    <tr>
                                        <td><a href="index.php?uc=pret&action=list" class="btn btn-outline-warning rounded-5 m-2">Pret</a></td>
                                        <td>Accédez aux <strong>détails des prêts</strong> en cours et aux informations sur les emprunts précédents.</td>
                                    </tr>
                                </tbody>
                            </table>

                        </ul>
                        <div id="chartContainer" style="height: 400px; width: 100%;"></div>
                    </article>

                    <!-- <article class="blog-post">
                        <h2 class="display-5 link-body-emphasis mb-1">Another blog post</h2>
                        <p class="blog-post-meta">December 23, 2020 by <a href="https://getbootstrap.com/docs/5.3/examples/blog/#">Jacob</a></p>

                        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                        <blockquote>
                        <p>Longer quote goes here, maybe with some <strong>emphasized text</strong> in the middle of it.</p>
                        </blockquote>
                        <p>This is some additional paragraph placeholder content. It has been written to fill the available space and show how a longer snippet of text affects the surrounding content. We'll repeat it often to keep the demonstration flowing, so be on the lookout for this exact same string of text.</p>
                        <h3>Example table</h3>
                        <p>And don't forget about tables in these posts:</p>
                        <table class="table">
                        <thead>
                            <tr>
                            <th>Name</th>
                            <th>Upvotes</th>
                            <th>Downvotes</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td>Alice</td>
                            <td>10</td>
                            <td>11</td>
                            </tr>
                            <tr>
                            <td>Bob</td>
                            <td>4</td>
                            <td>3</td>
                            </tr>
                            <tr>
                            <td>Charlie</td>
                            <td>7</td>
                            <td>9</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                            <td>Totals</td>
                            <td>21</td>
                            <td>23</td>
                            </tr>
                        </tfoot>
                        </table>

                        <p>This is some additional paragraph placeholder content. It's a slightly shorter version of the other highly repetitive body text used throughout.</p>
                    </article> -->

                    <article class="blog-post">
                        <h2 class="display-5 link-body-emphasis mb-1">Découvrez notre bibliothèque en ligne</h2>
                        
                        <p>Bienvenue dans notre bibliothèque en ligne, un lieu numérique où vous pouvez explorer une large collection de livres de tous genres. Que vous soyez passionné par la littérature classique, friand de romans contemporains ou curieux de découvrir des genres plus niche comme le haïku, nous avons de quoi satisfaire toutes vos envies de lecture.</p>
                        
                        <ul>
                            <li><strong>Littérature :</strong> Une collection de classiques et de nouvelles œuvres littéraires, adaptées à tous les âges.</li>
                            <li><strong>Science-Fiction :</strong> Des récits futuristes et des explorations de mondes parallèles qui captiveront votre imagination.</li>
                            <li><strong>BD :</strong> Découvrez les meilleures bandes dessinées, des classiques aux nouveautés.</li>
                            <li><strong>Essai :</strong> Des ouvrages qui nourrissent la réflexion sur divers sujets : philosophie, histoire, science, et plus encore.</li>
                            <li><strong>Policier :</strong> Plongez dans des intrigues palpitantes avec des thrillers et des romans policiers.</li>
                        </ul>
                        
                        <p>Notre bibliothèque vous offre aussi des fonctionnalités pratiques pour personnaliser votre expérience de lecture. Vous pouvez trier les livres par genre, par auteur, ou par date d'ajout. De plus, nous proposons un système de recommandations basé sur vos lectures précédentes, pour vous aider à découvrir de nouveaux livres que vous pourriez apprécier.</p>
                        
                        <p>Nous sommes également ravis de vous offrir une section spéciale pour les jeunes lecteurs avec des livres adaptés à différents niveaux de lecture. Profitez d'une expérience de lecture interactive, avec des résumés détaillés, des critiques de lecteurs, et même des options pour lire les premiers chapitres gratuitement.</p>
                        
                        <p class="blog-post-meta">Mise à jour : <?= $fmt->format($date); ?> par <a href="#">Nacht</a></p>
                    </article>


                    <nav class="blog-pagination" aria-label="Pagination">
                        <button class="btn btn-outline-primary rounded-4" type="submit" disabled>S'inscrire</button>
                        <button class="btn btn-outline-secondary rounded-4" type="submit" disabled>Se connecter</button>
                    </nav>
                </div>

                <div class="col-md-4">
                    <div class="position-sticky" style="top: 4rem;">
                        <!-- About -->
                        <div class="p-4 mb-3 bg-body-tertiary rounded">
                            <h4 class="fst-italic">About</h4>
                            <p class="mb-0">Petit projet de gestion de bibliothèque en ligne avec quelques fonctionnalités sympa ! ^^</p>
                        </div>
                        <!-- End -->

                        <!-- Post recent -->
                        <div>
                            <h4 class="fst-italic">Recemment emprunté</h4>
                            <ul class="list-unstyled">
                            <?php
                                $count = 0;
                                foreach ($lastPret as $dernierPrets) {
                                    if ($count >= 3) break;
                                    ?>
                                    <li>
                                        <a class="d-flex flex-column flex-lg-row gap-3 align-items-start align-items-lg-center py-3 link-body-emphasis text-decoration-none border-top" href="/index.php?uc=livre&action=list">
                                            <img class="bd-placeholder-img" 
                                                width="200" height="300" 
                                                src="<?php echo $dernierPrets->Cover?>"
                                                role="img" aria-label="Placeholder: Thumbnail" 
                                                preserveAspectRatio="xMidYMid slice" focusable="false">
                                                    <title>Title</title>
                                                    <rect width="100%" height="100%" fill="#55595c"></rect>
                                            </img>
                                            <div class="col-lg-8">
                                                <h6 class="mb-0"><?php echo $dernierPrets->Livre; ?></h6>
                                                <small class="text-body-secondary"><?php echo $dernierPrets->DatePret; ?></small>
                                            </div>
                                        </a>
                                    </li>
                                    <?php
                                    $count++;
                                }
                                ?>
                            </ul>
                        </div>
                        <!-- End -->
                        

                        <!-- Archive 
                        <div class="p-4">
                            <h4 class="fst-italic">Archives</h4>
                            <ol class="list-unstyled mb-0">
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">March 2021</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">February 2021</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">January 2021</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">December 2020</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">November 2020</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">October 2020</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">September 2020</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">August 2020</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">July 2020</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">June 2020</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">May 2020</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">April 2020</a></li>
                            </ol>
                        </div>
                        End -->

                        <!-- Referencement
                        <div class="p-4">
                            <h4 class="fst-italic">Elsewhere</h4>
                            <ol class="list-unstyled">
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">GitHub</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">Twitter</a></li>
                                <li><a href="https://getbootstrap.com/docs/5.3/examples/blog/#">Facebook</a></li>
                            </ol>
                        </div>
                        End -->
                    </div>
                </div>
            </div>

        </div>
    </main>