<header>
    <div class="sitetop">
        <a href="index.php" title="Acceuil"><img src="assets/img/logo.png" alt="logo" id="logo"></a>
        <div class="boutonstop">
            <?php
            if (str_contains($_SERVER['REQUEST_URI'], 'lost.php')) {
                echo '<a href="found.php" id="boutonfound"><span class="mediacut">J\'ai</span> trouvé <span class="mediacut">un animal</span></a>';
            }
            elseif (str_contains($_SERVER['REQUEST_URI'], 'found.php')) {
                echo '<a href="lost.php" id="boutonlost"><span class="mediacut">J\'ai</span> perdu <span class="mediacut">mon animal</span></a>';
            }
            else {
                echo '<a href="lost.php" id="boutonlost"><span class="mediacut">J\'ai</span> perdu <span class="mediacut">mon animal</span></a>';
                echo '<a href="found.php" id="boutonfound"><span class="mediacut">J\'ai</span> trouvé <span class="mediacut">un animal</span></a>';
            }
            ?>
        </div>
    </div>
    <nav>
        <div class="nav nav-underline nav-fill justify-content-center bg-dark p-2" id="menutop">
            <div class="nav-item col-12 col-sm-4 col-xl-3">
                <a class="nav-link text-light" href="petlist.php">Voir la liste des animaux perdu</a>
            </div>
            <div class="nav-item col-12 col-sm-4 col-xl-2">
                <a class="nav-link text-light" href="petcard.php">Utiliser la carte interactive</a>
            </div>
            <div class="nav-item col-12 col-sm-4 col-xl-1">
                <a class="nav-link text-light" href="login.php">Mon compte</a>
            </div>
            <div class="nav-item col-12 col-sm-4 col-xl-1">
                <a class="nav-link text-light" href="advice.php">Conseils</a>
            </div>
            <div class="nav-item col-12 col-sm-4 col-xl-3">
                <a class="nav-link text-light" href="goldenbook.php">Temoignages / Histoires de retrouvailles</a>
            </div>
            <div class="nav-item col-12 col-sm-4 col-xl-1">
                <a href="https://fr-fr.facebook.com/" title="Lien vers la page Facebook"><img src="assets/img/icons/fbi.png" alt="Facebook"></a>
                <a href="https://x.com/" title="Lien vers la page X"><img src="assets/img/icons/xi.png" alt="X"></a>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-dark bg-dark p-2" id="bmenutop">
        <div class="container-fluid justify-content-center">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menutop" aria-controls="menutop" aria-expanded="false">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
</header>