<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/accountstyle.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/msg.css">
    <link rel="shortcut icon" href="assets/img/iconsite.png" />

    <script src="assets/js/bootstrap.bundle.js"></script>
    <script defer src="assets/js/animations.js"></script>
    <script defer src="assets/js/msg.js"></script>
    <script defer src="assets/js/account.js"></script>

    <title>Pet Assist' - Mon compte</title>
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
            <h1 class="articletitle" id="accounttitle">Bienvenue dans votre espace personnel</h1>
            <p>Sur la page de gestion de votre compte, vous pourrez facilement gérer vos informations et suivre
                l'évolution de vos annonces. Voici ce que vous pourrez faire :</p>
            <ul>
                <li><b>Modifier votre compte : </b> Mettez à jour vos informations personnelles, comme votre nom,
                    adresse e-mail ou mot de passe.</li>
                <li><b>Consulter vos notifications :</b> Vous trouverez ici toutes les alertes concernant vos annonces,
                    telles que les nouvelles mises à jour ou les réponses d'autres utilisateurs.</li>
                <li><b>Lire vos messages : </b>Accédez à un espace dédié pour échanger avec les autres membres du site,
                    répondre à des questions ou discuter des animaux perdus ou retrouvés.</li>
                <li><b>Gérer vos annonces :</b> Consultez, modifiez ou supprimez vos annonces concernant les animaux
                    perdus ou retrouvés.</li>
            </ul>
            <p>Cette page vous offre un moyen simple et rapide de suivre toutes vos activités et de rester informé sur
                vos signalements.</p>
            <div class="accountarea">
                <div class="accountcat">
                    <h2>Mes publications</h2>
                    <div class="line"></div>
                    <div class="accordion accordion-flush" id="accordionPublish">
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed bg-danger text-light" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false"
                                    aria-controls="collapseOne">
                                    Je cherche: Medor
                                </button>
                            </h3>
                            <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordion-flush">
                                <div class="accordion-body">
                                    <img src="https://picsum.photos/200/300?random=2" alt="image animal">
                                    <p>Espèce: Chien <br>Race: Test <br>Lieu: 89 rue du test 60420 Toast
                                        <br>Date: 01/01/2000
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed bg-success text-light" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false"
                                    aria-controls="collapseTwo">
                                    Je cherche: Kiwi [RETROUVE]
                                </button>
                            </h3>
                            <div id="collapseTwo" class="accordion-collapse collapse"
                                data-bs-parent="#accordionPublish">
                                <div class="accordion-body">
                                    <img src="https://picsum.photos/200/300?random=2" alt="image animal">
                                    <p>Espèce: Chien <br>Race: Test <br>Lieu: 89 rue du test 60420 Toast
                                        <br>Date: 01/01/2000
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button collapsed bg-info text-light" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    J'ai vu: Un chat
                                </button>
                            </h3>
                            <div id="collapseThree" class="accordion-collapse collapse"
                                data-bs-parent="#accordionPublish">
                                <div class="accordion-body">
                                    <img src="https://picsum.photos/200/300?random=2" alt="image animal">
                                    <p>Espèce: Chien <br>Race: Test <br>Lieu: 89 rue du test 60420 Toast
                                        <br>Date: 01/01/2000
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accountcat" id="bordercenter">
                    <h2>Mes notifications</h2>
                    <div class="line"></div>
                    <div class="halert">
                        <div class="alert alert-info" role="alert">
                            Vous avez reçu un message !
                        </div>
                        <div class="alert alert-success" role="alert">
                            L'avis de recherche de Kiwi est classé dans les " retrouvés "
                        </div>
                        <div class="alert alert-success" role="alert">
                            L'avis de recherche de Medor a été publié sur le site
                        </div>
                    </div>
                </div>
                <div class="accountcat">
                    <h2>Mes messages</h2>
                    <div class="line"></div>
                    <div class="msg-button-group">
                        <button class="btn btn-secondary text-light msg-button" type="button">
                            Edouard .G <span class="badge text-bg-success ms-2">Nouveau message</span>
                        </button>
                        <button class="btn btn-secondary text-light msg-button" type="button">
                            Camille .B
                        </button>
                        <button class="btn btn-secondary text-light msg-button" type="button">
                            Silvio.T
                        </button>
                        <button class="btn btn-secondary text-light msg-button" type="button">
                            Adrian .Q
                        </button>
                    </div>
                </div>
            </div>
            </div>
            <div class="articletitle">
                <p>Vous pouvez modifier votre compte ou vous déconnecter à tout moment en cliquant sur le bouton
                    ci-dessous:</p>
                <a href="maccount.php" class="btn btn-primary ml-5 mb-2" role="button">Modifier mon compte</a>
                <a class="btn ml-5 mb-2" id="deconnect" role="button">Se déconnecter</a>
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
        </section>
    </main>
    
    <?php
        //- Appel du fichier php: Footer
        include_once 'static/footer.php';
    ?>
</body>

</html>