<?php
/* Fonction pour générer une notification en bas à droite de l'écran */
function notifGenerator($type, $title, $msg){
    // Changement du background en fonction du type de notif
    if($type == 'error')$type = 'bg-danger';
    else if($type == 'success')$type = 'bg-success';
    else $type = 'bg-info';

    // Génération du code HTML pour la notif
    echo <<< HTML
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="notification" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
    HTML;
    echo '<div class="toast-header text-light '.$type.'">';
    echo <<< HTML
                <strong class="me-auto">$title</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">$msg</div>
        </div>
    </div>
    HTML;
}
?>