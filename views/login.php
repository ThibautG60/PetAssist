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
    <title>Pet Assist' - Je me connecte</title>

    <!-- Importation des fichiers CSS -->
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/accountstyle.css">

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
            <h1 class="articletitle">Connectez-vous à votre compte:</h1>
            <div class="line"></div>
            <form novalidate method="POST" class="formlog" id="formV">
                <div class="mb-3">
                    <label for="email" class="form-label">Adresse email:</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="exemple@exemple.com" required
                    pattern="^[a-z0-9\._\%\+\-]+@[a-z0-9\.\-]+\.[a-z]{2,}$">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Mot de passe:</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Saisissez votre mot de passe ici" required
                    pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
                    title="Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères">
                    <div class="form-text">Ne donnez jamais votre mot de passe à qui que ce soit.</div>
                    <!-- <a class="form-text" href="?p=pass_perdu">Mot de passe oublié</a> -->
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" name="steelconnect" id="steelconnect">
                    <label class="form-check-label" for="steelconnect">Rester connecté</label>
                </div>
                <button type="submit" class="btn btn-success mb-2 me-xl-5 col-xs-6 col-xl-3" id="buttonSubmitForm" aria-details="login">Se
                    connecter</button>
                <a class="btn btn-primary ms-xl-5 col-sm-6 col-xl-6" href="?p=creer_compte" role="button">Pas encore de
                    compte ?
                    Cliquez ici pour le créer</a>
            </form>
        </section>
    </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer ?>
</body>
</html>
