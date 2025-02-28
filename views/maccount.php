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
    <title>Pet Assist' - Modifier mon compte</title>

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
            if(userConnected() == true){ // On vérifie que l'user soit connecté
                $uInfo = getUserInfo($_SESSION["id_user"]); // On récupère ses infos
            ?>
            <h1 class="articletitle">Modifiez votre compte Pet Assist':</h1>
            <div class="line"></div>
            <p class="description">Votre adresse a changé ? Vous souhaitez modifier une information bien précise ? Remplissez l'information à modifier, et modifiez votre compte dès maintenant.<br>Vous n'êtes pas obligé de retaper votre mot de passe ou de ré-importer votre photo de profil.</p>
            <form novalidate method="POST" id="formV" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-6 col-lg-4">
                        <label for="firstname">Nom:</label>
                        <?php echo '<input type="text" class="form-control" name="firstname" value="'.$uInfo['firstname'].'" id="firstname" placeholder="Saisissez votre nom de famille" required pattern="^[A-Za-zÀ-ÿ]{2,}$" minlength="2" title="Le nom de famille ne peut contenir que des lettres">'; ?>
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label for="lastname">Prénom:</label>
                        <?php echo '<input type="text" class="form-control" name="lastname" value="'.$uInfo['lastname'].'" id="lastname" placeholder="Saisissez votre prénom" required pattern="^[A-Za-zÀ-ÿ]{2,}$" minlength="2" title="Le prénom ne peut contenir que des lettres">'; ?>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pseudo">Pseudonyme:</label>
                        <?php echo '<input type="text" class="form-control" name="pseudo" value="'.$uInfo['pseudo'].'" id="pseudo" placeholder="Saisissez un pseudonyme pour le site" required pattern="^[A-Za-z0-9À-ÿ]{2,}$" minlength="2" title="Le pseudonyme ne peut contenir que des lettres et des chiffres">'; ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="email">Email:</label>
                        <?php echo '<input type="email" class="form-control" name="email" value="'.$uInfo['mail'].'" id="email" placeholder="exemple@exemple.com" required pattern="^[a-z0-9\._\%\+\-]+@[a-z0-9\.\-]+\.[a-z]{2,}$">'; ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="password">Mot de passe:</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Saisissez votre mot de passe pour accéder à votre compte." pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$" title="Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères">
                        <div class="form-text">Ne donnez jamais votre mot de passe à qui que ce soit.</div>
                    </div>
                </div>
                <div class="row mt-5 flex-row-reverse">
                    <div class="form-group col-lg-6">
                        <label for="profil-Pic" class="form-label">Importez votre photo de profil</label>
                        <input class="form-control" type="file" name="profil-Pic" id="profil-Pic" accept="image/*">
                        <div class="form-text">Formats autorisés: .JPG .PNG .JPEG</div>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="adress">Adresse:</label>
                        <?php echo '<input type="text" class="form-control" name="adress" value="'.$uInfo['adress'].'" id="adress" placeholder="85 rue de l\'exemple" required pattern="^\d+[A-Za-zÀ-ÿ0-9\s\'\-\.]+$" minlength="2" title="Vous devez saisir le numéro de la maison (chiffres) suivi du nom de la rue.">'; ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="city">Ville:</label>
                        <?php echo '<input type="text" class="form-control" name="city" value="'.$uInfo['city'].'" id="city" placeholder="PARIS" required pattern="^[A-Za-zÀ-ÿ]{2,}$" minlength="2" title="Respectez le format.">'; ?>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="postal_code">Code postal:</label>
                        <?php echo '<input type="text" class="form-control" name="postal_code" value="'.$uInfo['postal_code'].'" id="postal_code" placeholder="10000" required pattern="^[0-9]{5,}$" minlength="5" title="Le code postal doit contenir que des chiffres">'; ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary text-light mt-5" id="buttonSubmitForm" aria-details="modify">Modifier mon compte</button>
            </form>
        <?php } ?>
        </section>
    </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>
