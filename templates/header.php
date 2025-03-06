<!-- template du header --> 
<header>
<div class="sitetop">
    <a href="?" title="Acceuil"><img src="assets/img/logo.png" alt="logo" id="logo"></a>
    <div class="boutonstop">
    <?php
        // Si on est sur la page lost alors on supprime le boutton perdu
        if (isset($_GET['p']) && $_GET['p'] == 'perdu') {
            echo '<a href="?p=trouve" id="boutonfound"><span class="mediacut">J\'ai</span> trouvé <span class="mediacut">un animal</span></a>';
        }
        // Si on est sur la page trouvé, alors on supprime le boutton trouvé
        elseif (isset($_GET['p']) && $_GET['p'] == 'trouve') {
            echo '<a href="?p=perdu" id="boutonlost"><span class="mediacut">J\'ai</span> perdu <span class="mediacut">mon animal</span></a>';
        }
        // Sinon on affiche les deux
        else {
            echo '<a href="?p=perdu" id="boutonlost"><span class="mediacut">J\'ai</span> perdu <span class="mediacut">mon animal</span></a>';
            echo '<a href="?p=trouve" id="boutonfound"><span class="mediacut">J\'ai</span> trouvé <span class="mediacut">un animal</span></a>';
        }
    ?>
    </div>
</div>
<!-- Barre de naviguation -->
<nav>
    <div class="nav nav-underline nav-fill justify-content-center bg-dark p-2" id="menutop">
        <div class="nav-item col-12 col-sm-4 col-xl-3">
            <a class="nav-link text-light" href="?p=liste">Voir la liste des signalements</a>
        </div>
        <div class="nav-item col-12 col-sm-4 col-xl-2">
            <a class="nav-link text-light" href="?p=carte">Utiliser la carte interactive</a>
        </div>
        <div class="nav-item col-12 col-sm-4 col-xl-1">
            <a class="nav-link text-light" href="?p=compte">Mon compte</a>
        </div>
        <div class="nav-item col-12 col-sm-4 col-xl-1">
            <a class="nav-link text-light" href="?p=conseils">Conseils</a>
        </div>
        <div class="nav-item col-12 col-sm-4 col-xl-3">
            <a class="nav-link text-light" href="?p=temoignage">Temoignages / Histoires de retrouvailles</a>
        </div>
        <div class="nav-item col-12 col-sm-4 col-xl-1">
            <a href="https://fr-fr.facebook.com/" title="Lien vers la page Facebook"><img src="assets/img/icons/fbi.png" alt="Facebook"></a>
            <a href="https://x.com/" title="Lien vers la page X"><img src="assets/img/icons/xi.png" alt="X"></a>
        </div>
    </div>
</nav>
<!-- Boutton de la barre de naviguation -->
<nav class="navbar navbar-dark bg-dark p-2" id="bmenutop">
    <div class="container-fluid justify-content-center">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menutop" aria-controls="menutop" aria-expanded="false">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
</header>