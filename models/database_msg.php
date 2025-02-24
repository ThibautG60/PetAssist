<?php
/* Récupération de tous les messages pour un user */
function getAllMsgForUser($id, $id_1){
    $db = connectToDB("reader");
    $queryText = "SELECT * FROM path_msg WHERE `id_user` = :id_user AND `id_user_1` = :id_user_1 OR `id_user` = :id_user_1 AND `id_user_1` = :id_user ORDER BY `date_time`";// On récupère toutes les informations

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id);
        $query -> bindValue(':id_user_1', $id_1);
        $query -> execute();
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération des données des messages. CODE: " . $e->getMessage();
        return false;
    }
}

/* Récupération de tous les contacts d'un user */
function getAllContactForUser($id){
    $db = connectToDB("reader");
    $queryText = "SELECT `id_user`, `id_user_1`, `view` FROM path_msg WHERE `id_user` = :id_user OR `id_user_1` = :id_user GROUP BY `id_user`";// On récupère tous les contacts

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id);
        $query -> bindValue(':id_user_1', $id);
        $query -> execute();
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération des données des contacts CODE: " . $e->getMessage();
        return false;
    }
}

/* Fonction pour savoir si l'user a un nouveau méssage */
function isNewMessage($id, $id_1){
    $db = connectToDB("reader");
    $queryText = "SELECT `view` FROM path_msg WHERE `id_user` = :id_user  AND `id_user_1` = :id_user_1 AND `view` = 0";

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id);
        $query -> bindValue(':id_user_1', $id_1);
        $query -> execute();
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération des données des contacts CODE: " . $e->getMessage();
        return false;
    }
}

/* Fonction pour notifier que le méssage a été lu */
function msgIsRead($id, $id_1){
    $db = connectToDB("user");
    $queryText = "UPDATE `path_msg` SET `view` = 1 WHERE `id_user` = :id_user  AND `id_user_1` = :id_user_1 AND `view` = 0";

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id);
        $query -> bindValue(':id_user_1', $id_1);
        $result = $query -> execute();
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors du changement de statut 'un message CODE: " . $e->getMessage();
        return false;
    }
}
?>