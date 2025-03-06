<?php
/* Model PHP pour toutes les fonctions qui concernent les messages entre users (Hors le register dans la database) */

/**
 * Fonction pour récuperer tous les messages pour un user
 * @param int $id ID de l'user qui envoit
 * @param int $id_1 ID de l'user qui reçoit
 * @return bool|array tous les messages 
 */
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

/**
 * Fonction pour récuperer tous les contacts d'un user
 * @param int $id ID de l'user
 * @return bool|array tous les contacts
 */
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

/**
 * Fonction pour savoir si il y l'user a un nouveau message
 * @param int $id ID de l'user qui envoit
 * @param int $id_1 ID de l'user qui reçoit
 * @return bool|array champ view (1 signifie que le message a été vu)
 */
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

/**
 * Fonction pour changer la valeur de view dans la database (View est pour notifier que le messge a été lu)
 * @param int $id ID de l'user qui envoit
 * @param int $id_1 ID de l'user qui reçoit
 * @return bool true: Si le changement a bien été effectué sinon false
 */
function msgIsRead($id, $id_1){
    $db = connectToDB("user");
    $queryText = "UPDATE `path_msg` SET `view` = 1 WHERE `id_user` = :id_user  AND `id_user_1` = :id_user_1 AND `view` = 0";

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id);
        $query -> bindValue(':id_user_1', $id_1);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors du changement de statut 'un message CODE: " . $e->getMessage();
        return false;
    }
}
?>