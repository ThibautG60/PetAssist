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
    <title>Pet Assist' - Modifier le témoignage</title>

    <!-- Importation des fichiers CSS -->
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <!-- Importation des fichiers JS pour bootstrap & animations -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script defer src="assets/js/animations.js"></script>
    <script defer src="assets/js/form.js"></script>
</head>

<body>
    <?php require_once 'templates/header.php'; // Affichage du header ?>
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="paw">
            <path
                d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z" />
        </svg>
        <section class="articlefixe">
            <?php
            if(userConnected() == true && getAdminLvl($_SESSION["id_user"])['admin_type'] != 0){ // On vérifie que l'user soit connecté & qu'il soit modérateur
                $pInfo = getPetInfo($_GET['m']);
                echo '<h1 class="articletitle">Modifiez le témoignage</h1>';
                echo <<< HTML
                <div class="line"></div>

                <form novalidate id="formModify" method="POST">
                    <div class="row form-group mt-2">
                        <label for="content">Contenu:</label>
                HTML;
                echo '<input type="text" class="form-control" name="content" id="content" value="'.$pInfo['testimony_text'].'" required pattern="^[A-Za-z0-9]{2,}$" minlength="2" title="Le temoignage ne peut contenir que des lettres et des chiffres">';
                echo <<< HTML
                    </div>
                    <input class="btn btn-success mt-3" type="submit" value="Modifier le témoignage">
                </form>
                HTML;
            }
            ?>
        </section>
    </main>
<?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>
