<head>
    <link rel="stylesheet" href="assets/css/accountstyle.css">
    <link rel="stylesheet" href="assets/css/msg.css">
    <script defer src="assets/js/msg.js"></script>
    <script defer src="assets/js/account.js"></script>
    <title>Pet Assist' - Mon compte</title>
</head>

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
        <a href="?page=amodify" class="btn btn-primary ml-5 mb-2" role="button">Modifier mon compte</a>
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
