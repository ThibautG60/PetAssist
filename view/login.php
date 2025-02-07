<head>
    <link rel="stylesheet" href="assets/css/accountstyle.css">
    <script defer src="assets/js/form.js"></script>
    <title>Pet Assist' - Je me connecte</title>
</head>

<section class="articlefixe">
    <h1 class="articletitle">Connectez-vous à votre compte:</h1>
    <div class="line"></div>
    <form novalidate method="POST" action="" class="formlog" id="formV">
        <div class="mb-3">
            <label for="email" class="form-label">Adresse email:</label>
            <input type="email" class="form-control" id="email" placeholder="exemple@exemple.com" required
            pattern="^[a-z0-9\._\%\+\-]+@[a-z0-9\.\-]+\.[a-z]{2,}$">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe:</label>
            <input type="password" class="form-control" id="password" placeholder="Saisissez votre mot de passe ici" required
            pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$"
            title="Le mot de passe doit contenir au moins un nombre, une lettre majuscule et minuscule et comporter au moins 8 caractères">
            <div class="form-text">Ne donnez jamais votre mot de passe à qui que ce soit.</div>
            <a class="form-text" href="?page=plost">Mot de passe oublié</a>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleCheck1">
            <label class="form-check-label" for="exampleCheck1">Rester connecté</label>
        </div>
        <button type="submit" class="btn btn-success mb-2 me-xl-5 col-xs-6 col-xl-3" id="buttonSubmitForm" aria-details="login">Se
            connecter</button>
        <a class="btn btn-primary ms-xl-5 col-sm-6 col-xl-6" href="?page=create" role="button">Pas encore de
            compte ?
            Cliquez ici pour le créer</a>
    </form>
</section>
