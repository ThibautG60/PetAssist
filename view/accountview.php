<head>
    <link rel="stylesheet" href="assets/css/accountstyle.css">
    <link rel="stylesheet" href="assets/css/adminstyle.css">
    <link rel="stylesheet" href="assets/css/list.css">
    <link rel="stylesheet" href="assets/css/msg.css">
    <script defer src="assets/js/msg.js"></script>
    <script defer src="assets/js/admin.js"></script>
    <title>Pet Assist' - Compte de Marie</title>
</head>

<section class="body-box">
    <div class="body-head-box">
        <div class="f100 only-tabphone icon-admin-box">
            <h1 class="articletitle">Marie</h1>
        </div>
        <div class="f100 tabmediacut icon-admin-box">
            <h1 class="articletitle">Les signalements de Marie</h1>
        </div>
        <div class="linec"></div>
        <div class="description f100">Voici tous les signalements de Marie. Vous pouvez retrouver tout ses avis
            de
            recherche, ses signalements et vous pouvez également la contacter.</div>
    </div>
    <div class="info-profil-img">
        <img src="assets/img/profil/profpic2.jfif" alt="Photo de profil" id="profil-pic">
        <button class="btn btn-primary msg-button">Envoyer
            un message</button>
    </div>
    <div class="body-info-box">
        <h2 class="articletitle only-tabphone f100">Les signalements de Marie</h2>
        <div class="linec only-tabphone"></div>
        <div class="list">
        <?php
            //- Génération de la liste
            $file = 'assets/data/data.json';
            
            if (file_exists($file)) {
                $jsonData = json_decode(file_get_contents($file), true);
                
                $i = 0;//A enlever lors du passage en BDD

                foreach($jsonData['petlist'] as $data){
                    if($i < 2){//A enlever lors du passage en BDD
                        if($data['signalType'] == 'found'){
                            echo '<div class="card-pet box-found">';
                        } else {
                            echo '<div class="card-pet box-lost">';
                        }
                            echo '<a href="petprofil.php" title="Voir le signalement en détail"><img src="assets/img/pet/' . $data['petImg'] . '" alt="Photo de l\'animal" class="img-pet"></a>';
                            echo '<div class="card-body">';
                                echo '<p class="card-title">' . $data['petName'] . '</p>';
                                if($data['signalType'] == 'found'){
                                    echo '<div class="line-found"></div>';
                                } else {
                                    echo '<div class="line-lost"></div>';
                                }
                                echo '<p class="card-text">Espèce: ' . $data['petSpicies'] . '<br>Race: ' . $data['petRace'] . '<br>Lieu: ' . $data['petAdress'] . '<br>Date: ' . $data['petDate'] . '</p>';
                            echo '</div>';
                        echo '</div>';
                    }
                    else {//A enlever lors du passage en BDD
                        break;//A enlever lors du passage en BDD
                    }
                    $i++;//A enlever lors du passage en BDD
                }
            }
            else {
                echo '<p class="description">Aucun résultat trouvé</p>';
            }
            ?>
        </div>
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
    <dialog class="fmodify-box" id="fmodify-dial">
        <button type="button" class="btn-close" id="close-fmodify-button"></button>
        <div class="fmodify-back">
            <h3>Modifier les informations</h3>
            <form id="formModify" action="">
                <div class="row form-group mt-2">
                    <label for="pseudo">Pseudonyme:</label>
                    <input type="text" class="form-control" id="pseudo"
                        required pattern="^[A-Za-z0-9]{2,}$"
                        minlength="2" title="Le pseudonyme ne peut contenir que des lettres et des chiffres">
                </div>
                <div class="row form-group col-lg-6">
                    <label for="profil-Pic" class="form-label">Modifiez la photo:</label>
                    <input class="form-control" type="file" id="profil-Pic" required>
                </div>
                <input class="btn btn-success mt-3" type="submit" value="Modifier les informations">
            </form>
        </div>
    </dialog>
</section>
