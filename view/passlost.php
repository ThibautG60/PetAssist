<head>
    <link rel="stylesheet" href="assets/css/accountstyle.css">
    <script defer src="assets/js/form.js"></script>
</head>

<section class="articlefixe">
    <h1 class="articletitle">Nouveau mot de passe:</h1>
    <div class="line"></div>
    <form novalidate method="POST" action="" class="formlog" id="formV">
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe:</label>
            <input type="password" class="form-control" id="password" placeholder="Saisissez votre mot de passe ici" required
            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
            title="Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères">
        </div>
        <div class="mb-3">
            <label for="password2" class="form-label">Confirmation du mot de passe:</label>
            <input type="password" class="form-control" id="password2" placeholder="Confirmez votre mot de passe ici" required
            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
            title="Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères">
            <div class="form-text">Ne donnez jamais votre mot de passe à qui que ce soit.</div>
        </div>
        <button type="submit" class="btn btn-success mb-2 me-xl-5 col-xs-6 col-xl-3" id="buttonSubmitForm" aria-details="passlost">Valider le mot de passe</button>
    </form>
</section>
