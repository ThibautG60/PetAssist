<?php
    require_once 'models/database_msg.php'; // Fonctions de gestions de la DB pour les messages

    if($_GET['p'] == 'creer_compte'){
        echo '<p>Vous n\'avez pas de messages.</p>';
    }
    else if($_GET['p'] == 'compte'){
        if(isset($_GET['c'])){
            $msgs = getAllMsgForUser($_SESSION["id_user"], $_GET['c']);
            include_once 'views/msg_dialog.php'; // Affichage de la boite de dialogue pour les messages
        }
        else{
            $contacts = getAllContactForUser($_SESSION["id_user"]);
            /* Génération de la liste des conversations */
            if($contacts != false){    
                echo '<div class="msg-button-group">';
                foreach($contacts as $contact){
                    if($_SESSION["id_user"] == $contact['id_user_1']){
                        if(isNewMessage($contact['id_user'], $_SESSION["id_user"]) != false){
                            echo '<a href="?p=compte&c='.$contact['id_user'].'" class="btn btn-secondary text-light msg-button" type="button">'.getUserImg($contact['id_user'])['pseudo'].'<span class="badge text-bg-success ms-2">Nouveau message</span></a>';
                        }
                        else{
                            echo '<a href="?p=compte&c='.$contact['id_user'].'" class="btn btn-secondary text-light msg-button" type="button">'.getUserImg($contact['id_user'])['pseudo'].'</a>';
                        }
                    }
                    else{
                        echo '<a href="?p=compte&c='.$contact['id_user_1'].'" class="btn btn-secondary text-light msg-button" type="button">'.getUserImg($contact['id_user_1'])['pseudo'].'</a>';
                    }
                }
                echo '</div>';
            }
            else echo '<p>Vous n\'avez pas de messages.</p>';
        }
    }
    else{
        $msgs = getAllMsgForUser($_SESSION["id_user"], $_SESSION["id_r"]);
        include_once 'views/msg_dialog.php'; // Affichage de la boite de dialogue pour les messages
    }
?>