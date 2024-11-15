        <!-- Message d'information -->
        <?php if (isset($_SESSION["message"]["failed"])) { ?>
            <div class="mt-5 alert alert-danger text-center alert-dismissible fade show" role="alert">
            <?php echo $_SESSION["message"]["failed"];
                    unset($_SESSION["message"]["failed"]);
                    ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } elseif (isset($_SESSION["message"]["success"])) { ?>
            <div class="mt-5 alert alert-success text-center alert-dismissible fade show" role="alert">
                <?php echo $_SESSION["message"]["success"];
                    unset($_SESSION["message"]["success"]);
                ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php } ?> 
        <!-- End -->