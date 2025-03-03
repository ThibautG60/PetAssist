<!DOCTYPE html>
<html lang="fr">

<head>
    <!-- Infos générales sur le site -->
    <meta charset="UTF-8">
    <meta name="description" content="Page d'accueil de Pet Assist'">
    <meta name="keywords" content="Animaux perdu,Pet Assist,Recherche animaux">
    <meta name="author" content="Thibaut GERARD">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/iconsite.png" />
    <title>Pet Assist' - Liste des signalements</title>

    <!-- Importation des fichiers CSS -->
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/list.css">

    <!-- Importation des fichiers JS pour bootstrap & animations -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script defer src="assets/js/animations.js"></script>
    <script defer src="assets/js/filter.js"></script>
</head>

<body>
    <?php require 'templates/header.php'; // Affichage du header ?>
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="paw">
            <path
                d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z" />
        </svg>
        <section class="articlefixe">
            <h1 class="articletitle">Consultez les signalements de la communauté:</h1>
            <div class="line"></div>
            <p class="description">Consultez la liste des animaux disparus et utilisez les filtres pour affiner
                votre recherche. Trouvez
                rapidement les animaux recherchés près de chez vous. <br>
                Si vous souhaitez voir un signalement en détail, cliquez sur la photo.
            </p>
            <div class="petlist">
                <fieldset class="filter">
                    <div class="accordion accordion-flush" id="accordionResp">
                    <h2>Filtres:</h2>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed filter-item" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapsePetType"
                                    aria-expanded="false" aria-controls="collapsePetType">
                                    Espèce
                                </button>
                            </h3>
                            <div id="collapsePetType" class="accordion-collapse collapse"
                                data-bs-parent="#accordion-flush">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                    <?php // Affichage de toutes les espèces à partir de la bdd
                                        foreach(getAllSpicies() as $data){
                                            echo '<li class="list-group-item">';
                                                echo '<input class="form-check-input me-1 spicies" type="checkbox" value="'.$data['id_spicies'].'" id="'.$data['id_spicies'].'">';
                                                echo '<label class="form-check-label stretched-link"';
                                                echo 'for="'.$data['id_spicies'].'">'.$data['spicies'].'</label>';
                                            echo '</li>';
                                        }
                                    ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed filter-item" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseMsgTwo" aria-expanded="false"
                                    aria-controls="collapseMsgTwo">
                                    Race
                                </button>
                            </h3>
                            <div id="collapseMsgTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionMsg">
                                <div class="accordion-body">
                                    <ul class="list-group">
                                        <?php
                                        foreach(getAllRaces() as $data){
                                            echo '<li class="list-group-item st'.$data['id_spicies'].'">';
                                                echo '<input class="form-check-input me-1 race" type="checkbox" value="'.$data['id_race'].'" id="'.$data['race'].'">';
                                                echo '<label class="form-check-label stretched-link"';
                                                echo 'for="'.$data['race'].'">'.$data['race'].'</label>';
                                            echo '</li>';
                                        }
                                        ?>
                                        <p id="noSpicies">Veuillez sélectionner une espèce.</p>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed filter-item" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseMsgThree"
                                    aria-expanded="false" aria-controls="collapseMsgThree">
                                    Trier par emplacement
                                </button>
                            </h3>
                            <div id="collapseMsgThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionMsg">
                                <div class="accordion-body">
                                    <form method="POST">
                                        <div class="mb-3">
                                            <label for="filterAdress" class="form-label">Adresse:</label>
                                            <input type="text" class="form-control" name="filterAdress" id="filterAdress" aria-describedby="filter-adressH" pattern="^(?=.*\d{5})([A-Za-zÀ-ÿ0-9\s'\-\.]+(?:\s*\d{5}\s*)?[A-Za-zÀ-ÿ0-9\s'\-\.]+)*$" minlength="5" title="Vous devez saisir au minimum un code postal." required>
                                            <div id="filter-adressH" class="form-text">Exemple: 8 rue de l'exemple 60000 EXEMPLE</div>
                                        </div>
                                        <label for="filterKM">Rayon autour de l'adresse:</label>
                                        <input type="range" name="filterKM" id="filterKM" min="0" max="100" oninput="this.nextElementSibling.value = this.value +'KM'" required>
                                        <output>
                                            <div class="form-text">Rayon de recherche en Kilomètres</div>
                                        </output>
                                        <button type="submit" class="btn btn-primary mt-4">Appliquer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed filter-item" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseMsgFour"
                                    aria-expanded="false" aria-controls="collapseMsgFour">
                                    Trier par date
                                </button>
                            </h3>
                            <div id="collapseMsgFour" class="accordion-collapse collapse"
                                data-bs-parent="#accordionMsg">
                                <div class="accordion-body">
                                <form method="POST">
                                    <div class="form-check">
                                        <input class="form-check-input me-1" type="radio" name="filterDate" value="up" checked>                        
                                        <label class="form-check-label" for="filterDate">Date croissante</label>
                                    </div> 
                                    <div class="form-check">
                                        <input class="form-check-input me-1" type="radio" name="filterDate" value="down">
                                        <label class="form-check-label" for="filterDate">Date décroissante</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Appliquer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <button id="filterButton" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Trier à
                    l'aide des filtres</button>

                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1"
                    id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Affinez votre recherche:</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                    </div>
                </div>
            
                <div class="list">
                    <?php
                    //- Génération de la liste
                    if($petInfo != false){     
                        foreach($petInfo as $pet){
                            if($pet['lost'] != 1)echo '<div class="card-pet box-found" data-spicies="'.$pet['id_spicies'].'" data-race="'.$pet['id_race'].'" data-date="'.$pet['_date'].'">';
                            else echo '<div class="card-pet box-lost" data-spicies="'.$pet['id_spicies'].'" data-race="'.$pet['id_race'].'" data-date="'.$pet['_date'].'">';
                            echo '<a href="?p=pet_profil&id='.$pet['id_pet'].'" title="Voir le signalement en détail"><img src="assets/img/pet/' . $pet['img_pet'] . '" alt="Photo de l\'animal" class="img-pet"></a>';
                            echo '<div class="card-body">';
                                if($pet['pet_name'] != "")echo '<p class="card-title">' . $pet['pet_name'] . '</p>';
                                else echo '<p class="card-title">' . getRaceName($pet['id_race'])['race'] . '</p>';

                                if($pet['lost'] != 1)echo '<div class="line-found"></div>';
                                else echo '<div class="line-lost"></div>';
                                
                                echo '<p class="card-text">Espèce: ' . getSpiciesName($pet['id_spicies'])['spicies'] . '<br>Race: ' .getRaceName($pet['id_race'])['race']. '<br>Lieu: ' .$pet['adress']. '<br>Date: ' .$pet['_date']. '</p>';
                            echo '</div>';
                            echo '</div>';
                        }
                        echo '<p class="description" id="result_no_found">Aucun signalement trouvé</p>';
                    }
                    else{
                        echo '<p class="description">Aucun signalement trouvé</p>';
                    }
                    ?>
                </div>
            </div>
        </section>
    </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer ?>
</body>
</html>