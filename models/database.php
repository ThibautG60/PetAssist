<?php
/* Model PHP pour toutes les fonctions en rapport avec la base de données en général, ce fichier est à la base de tous les models */ 

/**
 * Fonction se connecter à la base de données
 * @param string $role niveau d'accès à la base de données
 */
function connectToDB($role){
    try {
        $options = [PDO::ATTR_ERRMODE=> PDO::ERRMODE_EXCEPTION];
        $dsn = 'mysql:host=localhost; dbname=pet_assist; charset=utf8';

        if($role == "admin"){
            $dbh = new PDO($dsn, "admin", "path_a_1234/*", $options);// En tant qu'admin
        }
        else if($role == "user"){
            $dbh = new PDO($dsn, "user", "path_u_1234/*", $options);// En tant qu'user 'de base'
        }
        else{
            $dbh = new PDO($dsn, "reader", "path_r_1234/*", $options);// En tant que lecteur uniquement
        }
        return $dbh;
    } 
    catch (PDOException $ex) 
    {
        printf('La connexion à la base de données à échoué. CODE: %s', $ex -> getCode());
        die();
    }
}

/**
 * Fonction pour générer une notification visible sur l page 'account'
 * @param int $type type de notification (1:info  autre:success)
 * @param string $text texte de a notification
 * @param int $id_user id de l'utilisateur
 * @return bool retourne true si la notification est ajouté, sinon on retourne false
 */
function addNotif($type, $text, $id_user) {
    $date_time = date ("Y-m-d H:i:s");
    $db = connectToDB("user");
    $queryText = "INSERT INTO path_notifs (`notif_type`, `notif_text`, `date_time`, `id_user`) 
    VALUES (:notif_type, :notif_text, :date_time, :id_user)";
    try {
        // Utilisation de Bind Param pour des questions de sécurité (Injections)
        $query = $db -> prepare($queryText);
        $query -> bindParam(':notif_type', $type, PDO::PARAM_INT);
        $query -> bindParam(':notif_text', $text, PDO::PARAM_STR);
        $query -> bindParam(':date_time', $date_time, PDO::PARAM_STR);
        $query -> bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de l'enregistrement de la notif : " . $e->getMessage();
        return false;
    }
}

/**
 * Fonction pour récupérer les notifications visible sur l page 'account'
 * @param int $id_user id de l'utilisateur
 * @return bool|array retourne un tableau qui contient toutes les notifications de l'user sinon on retourne false
 */
function getUserNotifs($id_user) {
    $db = connectToDB("reader");
    $queryText = "SELECT * FROM path_notifs WHERE `id_user` = :id_user ORDER BY `date_time`";// On récupère toutes les notifs

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id_user);
        $query -> execute();
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération des données des notifications. CODE: " . $e->getMessage();
        return false;
    }
}
?>