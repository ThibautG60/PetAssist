<head>
<?php
//-- On sélectionne le contenu à afficher en enfonction de la variable page
global $currentPage;
switch($currentPage){
    /* TITRES DES PAGES */
    case 'advice':
        echo "<title>Pet Assist' - Nos conseils</title>";
        break;
    case 'faq':
        echo "<title>Pet Assist' - Foire au questions</title>";
        break;
    case 'rules':
        echo "<title>Pet Assist' - Règlement du site</title>";
        break;
    case 'mentions':
        echo '<link rel="stylesheet" href="assets/css/mentionsstyle.css">';
        echo "<title>Pet Assist' - Mentions Légales</title>";
        break;
    /* Error 404 */
    default:
        echo "<title>Pet Assist' - Coup dur</title>";
        break;
}
?>
</head>

<?php
switch($currentPage){
    /* PAGE CONSEILS */
    case 'advice':
        echo <<< 'HTML'
        <section class="presentation">
        <article class="article">
            <h1 class="articletitle">Nos conseils pour vous aider dans vos recherches</h1>
            <div class="line"></div>
            <p class="description">Retrouver un animal perdu peut être une expérience stressante, mais voici
                quelques conseils pratiques
                pour augmenter vos chances de le retrouver rapidement et en toute sécurité :</p>
            <ol>
                <li class="listcat">Agir rapidement</li>
                <p><b>Ne perdez pas de temps :</b> Plus vous commencez tôt, plus vous avez de chances de
                    retrouver votre animal. Dès que vous vous apercevez qu'il est perdu, commencez à le chercher
                    immédiatement.</p>
                <li class="listcat">Rechercher dans les environs</li>
                <ul>
                    <li><b>Vérifiez votre quartier :</b> Commencez par faire le tour de votre quartier, en appelant
                        son nom, en l’appelant d’une voix calme. Parfois, les animaux se cachent à proximité.</li>
                    <li><b>Vérifiez les endroits où il se cache habituellement :</b> Regardez sous les buissons,
                        dans les garages ouverts, sous les voitures, et dans d'autres lieux où il pourrait se sentir
                        en sécurité.</li>
                    <li><b>Parlez aux voisins :</b> Demandez à vos voisins s'ils ont vu votre animal. Parfois, les
                        animaux sont trouvés et gardés temporairement avant que les propriétaires ne soient
                        informés.</li>
                </ul>
                <li class="listcat">Alertez les autorités et les associations</li>
                <ul>
                    <li><b>Contactez les refuges et les vétérinaires locaux :</b> Appelez les refuges, cliniques
                        vétérinaires et associations de protection des animaux pour signaler que votre animal est
                        perdu. Laissez-leur une description détaillée (couleur, taille, comportement, etc.) et vos
                        coordonnées.</li>
                    <li><b>Signalez à la fourrière :</b> En fonction de votre pays, certains animaux errants peuvent
                        être recueillis par la fourrière, donc il est important de leur signaler la perte
                        rapidement.</li>
                    <li><b>Utilisez les plateformes en ligne :</b>Inscrivez-vous sur des sites ou applications
                        spécialisés dans les animaux perdus (comme Pet Assist'), ou sur des groupes Facebook locaux
                        dédiés aux animaux disparus.</li>
                </ul>
                <li class="listcat">Distribuer des affiches</li>
                <ul>
                    <li><b>Créez des affiches claires et visibles :</b> Rédigez des affiches avec une photo récente
                        de votre animal, une description détaillée, votre numéro de téléphone et, si possible, une
                        récompense. Affichez-les dans des lieux fréquentés (supermarchés, parcs, panneaux
                        d'affichage communautaires) et demandez à vos voisins de vous aider.</li>
                    <li><b>Diffuser en ligne :</b> Partagez des informations sur les réseaux sociaux, notamment dans
                        les groupes locaux. Utilisez des plateformes comme Instagram, Facebook, et Twitter pour
                        alerter un plus grand nombre de personnes.</li>
                </ul>
                <li class="listcat">Parler à la communauté</li>
                <ul>
                    <li><b>Demandez à la communauté locale :</b> Parlez à vos voisins, postez sur des groupes
                        communautaires (réseaux sociaux locaux, forums, etc.). Plus de gens seront à l’affût de
                        votre animal, ce qui augmente les chances de le retrouver.</li>
                    <li><b>Vérifiez les caméras de sécurité locales :</b> Si vous vivez dans une zone avec des
                        caméras de sécurité publiques ou privées, demandez si elles ont capturé des images de votre
                        animal.</li>
                </ul>
                <li class="listcat">Utiliser des méthodes de recherche supplémentaires</li>
                <ul>
                    <li><b>Laisser des objets familiers à l'extérieur :</b> Laissez un de ses objets familiers
                        (comme son panier, une couverture ou un jouet) dehors. L’odeur peut attirer votre animal si
                        celui-ci est dans les environs.</li>
                    <li><b>Essayez la nourriture ou l'odeur de votre propre parfum :</b> Si votre animal est
                        craintif, l'odeur familière de sa nourriture ou de vos affaires (vêtements, une vieille
                        paire de chaussures) peut l'attirer.</li>
                    <li><b>La recherche nocturne :</b> Les animaux perdus sont souvent plus actifs la nuit, alors
                        essayez de faire une recherche dans votre quartier à la tombée de la nuit ou à l’aube,
                        lorsque c'est plus calme.</li>
                </ul>
                <li class="listcat">Utiliser la technologie pour vous aider</li>
                <ul>
                    <li><b>Surveillez les alertes de microchip :</b> Si votre animal porte une puce électronique,
                        contactez l’organisation qui gère la base de données des puces pour signaler la perte.
                        Assurez-vous que vos informations de contact sont à jour.</li>
                    <li><b>Suivi GPS </b> Si votre animal a un collier avec un dispositif GPS, utilisez
                        l’application associée pour localiser son dernier emplacement connu.</li>
                    <li><b>Appel avec des sons familiers :</b> Enregistrez-vous en train d'appeler votre animal ou
                        en émettant des sons qu’il reconnaît (bruit de la porte d’entrée, son de ses croquettes,
                        etc.), et écoutez si vous entendez une réaction.</li>
                </ul>
                <li class="listcat">Maintenir l'espoir et la patience</li>
                <ul>
                    <li><b>Soyez patient :</b>Ne perdez pas espoir, surtout si la recherche prend du temps. Parfois,
                        les animaux peuvent se cacher pendant plusieurs jours avant de revenir à un endroit
                        familier.</li>
                    <li><b>Ne baissez pas les bras :</b> Continuez de diffuser les informations, de suivre les
                        pistes et de contacter les refuges même si vous ne trouvez pas votre animal immédiatement.
                    </li>
                </ul>
                <li class="listcat">Prévention à l'avenir</li>
                <ul>
                    <li><b>Assurez-vous que votre animal porte toujours une identification :</b> Un collier avec une
                        médaille et un microchip avec vos coordonnées sont des moyens efficaces de retrouver votre
                        animal en cas de perte.</li>
                    <li><b>Envisagez un suivi GPS :</b> Pour les animaux qui s’aventurent souvent dehors, un collier
                        GPS peut être un moyen de savoir où ils se trouvent en temps réel.</li>
                </ul>
            </ol>
            <p class="description">Ces étapes combinées augmenteront vos chances de retrouver votre animal
                rapidement. Restez
                persévérant et demandez l’aide de la communauté locale, car souvent, les voisins ou d'autres
                personnes peuvent avoir vu votre compagnon et vous aider dans la recherche.
            </p>
        </article>
        <img class="tabmediacut" id="imgright" src="assets/img/right_advice.jpeg" alt="Image de droite">
        </section>
        HTML;
        break;
    case 'faq':
        /* CONTENU DE LA PAGE FAQ */
        echo <<< 'HTML'
        <section class="presentation">
        <article class="article">
            <h1 class="articletitle">FAQ – Questions Fréquentes</h1>
            <div class="line"></div>
                <ol>
                <li><b>Comment signaler un animal disparu sur Pet Assist' ?</b></li>
                <p>Pour signaler un animal disparu, il vous suffit de vous inscrire sur le site et de créer une
                    annonce. Vous devrez fournir des informations détaillées : une description de l'animal, sa photo, le
                    dernier endroit où il a été vu, les personnes qui ont des informations peuvent vous contacter via
                    une messagerie interne.</p>
                <li><b>Est-ce que le service est gratuit ?</b></li>
                <p>Oui, l'ensemble du service de signalement est entièrement gratuit, sans frais cachés. Nous croyons
                    que la solidarité et l'entraide ne doivent pas avoir de prix, surtout lorsqu'il s'agit de retrouver
                    un compagnon perdu.</p>
                <li><b>Comment savoir si mon animal a été retrouvé ?</b></li>
                <p>Lorsque vous vous inscrivez sur le site, vous pouvez recevoir des alertes par e-mail ou
                    notifications (si vous avez activé cette option) chaque fois qu'un animal correspondant à votre
                    signalement est retrouvé. Vous pouvez aussi consulter régulièrement les annonces sur la plateforme
                    pour voir si quelqu'un a trouvé un animal similaire au vôtre.</p>
                <li><b>Puis-je modifier mon signalement si j'ai plus d'informations ?</b></li>
                <p>Oui, vous pouvez à tout moment revenir sur votre signalement pour y ajouter de nouvelles
                    informations ou modifier les détails de l'animal. Vous aurez un accès à votre compte pour gérer vos
                    annonces à tout moment.</p>
                <li><b>Comment signaler un animal retrouvé ?</b></li>
                <p>Si vous avez trouvé un animal que vous souhaitez signaler, vous pouvez créer une annonce dans la
                    section "J'ai trouvé un animal". Donnez une description précise de l'animal, idéalement accompagnée
                    d'une photo. Nous vous encourageons à inclure l'endroit où l'animal a été trouvé pour aider les
                    propriétaires à localiser leur compagnon.</p>
                <li><b>Que faire si quelqu'un pense avoir trouvé mon animal ?</b></li>
                <p>Si quelqu'un vous contacte pour vous signaler avoir trouvé votre animal, nous vous recommandons de
                    vérifier les détails pour confirmer qu'il s'agit bien de votre compagnon. Nous vous encourageons à
                    procéder avec prudence : assurez-vous de poser des questions spécifiques à la personne qui a trouvé
                    l'animal (par exemple, la couleur des yeux, une particularité de l'animal) pour vérifier qu'il
                    s'agit bien du vôtre avant de vous rencontrer.</p>
                <li><b>Mon animal a disparu depuis plusieurs jours, est-ce trop tard pour signaler sa disparition ?</b>
                </li>
                <p>Non, il n'est jamais trop tard pour signaler un animal disparu ! Même si plusieurs jours se sont
                    écoulés, il y a toujours une chance que quelqu'un ait vu ou trouvé votre compagnon. Chaque
                    signalement est utile et peut aider à élargir les recherches.</p>
                <li><b>Est-ce que je peux signaler un animal qui n'est pas à moi ?</b></li>
                <p>Oui, vous pouvez signaler un animal que vous avez trouvé ou aperçu, même s'il ne vous appartient
                    pas. Notre communauté de recherche est basée sur l’entraide, et chaque signalement peut être crucial
                    pour retrouver un animal perdu.</p>
                <li><b>Que faire si je reçois une alerte pour un animal qui ressemble au mien ?</b></li>
                <p>Si vous recevez une alerte pour un animal qui ressemble à votre compagnon, nous vous recommandons de
                    contacter immédiatement la personne qui a posté l’annonce via la messagerie que propose notre site
                    pour vérifier si c’est effectivement votre
                    animal. Assurez-vous de poser des questions pour confirmer l’identité de l’animal (par exemple, sa
                    taille, sa race, son comportement).</p>
                <li><b>Que faire si je suis sûr que l’animal trouvé ou retrouvé est le mien ?</b></li>
                <p>Si vous êtes sûr que l'animal retrouvé ou signalé correspond à votre compagnon, contactez
                    immédiatement la personne qui a posté l'annonce. Nous vous conseillons de vous organiser pour
                    vérifier l'identité de l'animal (rencontrer la personne en question, demander des preuves ou des
                    détails spécifiques sur l'animal, etc.) avant de procéder à la récupération.</p>
                <li><b>Pourquoi devrais-je partager une photo de mon animal ?</b></li>
                <p>Une photo est un moyen très efficace d’identifier un animal et d’aider les autres à le reconnaître.
                    Plus la description et les images fournies sont précises, plus il est facile pour les autres membres
                    de la communauté de repérer votre compagnon et de vous aider.</p>
                <li><b>Y a-t-il un moyen d'améliorer la visibilité de mon signalement ?</b></li>
                <p>Oui, vous pouvez partager votre annonce sur les réseaux sociaux ou demander à des amis de le faire
                    pour vous. Plus votre signalement est partagé, plus il y a de chances que quelqu'un voit votre
                    annonce et puisse vous aider.</p>
            </ol>
        </article>
        <img class="tabmediacut" src="assets/img/right_faq.jpeg" alt="Image de droite" id="imgright">
        </section>
        HTML;
        break;
    case 'rules':
        /* CONTENU DE LA PAGE REGLEMENT */
        echo <<< 'HTML'
        <section class="presentation">
            <article class="article">
                <h1 class="articletitle">Règlement de Pet Assist'</h1>
                <div class="line"></div>
                <p class="description">Le présent règlement a pour objectif de garantir le bon fonctionnement de Pet
                    Assist', d’assurer la sécurité des utilisateurs et de protéger les animaux. En utilisant le site,
                    vous acceptez les conditions suivantes.</p>
                <ol>
                    <li class="listcat">Utilisation du Site</li>
                    <p>Le site est mis à disposition pour faciliter le signalement d'animaux perdus ou retrouvés.
                        Il est destiné à toute personne souhaitant aider à retrouver un animal perdu ou à signaler
                        un animal retrouvé.</p>
                    <li class="listcat">Création d'un Compte</li>
                    <p>L'accès à certaines fonctionnalités du site, comme la publication de signalements, peut
                        nécessiter la création d'un compte utilisateur. Vous vous engagez à fournir des informations
                        exactes et à jour lors de la création de votre compte. Vous êtes responsable de la
                        confidentialité de vos identifiants et de toutes les activités effectuées sur votre compte.</p>
                    <li class="listcat">Responsabilité des Annonces</li>
                    <ul>
                        <li>Vous vous engagez à signaler uniquement des animaux réellement perdus ou retrouvés.</li>
                        <li>Les informations fournies dans les annonces doivent être véridiques, complètes et non
                            trompeuses. Vous êtes seul responsable du contenu de l’annonce que vous publiez. Toute
                            fausse déclaration peut entraîner la suppression de l’annonce et la suspension de votre
                            compte.</li>
                        <li>Il est interdit de publier des annonces pour des animaux en vente ou à adopter. Ce site est
                            uniquement dédié aux animaux perdus et retrouvés.</li>
                        <li>Les photos et descriptions doivent respecter la dignité des animaux. Toute image choquante
                            ou inappropriée sera retirée.</li>
                    </ul>
                    <li class="listcat">Respect de la Vie Privée</li>
                    <ul>
                        <li>Vous vous engagez à ne pas collecter, utiliser, ou diffuser les informations personnelles
                            d'autres utilisateurs sans leur consentement.</li>
                        <li>Le site respecte la réglementation en vigueur en matière de protection des données
                            personnelles. Nous nous engageons à ne pas partager vos informations sans votre
                            consentement, sauf si la loi l'exige.</li>
                    </ul>
                    <li class="listcat">Comportement des Utilisateurs</li>
                    <ul>
                        <li>Vous devez faire preuve de respect et de courtoisie envers les autres utilisateurs du site.
                            Aucun comportement menaçant, diffamatoire ou discriminatoire ne sera toléré.</li>
                        <li>Vous vous engagez à ne pas harceler ou déranger d'autres utilisateurs concernant des
                            annonces ou tout autre aspect du site.</li>
                        <li>Les utilisateurs ne doivent pas publier des informations diffamatoires ou fausses à propos
                            d'autres utilisateurs ou de leurs animaux.</li>
                    </ul>
                    <li class="listcat">Modération et Contrôle</li>
                    <p>Le site se réserve le droit de modérer ou de supprimer toute annonce qui ne respecte pas ce
                        règlement ou qui pourrait nuire à la sécurité, la confidentialité, ou la réputation de la
                        plateforme. En cas de violation grave, le compte de l’utilisateur peut être suspendu ou
                        supprimé.</p>
                    <li class="listcat">Exonération de Responsabilité</li>
                    <p>Le site ne peut être tenu responsable des informations publiées par les utilisateurs, ni
                        de l’exactitude des annonces. Il est de la responsabilité de l'utilisateur de vérifier
                        les informations fournies avant de prendre des actions, telles que contacter les
                        propriétaires d'animaux ou répondre à des annonces.</p>
                    <li class="listcat">Utilisation des Données</li>
                    <p>Les utilisateurs acceptent que certaines données relatives à leur activité sur le site
                        (telles que la date et l'heure de publication des annonces) puissent être collectées et
                        utilisées à des fins de modération, statistiques, et amélioration des services.</p>
                    <li class="listcat">Modifications du Règlement</li>
                    <p>Le site se réserve le droit de modifier ce règlement à tout moment. Les utilisateurs
                        seront informés des modifications via une notification sur la plateforme. En continuant
                        à utiliser le site après modification, vous acceptez le règlement mis à jour.</p>
                    <li class="listcat">Droits de Propriété Intellectuelle</li>
                    <p>Les contenus du site (textes, logos, images, etc.) sont protégés par des droits de
                        propriété intellectuelle. Toute reproduction ou exploitation non autorisée de ces
                        éléments est interdite.</p>
                </ol>
                <p class="description">En utilisant ce site, vous acceptez de respecter ces termes.</p>
            </article>
            <img class="tabmediacut" id="imgright" src="assets/img/right_rules.jpeg" alt="Image de droite">
        </section>
        HTML;
        break;
    case 'mentions':
        /* CONTENU DE LA PAGE MENTIONS LEGALES */
        echo <<< 'HTML'
        <section class="articlefixe">
            <h1 class="articletitle">Mentions légales</h1>
            <div class="line"></div>
            <article class="article-mentions-box">
                <div class="infos-right-box">
                    <ol class="infos-right text-list">
                        <h2>Informations éditeur:</h2>
                        <li>Le site Pet Assist’ est édité par:</li>
                        <li>Adresse:</li>
                        <li>Téléphone:</li>
                        <li>Email:</li>
                        <li>SIRET:</li>
                        <li>RCS:</li>
                    </ol>
                    <ol class="infos-right text-list">
                        <h2>Responsabilité:</h2>
                        <li>Le site est hébergé par:</li>
                        <li>Adresse:</li>
                        <li>Téléphone:</li>
                        <li>Site web:</li>
                    </ol>
                </div>
                <ol class="info-left-box text-list">
                    <li><b>Responsabilité:</b></li>
                    <p>Le site Pet Assist’ a pour objectif de permettre aux utilisateurs de signaler des animaux perdus.
                        Les informations publiées sur le site sont à la seule responsabilité de leurs auteurs.L'éditeur
                        du
                        site ne pourra être tenu responsable de tout dommage direct ou indirect résultant de
                        l'utilisation
                        du site, y compris en cas de signalement erroné ou de mauvaise utilisation des informations.</p>
                    <li><b>Propriété intellectuelle:</b></li>
                    <p>Tous les éléments présents sur le site (textes, images, logos, vidéos, etc.) sont protégés par le
                        droit d’auteur et par la législation sur la propriété intellectuelle. Toute reproduction ou
                        représentation, totale ou partielle, de ces éléments sans autorisation expresse de l'éditeur est
                        interdite.</p>
                    <li><b>Collecte et traitement des données personnelles:</b></li>
                    <p>Les données personnelles collectées sur le site Pet Assist’ (notamment via les formulaires de
                        signalement) sont traitées conformément à la réglementation sur la protection des données
                        personnelles (Règlement général sur la protection des données - RGPD).Responsable du traitement
                        des données : ****</p>
                </ol>
            </article>
            <article class="article-mentions-box">
                <ol class="text-list">
                    <li><b>Finalités de la collecte :</b></li>
                    <p>Gestion des signalements d'animaux perdus, amélioration du service, contact avec les utilisateurs
                        en cas de nécessité.Les données collectées sont uniquement utilisées à ces fins et ne seront pas
                        communiquées à des tiers sans le consentement préalable des utilisateurs, sauf en cas de demande
                        légale.</p>
                    <li><b>Droits des utilisateurs :</b></li>
                    <p>Conformément à la loi "Informatique et Libertés", les utilisateurs disposent d'un droit d'accès,
                        de rectification, de suppression, ainsi que du droit à la portabilité de leurs données. Ils
                        peuvent exercer ces droits en envoyant une demande par email à ****.</p>
                    <li><b>Liens hypertextes:</b></li>
                    <p>Le site Pet Assist’ peut contenir des liens vers d'autres sites web. Ces liens sont fournis à
                        titre de commodité et n'impliquent pas une approbation ou une responsabilité de l'éditeur du
                        site concernant leur contenu. L'éditeur ne pourra être tenu responsable des informations,
                        contenus, produits ou services proposés sur ces sites.</p>
                    <li><b>Modification des mentions légales:</b></li>
                    <p>L'éditeur se réserve le droit de modifier les présentes mentions légales à tout moment. Les
                        utilisateurs sont invités à consulter régulièrement cette page afin de prendre connaissance des
                        éventuelles modifications.</p>
                    <li><b>Loi applicable:</b></li>
                    <p>Les présentes mentions légales sont régies par la loi française. En cas de litige, les tribunaux
                        français seront seuls compétents.</p>
                </ol>
            </article>
        </section>
        HTML;
        break;
    default:
        /* PAGE ERROR 404 */
        echo <<< 'HTML'
        <section class="presentation">
        <article class="article">
            <h1 class="articletitle">ERREUR 404 - Aie aie aie ..</h1>
            <p class="description articletitle">On ne trouve pas cette page</p>
            <div class="line"></div>
        </article>
        </section>
        HTML;
        break;
}
?>