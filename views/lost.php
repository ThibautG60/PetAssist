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
    <title>Pet Assist' - J'ai perdu mon animal</title>

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
            <h1 class="articletitle">Remplissez les informations concernant votre animal:</h1>
            <div class="line"></div>
            <p class="description">Vous avez perdu un animal ? Remplissez ce formulaire pour nous aider à le retrouver.
                Veuillez fournir les informations suivantes: <br>* : Champs obligatoires</p>
            <form novalidate method="POST" action="" id="formV">
                <div class="row mt-4">
                    <h2>Informations sur l'animal:</h2>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-lg-4">
                        <label for="pet-name">Nom de l'animal:</label>
                        <input type="text" class="form-control" id="pet-name" placeholder="Nom auquel l’animal répond"
                            pattern="^[A-Za-z]{2,}$" minlength="2"
                            title="Le nom de l'animal ne peut contenir que des lettres et avoir plus de deux lettres">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="state">Choisir une espèce *:</label>
                        <select id="state" class="form-control" required>
                            <option value="">Choisir dans la liste</option>
                            <option value="chien">Chien</option>
                            <option value="chat">Chat</option>
                            <option value="oiseau">Oiseau</option>
                            <option value="nac">Nouveaux animaux de compagnie, exemple: rongeurs</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pet-race">Race *:</label>
                        <input type="text" class="form-control" id="pet-race" placeholder="Ex: Labrador, teckel ..."
                            required pattern="^[A-Za-z]{2,}$" minlength="2"
                            title="La race de l'animal ne peut contenir que des lettres et avoir plus de deux lettres">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-lg-4">
                        <p>Sexe *:</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pet-sexM"
                                value="M" required>
                            <label class="form-check-label" for="pet-sexM">Mâle</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="pet-sexF"
                                value="F" required>
                            <label class="form-check-label" for="pet-sexF">Femelle</label>
                        </div>
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label for="pet-color">Couleur(s) *:</label>
                        <input type="text" class="form-control" id="pet-color" placeholder="Ex: Roux, noir" required                             
                        pattern="^[A-Za-z]{2,}$" minlength="2"
                        title="La couleur de l'animal ne peut contenir que des lettres et avoir plus de deux lettres">
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label for="pet-waist">Taille:</label>
                        <input type="text" class="form-control" id="pet-waist"
                            placeholder="Grand, moyen, petit ou en centimètres."                             
                            pattern="^[A-Za-z0-9]{1,}$" minlength="1"
                            title="La couleur de l'animal ne peut contenir que des lettres et avoir au moins une lettre">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-6 col-lg-4">
                        <label for="pet-weight">Poids:</label>
                        <input type="number" class="form-control" id="pet-weight" placeholder="Poids en Kg"                             
                        pattern="^[0-9]{1,}$" minlength="1"
                        title="Le poids doit être écrit en chiffre">
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label for="pet-age">Age:</label>
                        <input type="number" class="form-control" id="pet-age" placeholder="Age approximatif"                             
                        pattern="^[0-9]{1,}$" minlength="1"
                        title="L'âge doit être écrit en chiffre">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pet-puce">Numéro de puce:</label>
                        <input type="number" class="form-control" id="pet-puce" placeholder="Ex: 250 26 10 55101789"                             
                        pattern="^[0-9]{15,}$" minlength="15"
                        title="Le numéro de puce doit contenir 15 chiffres">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-lg-4">
                        <label for="pet-physic">Particularités physique:</label>
                        <input type="text" class="form-control" id="pet-physic" placeholder="Ex: Tache noir sur le dos"
                        pattern="^[A-Za-z]{2,}$" minlength="2"
                            title="Vous devez saisir plus de deux lettres">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pet-comport">Comportement:</label>
                        <input type="text" class="form-control" id="pet-comport" placeholder="Ex: Vif, peureux ..."
                        pattern="^[A-Za-z]{2,}$" minlength="2"
                        title="Vous devez saisir plus de deux lettres">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pet-pic" class="form-label">Importez une photo de l'animal</label>
                        <input class="form-control" type="file" id="pet-pic">
                    </div>
                </div>
                <div class="row mt-4">
                    <h2>Informations sur la disparition:</h2>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-lg-6">
                        <label for="pet-adress">Lieu où l'animal a été vu pour la dernière fois *:</label>
                        <input type="text" class="form-control" id="pet-adress"
                            placeholder="Ex: 18 rue de l’exemple 60000 EXEMPLE" required
                            pattern="^(?=.*\d{5})([A-Za-zÀ-ÿ0-9\s'\-\.]+(?:\s*\d{5}\s*)?[A-Za-zÀ-ÿ0-9\s'\-\.]+)*$" minlength="5"
                            title="Vous devez saisir au minimum un code postal.">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="pet-date">Date de la dispartion *:</label>
                        <input type="date" class="form-control" id="pet-date" required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="pet-time">Heure de la dispartion:</label>
                        <input type="time" class="form-control" id="pet-time">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4" id="buttonSubmitForm" aria-details="lost">Valider les
                    informations</button>
            </form>
        </section>
    </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>