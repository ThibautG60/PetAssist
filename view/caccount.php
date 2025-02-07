<head>
    <script defer src="assets/js/form.js"></script>
    <title>Pet Assist' - Je créé mon compte</title>
</head>

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