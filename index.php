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

    <!-- Importation des fichiers CSS -->
    <link rel="stylesheet" href="assets/css/stylebase.css">
    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <!-- Importation des fichiers JS pour bootstrap & animations -->
    <script src="assets/js/bootstrap.bundle.js"></script>
    <script defer src="assets/js/animations.js"></script>

    <?php 
    //-- On initialise la variable page courante --
    if(isset($_GET['page'])){
        $currentPage = $_GET['page'];
    }
    else {
        $currentPage = 'acceuil';
    }

    //-- Importations des fichiers PHP indispensables -->
    require_once 'controller/init_template.php';
    ?>
</head>

<body>
    <?php include_once 'view/header.php' ?>
    
    <main>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="paw">
            <path
                d="M226.5 92.9c14.3 42.9-.3 86.2-32.6 96.8s-70.1-15.6-84.4-58.5s.3-86.2 32.6-96.8s70.1 15.6 84.4 58.5zM100.4 198.6c18.9 32.4 14.3 70.1-10.2 84.1s-59.7-.9-78.5-33.3S-2.7 179.3 21.8 165.3s59.7 .9 78.5 33.3zM69.2 401.2C121.6 259.9 214.7 224 256 224s134.4 35.9 186.8 177.2c3.6 9.7 5.2 20.1 5.2 30.5l0 1.6c0 25.8-20.9 46.7-46.7 46.7c-11.5 0-22.9-1.4-34-4.2l-88-22c-15.3-3.8-31.3-3.8-46.6 0l-88 22c-11.1 2.8-22.5 4.2-34 4.2C84.9 480 64 459.1 64 433.3l0-1.6c0-10.4 1.6-20.8 5.2-30.5zM421.8 282.7c-24.5-14-29.1-51.7-10.2-84.1s54-47.3 78.5-33.3s29.1 51.7 10.2 84.1s-54 47.3-78.5 33.3zM310.1 189.7c-32.3-10.6-46.9-53.9-32.6-96.8s52.1-69.1 84.4-58.5s46.9 53.9 32.6 96.8s-52.1 69.1-84.4 58.5z" />
        </svg>
        <?php
            //-- On sélectionne le contenu à afficher en enfonction de la variable page
            switch($currentPage){
                /* Controller */
                case 'acceuil';
                    include_once 'controller/acceuil_controller.php';//- Importation du controller de la page d'acceuil
                    break;
                case 'lost';
                    include_once 'controller/pet_form_controller.php';//- Importation du controller des formulaires pour les animaux
                    break;
                case 'found';
                    include_once 'controller/pet_form_controller.php';//- Importation du controller des formulaires pour les animaux
                    break;
                case 'profil';
                    include_once 'controller/pet_form_controller.php';//- Importation du controller pour les animaux
                    break;
                case 'login';
                    include_once 'controller/user_form_controller.php';//- Importation du controller des formulaires pour les users
                    break;
                case 'create';
                    include_once 'controller/user_form_controller.php';//- Importation du controller des formulaires pour les users
                    break;
                case 'user';
                    include_once 'controller/user_form_controller.php';//- Importation du controller pour les users
                    break;
                case 'amodify';
                    include_once 'controller/user_form_controller.php';//- Importation du controller des formulaires pour les users
                    break;
                case 'vuser';
                    include_once 'controller/user_form_controller.php';//- Importation du controller pour les users
                    break;
                case 'plost';
                    include_once 'controller/user_form_controller.php';//- Importation du controller pour les users
                    break;
                case 'list';
                    include_once 'controller/pet_list_controller.php';//- Importation du controller de la liste des animaux perdus ou trouvés
                    break;
                case 'map';
                    include_once 'controller/map_controller.php';//- Importation du controller de la carte interactive
                    break;
                case 'book';
                    include_once 'controller/goldenbook_controller.php';//- Importation du controller des témoignages
                    break;
                /* View directement */
                case 'advice':
                    include_once 'view/static.php';//- Importation du contenu conseils
                    break;
                case 'faq':
                    include_once 'view/static.php';//- Importation du contenu foire aux questions
                    break;
                case 'rules':
                    include_once 'view/static.php';//- Importation du contenu règlement
                    break;
                case 'mentions':
                    include_once 'view/static.php';//- Importation du contenu de la page des mentions légales
                    break;
                /* Error 404 */
                default:
                    include_once 'view/static.php';//- Importation du contenu page 404
                    break;
            }
        ?>
    </main>

    <?php include_once 'view/footer.php' ?>
</body>

</html>