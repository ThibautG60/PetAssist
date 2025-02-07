<head>
    <link rel="stylesheet" href="assets/css/list.css">
    <script defer src="assets/js/filter.js"></script>
    <title>Pet Assist' - Liste des signalements</title>
</head>

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
            <h2>Filtres:</h2>
        </fieldset>
    </script>    
        <button id="filterButton" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">Trier à
            l'aide des filtres</button>

        <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
            aria-labelledby="offcanvasWithBothOptionsLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Affinez votre recherche:</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body"></div>
        </div>
        <div class="list">
            <?php
            //- Génération de la liste
            $file = 'assets/data/data.json';
            
            if (file_exists($file)) {
                $jsonData = json_decode(file_get_contents($file), true);
    
                foreach($jsonData['petlist'] as $data){
                    if($data['signalType'] == 'found'){
                        echo '<div class="card-pet box-found">';
                    } else {
                        echo '<div class="card-pet box-lost">';
                    }
                        echo '<a href="?page=profil" title="Voir le signalement en détail"><img src="assets/img/pet/' . $data['petImg'] . '" alt="Photo de l\'animal" class="img-pet"></a>';
                        echo '<div class="card-body">';
                            echo '<p class="card-title">' . $data['petName'] . '</p>';
                            if($data['signalType'] == 'found'){
                                echo '<div class="line-found"></div>';
                            } else {
                                echo '<div class="line-lost"></div>';
                            }
                            echo '<p class="card-text">Espèce: ' . $data['petSpicies'] . '<br>Race: ' . $data['petRace'] . '<br>Lieu: ' . $data['petAdress'] . '<br>Date: ' . $data['petDate'] . '</p>';
                        echo '</div>';
                    echo '</div>';
                }
            }
            else {
                echo '<p class="description">Aucun résultat trouvé</p>';
            }
            ?>
        </div>
    </div>
</section>