<?php
    if($_GET['p'] == 'compte' && isset($_GET['c'])){
        $_SESSION["id_r"] = $_GET['c'];
        msgIsRead($_SESSION["id_r"], $_SESSION["id_user"]);
        echo '<dialog class="msg-box" id="msg-dial" aria-details="openNow">';
    }
    else{
        echo '<dialog class="msg-box" id="msg-dial" aria-details="openLater">';
    }
?>
    <button type="button" class="btn-close" id="close-msg-button"></button>
    <div class="msg-back">
        <div class="msg-text-2">Début de la conversation</div>
        <?php
        /* Génération de la conversation */
        if($msgs != false){    
            $me = getUserImg($_SESSION["id_user"])['pseudo'];
            $him = getUserImg($_SESSION["id_r"])['pseudo'];

            foreach($msgs as $msg){
                if($msg['id_user'] == $_SESSION["id_user"]){ // Si j'ai envoyé le message
                    echo '<div class="msg-text-1"><b>'.$msg['date_time'].'</b> ['.$me.']:</b> '.$msg['msg'].'</div>';
                }
                else if($msg['id_user_1'] == $_SESSION["id_user"]){ // Si j'ai reçu le message
                    echo '<div class="msg-text-2"><b>'.$msg['date_time'].' ['.$him.']:</b> '.$msg['msg'].'</div>';
                }
            }
        }
        ?>
        <form id="formMsg">
            <label class="text-light" for="msg-input">Ecrivez votre message:</label>
            <textarea id="msg-input" name="msg-input" rows="4" cols="50" required></textarea>
            <br>
            <input class="btn btn-primary" type="submit" value="Envoyer le message">
        </form>
    </div>
</dialog>