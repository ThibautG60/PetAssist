<head>
    <script defer src="assets/js/form.js"></script>
    <title>Pet Assist' - J'ai trouvé un animal</title>
</head>

<section class="articlefixe">
    <h1 class="articletitle">Remplissez les informations concernant l'animal que vous avez vu:</h1>
    <div class="line"></div>
    <p class="description">Vous avez aperçu un animal disparu ? Aidez-nous à le retrouver en remplissant ce
        formulaire. Partagez les détails de votre observation pour alerter la communauté. <br>* : Champs
        obligatoires</p>
    <form novalidate method="POST" action="" id="formV">
        <div class="row mt-4">
            <h2>Informations sur l'animal:</h2>
        </div>
        <div class="row mt-2">
            <div class="form-group col-lg-6">
                <label for="state">Choisir une espèce *:</label>
                <select id="state" class="form-control" required>
                    <option value="">Choisir dans la liste</option>
                    <option value="chien">Chien</option>
                    <option value="chat">Chat</option>
                    <option value="oiseau">Oiseau</option>
                    <option value="nac">Nouveaux animaux de compagnie, exemple: rongeurs</option>
                </select>
            </div>
            <div class="form-group col-lg-6">
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
            <div class="form-group col-lg-4">
                <label for="pet-color">Couleur(s) *:</label>
                <input type="text" class="form-control" id="pet-color" placeholder="Ex: Roux, noir" required
                    pattern="^[A-Za-z]{2,}$" minlength="2"
                    title="La couleur de l'animal ne peut contenir que des lettres et avoir plus de deux lettres">
            </div>
            <div class="form-group col-6 col-lg-4">
                <label for="pet-waist">Taille:</label>
                <input type="text" class="form-control" id="pet-waist"
                    placeholder="Grand, moyen, petit ou en centimètres." pattern="^[A-Za-z0-9]{1,}$"
                    minlength="1"
                    title="La couleur de l'animal ne peut contenir que des lettres et avoir au moins une lettre">
            </div>
            <div class="form-group col-6 col-lg-4">
                <label for="pet-age">Age:</label>
                <input type="number" class="form-control" id="pet-age" placeholder="Age approximatif"
                    pattern="^[0-9]{1,}$" minlength="1" title="L'âge doit être écrit en chiffre">
            </div>
            <div class="form-group col-lg-8">
                <label for="pet-puce">Numéro de puce:</label>
                <input type="number" class="form-control" id="pet-puce" placeholder="Ex: 250 26 10 55101789"
                    pattern="^[0-9]{15,}$" minlength="15" title="Le numéro de puce doit contenir 15 chiffres">
            </div>
        </div>
        <div class="row mt-2">
            <div class="form-group col-lg-4">
                <label for="pet-physic">Particularités physique:</label>
                <input type="text" class="form-control" id="pet-physic" placeholder="Ex: Tache noir sur le dos"
                    pattern="^[A-Za-z]{2,}$" minlength="2" title="Vous devez saisir plus de deux lettres">
            </div>
            <div class="form-group col-lg-4">
                <label for="pet-comport">Comportement:</label>
                <input type="text" class="form-control" id="pet-comport" placeholder="Ex: Vif, peureux ..."
                    pattern="^[A-Za-z]{2,}$" minlength="2" title="Vous devez saisir plus de deux lettres">
            </div>
            <div class="form-group col-lg-4">
                <label for="pet-pic" class="form-label">Importez une photo de l'animal</label>
                <input class="form-control" type="file" id="pet-pic">
            </div>
        </div>
        <div class="row mt-4">
            <h2>Informations de l'observation:</h2>
        </div>
        <div class="row mt-2">
            <div class="form-group col-lg-6">
                <label for="pet-adress">Lieu de l'observation *:</label>
                <input type="text" class="form-control" id="pet-adress"
                    placeholder="Ex: 18 rue de l’exemple 60000 EXEMPLE" required
                    pattern="^(?=.*\d{5})([A-Za-zÀ-ÿ0-9\s'\-\.]+(?:\s*\d{5}\s*)?[A-Za-zÀ-ÿ0-9\s'\-\.]+)*$"
                    minlength="5" title="Vous devez saisir au minimum un code postal.">
            </div>
            <div class="form-group col-lg-3">
                <label for="pet-date">Date de l'observation:</label>
                <input type="date" class="form-control" id="pet-date" required>
            </div>
            <div class="form-group col-lg-3">
                <label for="pet-time">Heure de l'observation:</label>
                <input type="time" class="form-control" id="pet-time">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4" id="buttonSubmitForm" aria-details="found">Valider
            les informations</button>
    </form>
</section>