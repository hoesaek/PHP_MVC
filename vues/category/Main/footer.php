            <!-- Modal suppression-->
            <div class="modal fade" id="modalSuppression" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Confirmation</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Retour</button>
                            <a href=""  class="btn btn-outline-danger" id="btnSuppr">Supprimer</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End -->
            <!-- Modal moreInfo-->
            <div class="modal fade" id="modalMoreInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Information supplementaire : </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Retour</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End -->
            <div class="container mt-4 mb-3">

            <footer class="pt-3 mt-4 text-body-secondary border-top">
                    <div class="row justify-content-between">
                        <div class="col-md-2 mb-3">© <?php echo date("Y"); ?></div>
                        <div class="col-md-2 mb-3 offset-md-8">                    
                            <a href="/" class="btn btn-outline-info" role="button">Accueil</a>
                        </div>
                    </div>   
            </footer>

        </div>        
        <script src="https://getbootstrap.com/docs/5.3/assets/js/color-modes.js"></script>
        <script src="https://getbootstrap.com/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>  
        <script src="https://cdn.canvasjs.com/canvasjs.min.js"></script>
        <!-- pour utiliser jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--                      -->
        <script type="text/javascript">

            $("a[data-suppression]").click(function(){
                var lien = $(this).attr("data-suppression");
                var message = $(this).attr("data-message");
                $("#btnSuppr").attr("href",lien);
                $(".modal-body").text(message);
           });

            $("a[data-moreInfo]").click(function() {
                var message = $(this).attr("data-message");
                $(".modal-body").html(message); // Utiliser .html() pour interpréter le contenu comme du HTML
            });

            document.addEventListener('DOMContentLoaded', function() {
            // Sélectionner l'élément actif
            const activeLink = document.querySelector('#scrollableList .active');
            if (activeLink) {
                // Faire défiler jusqu'à l'élément actif
                activeLink.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
            });


        </script>
        <!-- graphics -->
        <script>
            window.onload = function() {
            
            
            var chart = new CanvasJS.Chart("chartContainer", {
                theme: "dark1",
                backgroundColor: "#0000",
                animationEnabled: true,
                title: {
                    text: "From the Library - Mes Genres :"
                },
                data: [{
                    type: "bar",
                    indexLabel: "{y}",
                    yValueFormatString: "#,##0.00\"%\"",
                    indexLabelPlacement: "inside",
                    indexLabelFontColor: "#36454F",
                    indexLabelFontSize: 18,
                    indexLabelFontWeight: "bolder",
                    // showInLegend: true,
                    // legendText: "{nombre_livres} {label}s",
                    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
                }]
            });
            chart.render();
            }
        </script>
    </body>
</html>

<?php ob_flush(); // garde la memoire d'affichage en cache et les supprime à la tte fin