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
    <title>Pet Assist' - Profil de Kiwi</title>

    <!-- Importation des fichiers CSS -->
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/accountstyle.css">
    <link rel="stylesheet" href="assets/css/adminstyle.css">
    <link rel="stylesheet" href="assets/css/msg.css">

    <!-- Importation des fichiers JS -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script defer src="assets/js/animations.js"></script>
    <script defer src="assets/js/msg.js"></script>
    <script defer src="assets/js/admin.js"></script>
</head>

<body>
    <?php require_once 'templates/header.php'; // Affichage du header ?>
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="paw">
            <path
                d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z" />
        </svg>
        <section class="body-box">
            <div class="body-head-box">
                <div class="f100 icon-admin-box">
                    <h1 class="articletitle">Kiwi</h1>
                </div>
                <div class="lineb"></div>
                <p class="description f100">Cliquez sur le nom du profil du propriétaire pour accéder à son profil.
                    <br>Voici les informations détaillées à propos de Kiwi:
                </p>
            </div>
            <div class="info-profil-img">
                <img src="assets/img/pet/cat1.jpg" alt="Photo de l'animal" id="profil-pic">
                <button class="btn btn-primary msg-button">J’ai des informations !
                    (Contacter le propriétaire)</button>
            </div>
            <div class="body-info-box">
                <h2>Informations sur l'animal:</h2>
                <ul class="text-list f100">
                    <li><b>Espèce:</b> Chat</li>
                    <li><b>Race:</b> Sacré de birmanie</li>
                    <li><b>Sexe:</b> Male</li>
                    <li><b>Couleur(s):</b> /</li>
                    <li><b>Taille:</b> Moyenne</li>
                    <li><b>Particularités physiques:</b> /</li>
                    <li><b>Comportement observé :</b> /</li>
                    <li><b>Âge:</b> /</li>
                </ul>
                <h2>Informations sur le dernier signalement:</h2>
                <ul class="text-list f100">
                    <li><b>Adresse ou zone approximative:</b> Rodemack - Rue Bernard III de Bade</li>
                    <li><b>Date de la disparition: </b> 25 Novembre 2024</li>
                    <li><b>Heure de la disparition:</b> 15H12</li>
                </ul>
                <h2>Profil du propriétaire:</h2>
                <div class="info-profil f100">
                    <img src="assets/img/profil/profpic5.jfif" alt="Photo du profil" id="little-profil-pic">
                    <a href="?p=vcompte" id="profil-link">Lucie</a>
                </div>
            </div>
            <dialog class="msg-box" id="msg-dial">
                <button type="button" class="btn-close" id="close-msg-button"></button>
                <div class="msg-back">
                    <div class="msg-text-2">Début de la conversation</div>
                    <form id="formMsg" action="">
                        <textarea id="msg-input" name="msg-input" rows="4" cols="50"
                            placeholder="Ecrivez votre message"></textarea>
                        <br>
                        <input class="btn btn-primary" type="submit" value="Envoyer le message">
                    </form>
                </div>
            </dialog>
            <dialog class="fmodify-box" id="fmodify-dial">
                <button type="button" class="btn-close" id="close-fmodify-button"></button>
                <div class="fmodify-back">
                    <h3>Modifier les informations</h3>
                    <form id="formModify" action="">
                        <div class="row mt-2">
                            <div class="form-group col-lg-6">
                                <label for="pet-name">Nom de l'animal:</label>
                                <input type="text" class="form-control" id="pet-name" required
                                    pattern="^[A-Za-z]{2,}$" minlength="2"
                                    title="Le nom de l'animal ne peut contenir que des lettres et avoir plus de deux lettres">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="pet-race">Race:</label>
                                <input type="text" class="form-control" id="pet-race" required
                                    required pattern="^[A-Za-z]{2,}$" minlength="2"
                                    title="La race de l'animal ne peut contenir que des lettres et avoir plus de deux lettres">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-6 col-lg-6">
                                <label for="pet-color">Couleur(s):</label>
                                <input type="text" class="form-control" id="pet-color" required                             
                                pattern="^[A-Za-z]{2,}$" minlength="2"
                                title="La couleur de l'animal ne peut contenir que des lettres et avoir plus de deux lettres">
                            </div>
                            <div class="form-group col-6 col-lg-6">
                                <label for="pet-waist">Taille:</label>
                                <input type="text" class="form-control" id="pet-waist" required                         
                                    pattern="^[A-Za-z0-9]{1,}$" minlength="1"
                                    title="La couleur de l'animal ne peut contenir que des lettres et avoir au moins une lettre">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-6 col-lg-4">
                                <label for="pet-weight">Poids:</label>
                                <input type="number" class="form-control" id="pet-weight" required                            
                                pattern="^[0-9]{1,}$" minlength="1"
                                title="Le poids doit être écrit en chiffre">
                            </div>
                            <div class="form-group col-6 col-lg-4">
                                <label for="pet-age">Age:</label>
                                <input type="number" class="form-control" id="pet-age" required                            
                                pattern="^[0-9]{1,}$" minlength="1"
                                title="L'âge doit être écrit en chiffre">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="pet-puce">Numéro de puce:</label>
                                <input type="number" class="form-control" id="pet-puce" required
                                pattern="^[0-9]{15,}$" minlength="15"
                                title="Le numéro de puce doit contenir 15 chiffres">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-lg-4">
                                <label for="pet-physic">Particularités physique:</label>
                                <input type="text" class="form-control" id="pet-physic" required
                                pattern="^[A-Za-z]{2,}$" minlength="2"
                                    title="Vous devez saisir plus de deux lettres">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="pet-comport">Comportement:</label>
                                <input type="text" class="form-control" id="pet-comport" required
                                pattern="^[A-Za-z]{2,}$" minlength="2"
                                title="Vous devez saisir plus de deux lettres">
                            </div>
                            <div class="form-group col-lg-4">
                                <label for="pet-pic" class="form-label">Modifiez une photo de l'animal</label>
                                <input class="form-control" type="file" id="pet-pic">
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="form-group col-lg-6">
                                <label for="pet-adress">Lieu où l'animal a été vu pour la dernière fois:</label>
                                <input type="text" class="form-control" id="pet-adress" required
                                    pattern="^(?=.*\d{5})([A-Za-zÀ-ÿ0-9\s'\-\.]+(?:\s*\d{5}\s*)?[A-Za-zÀ-ÿ0-9\s'\-\.]+)*$" minlength="5"
                                    title="Vous devez saisir au minimum un code postal.">
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="pet-date">Date de la dispartion:</label>
                                <input type="date" class="form-control" id="pet-date" required>
                            </div>
                            <div class="form-group col-lg-3">
                                <label for="pet-time">Heure de la dispartion:</label>
                                <input type="time" class="form-control" id="pet-time" required>
                            </div>
                        </div>
                        <input class="btn btn-success mt-3" type="submit" value="Modifier les informations">
                    </form>
                </div>
            </dialog>
        </section>
    </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>
