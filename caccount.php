<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="shortcut icon" href="assets/img/iconsite.png" />

    <script src="assets/js/bootstrap.bundle.js"></script>
    <script defer src="assets/js/animations.js"></script>
    <script defer src="assets/js/form.js"></script>

    <title>Pet Assist' - Je créé mon compte</title>
</head>

<body>
    <?php
        //- Appel du fichier php: Header
        include_once 'static/header.php';
    ?>
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="paw">
            <path
                d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z" />
        </svg>
        <section class="articlefixe">
            <h1 class="articletitle">Créez votre compte Pet Assist':</h1>
            <div class="line"></div>
            <p class="description">Créez votre compte pour accéder à toutes nos fonctionnalités et profiter de
                contenus
                personnalisés. Inscrivez-vous facilement en quelques étapes et commencez dès maintenant !</p>
            <form novalidate method="POST" action="" id="formV">
                <div class="row">
                    <div class="form-group col-6 col-lg-4">
                        <label for="lastname">Nom:</label>
                        <input type="text" class="form-control" id="lastname" placeholder="Saisissez votre nom de famille" required
                        pattern="^[A-Za-z]{2,}$" minlength="2" title="Le nom de famille ne peut contenir que des lettres">
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label for="name">Prénom:</label>
                        <input type="text" class="form-control" id="name" placeholder="Saisissez votre prénom" required
                        pattern="^[A-Za-z]{2,}$" minlength="2" title="Le prénom ne peut contenir que des lettres">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pseudo">Pseudonyme:</label>
                        <input type="text" class="form-control" id="pseudo"
                            placeholder="Saisissez un pseudonyme pour le site" required
                            pattern="^[A-Za-z0-9]{2,}$" minlength="2" title="Le pseudonyme ne peut contenir que des lettres et des chiffres">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="exemple@exemple.com" required
                        pattern="^[a-z0-9\._\%\+\-]+@[a-z0-9\.\-]+\.[a-z]{2,}$">
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="password">Mot de passe:</label>
                        <input type="password" class="form-control" id="password"
                            placeholder="Saisissez votre mot de passe pour accéder à votre compte." required
                            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
                            title="Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères">
                            <div class="form-text">Ne donnez jamais votre mot de passe à qui que ce soit.</div>
                    </div>
                </div>
                <div class="row mt-5 flex-row-reverse">
                    <div class="form-group col-lg-6">
                        <label for="profil-Pic" class="form-label">Importez votre photo de profil</label>
                        <input class="form-control" type="file" id="profil-Pic" required>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="adress">Adresse:</label>
                        <input type="text" class="form-control" id="adress" placeholder="85 rue de l'exemple" required
                        pattern="^\d+[A-Za-zÀ-ÿ0-9\s'\-\.]+$" minlength="2" title="Vous devez saisir le numéro de la maison (chiffres) suivi du nom de la rue.">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="adress2">Ville</label>
                        <input type="text" class="form-control" id="adress2" placeholder="10000 EXEMPLE" required
                        pattern="^\d{5} [A-Za-zÀ-ÿ\-]+$" minlength="2" title="Respectez le format.">
                        <div class="form-text">Format exact: 10000 EXEMPLE</div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="state">Pays:</label>
                        <select id="state" class="form-control" required>
                            <option value="">Choisir son pays</option>
                            <option value="france">France</option>
                            <option value="belgique">Belgique</option>
                            <option value="suisse">Suisse</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success mt-5" id="buttonSubmitForm" aria-details="create">Créer mon compte</button>
            </form>
        </section>
    </main>
    
    <?php
        //- Appel du fichier php: Footer
        include_once 'static/footer.php';
    ?>
</body>