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
    <title>Pet Assist' - J'ai trouvé un animal</title>

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
            <h1 class="articletitle">Remplissez les informations concernant l'animal que vous avez vu:</h1>
            <div class="line"></div>
            <p class="description">Vous avez aperçu un animal disparu ? Aidez-nous à le retrouver en remplissant ce
                formulaire. Partagez les détails de votre observation pour alerter la communauté. <br>* : Champs
                obligatoires</p>
            <form novalidate method="POST" id="formV" enctype="multipart/form-data">
                <div class="row mt-4">
                    <h2>Informations sur l'animal:</h2>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-lg-6">
                        <label for="spicies">Choisir une espèce *:</label>
                        <select name="spicies" id="spicies" class="form-control" required>
                            <?php // Affichage de toutes les espèces à partir de la bdd
                            foreach(getAllSpicies() as $data){
                                echo '<option value="'.$data['id_spicies'].'">'.$data['spicies'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="race">Choisir une race *:</label>
                        <select name="race" id="race" class="form-control" required>
                            <?php // Affichage de toutes les espèces à partir de la bdd
                            foreach(getAllRaces() as $data){
                                echo '<option class="st'.$data['id_spicies'].'" value="'.$data['id_race'].'">'.$data['race'].'</option>';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-lg-4">
                        <p>Sexe *:</p>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pet-sex" id="pet-sexM"
                                value="1" required>
                            <label class="form-check-label" for="pet-sexM">Mâle</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="pet-sex" id="pet-sexF"
                                value="0" required>
                            <label class="form-check-label" for="pet-sexF">Femelle</label>
                        </div>
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pet-color">Couleur(s) *:</label>
                        <input type="text" class="form-control" name="pet-color" id="pet-color" placeholder="Ex: Roux, noir" required
                            pattern="^[A-Za-z]{2,}$" minlength="2"
                            title="La couleur de l'animal ne peut contenir que des lettres et avoir plus de deux lettres">
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label for="pet-waist">Taille:</label>
                        <input type="text" class="form-control" name="pet-waist" id="pet-waist"
                            placeholder="Grand, moyen, petit ou en centimètres." pattern="^[A-Za-z0-9]{1,}$"
                            minlength="1"
                            title="La couleur de l'animal ne peut contenir que des lettres et avoir au moins une lettre">
                    </div>
                    <div class="form-group col-6 col-lg-4">
                        <label for="pet-age">Age:</label>
                        <input type="number" class="form-control" name="pet-age" id="pet-age" placeholder="Age approximatif"
                            pattern="^[0-9]{1,}$" minlength="1" title="L'âge doit être écrit en chiffre">
                    </div>
                    <div class="form-group col-lg-8">
                        <label for="pet-puce">Numéro de puce:</label>
                        <input type="number" class="form-control" name="pet-puce" id="pet-puce" placeholder="Ex: 250 26 10 55101789"
                            pattern="^[0-9]{15,}$" minlength="15" title="Le numéro de puce doit contenir 15 chiffres">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-lg-4">
                        <label for="pet-physic">Particularités physique:</label>
                        <input type="text" class="form-control" name="pet-physic" id="pet-physic" placeholder="Ex: Tache noir sur le dos"
                            pattern="^[A-Za-z\s]{2,}$" minlength="2" title="Vous devez saisir plus de deux lettres">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pet-comport">Comportement:</label>
                        <input type="text" class="form-control" name="pet-comport" id="pet-comport" placeholder="Ex: Vif, peureux ..."
                            pattern="^[A-Za-z\s]{2,}$" minlength="2" title="Vous devez saisir plus de deux lettres">
                    </div>
                    <div class="form-group col-lg-4">
                        <label for="pet-pic" class="form-label">Importez une photo de l'animal *:</label>
                        <input class="form-control" type="file" name="pet-pic" id="pet-pic" accept="image/*" required>
                        <div class="form-text">Formats autorisés: .JPG .PNG .JPEG</div>
                    </div>
                </div>
                <div class="row mt-4">
                    <h2>Informations de l'observation:</h2>
                </div>
                <div class="row mt-2">
                    <div class="form-group col-lg-6">
                        <label for="pet-adress">Lieu de l'observation *:</label>
                        <input type="text" class="form-control" name="pet-adress" id="pet-adress"
                            placeholder="Ex: 18 rue de l’exemple 60000 EXEMPLE" required
                            pattern="^(?=.*\d{5})([A-Za-zÀ-ÿ0-9\s'\-\.]+(?:\s*\d{5}\s*)?[A-Za-zÀ-ÿ0-9\s'\-\.]+)*$"
                            minlength="5" title="Vous devez saisir au minimum un code postal.">
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="pet-date">Date de l'observation:</label>
                        <input type="date" class="form-control" name="pet-date" id="pet-date" min="2025-01-01" max=<?php echo '"'.date('Y-m-d').'"' ?> required>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="pet-time">Heure de l'observation:</label>
                        <input type="time" class="form-control" name="pet-time" id="pet-time" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4" id="buttonSubmitForm" aria-details="found">Valider
                    les informations</button>
            </form>
        </section>
    </main>
    <?php require_once 'templates/footer.php'; // Affichage du footer  ?>
</body>
</html>