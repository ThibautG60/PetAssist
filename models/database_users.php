<?php
/* Fonction pour créer un nouvel utilisateur */ 
function registerUser($firstname, $lastname, $pseudo, $email, $pass, $adress, $city, $postal_code, $img, $imgTmp) {
    $db = connectToDB("user");
    $queryText = "INSERT INTO path_users (`firstname`, `lastname`, `pseudo`, `mail`, `password`, `img_profil`, `adress`, `city`, `postal_code`) 
    VALUES (:firstname, :lastname, :pseudo, :email, :pass, :img_profil, :adress, :city, :postal_code)";
    try {
        $fileName = $pseudo .'.'. $img['extension'];
        move_uploaded_file($imgTmp, "assets/img/profil/" . $fileName);

        // Utilisation de Bind Param pour des questions de sécurité (Injections)
        $hash = hash_hmac('sha256', $pass, 'path');
        $query = $db -> prepare($queryText);
        $query -> bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $query -> bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query -> bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $query -> bindParam(':email', $email, PDO::PARAM_STR);
        $query -> bindParam(':pass', $hash, PDO::PARAM_STR);
        $query -> bindParam(':img_profil', $fileName, PDO::PARAM_STR);
        $query -> bindParam(':adress', $adress, PDO::PARAM_STR);
        $query -> bindParam(':city', $city, PDO::PARAM_STR);
        $query -> bindParam(':postal_code', $postal_code, PDO::PARAM_INT);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de la création de l'utilisateur : " . $e->getMessage();
        return false;
    }
}

/* Fonction pour connecter un utilisateur */ 
function loginUser($mail) {
    $db = connectToDB("reader");
    $queryText = "SELECT * FROM path_users WHERE `mail` = :mail";

    try {
        $query = $db -> prepare($queryText);
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        $infoAccount = $query -> fetch(PDO::FETCH_ASSOC);
        return $infoAccount;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération de l'utilisateur : " . $e->getMessage();
        return false;
    }
}

/* Fonction pour savoir si l'user est admin ou non */ 
function getAdminLvl($id) {
    $db = connectToDB("reader");
    $queryText = "SELECT `admin_type` FROM path_users WHERE `id_user` = :id_user";

    try {
        $query = $db -> prepare($queryText);
        $query->bindParam(':id_user', $id, PDO::PARAM_INT);
        $query->execute();
        $infoAccount = $query -> fetch(PDO::FETCH_ASSOC);
        return $infoAccount;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération du niveau admin de l'user: " . $e->getMessage();
        return false;
    }
}

/* Fonction pour récupérer l'id d'un utlisateur un utilisateur */ 
function getUserId($mail) {
    $db = connectToDB("reader");
    $queryText = "SELECT `id_user` FROM path_users WHERE `mail` = :mail";

    try {
        $query = $db -> prepare($queryText);
        $query->bindParam(':mail', $mail, PDO::PARAM_STR);
        $query->execute();
        $infoAccount = $query -> fetch(PDO::FETCH_ASSOC);
        return $infoAccount;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération de l'id de l'user : " . $e->getMessage();
        return false;
    }
}

/* Récupération de toutes les infos sur l'utilisateur */
function getUserInfo($id){
    $db = connectToDB("reader");
    $queryText = "SELECT * FROM path_users WHERE `id_user` = :id_user";// On récupère toutes les informations

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id);
        $query -> execute();
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        return $result;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération des données d'un utilisateur. CODE: " . $e->getMessage();
        return false;
    }
}

/* Fonction pour vérifier si l'utilisateur est connecté */ 
function userConnected() {
    if((isset($_SESSION["connected"]) && $_SESSION["connected"] == 'true') || (isset($_COOKIE["connected"]) && $_COOKIE["connected"] == 'true')){
        if(!isset($_SESSION["id_user"])){
            $_SESSION["id_user"] = getUserId($_COOKIE["mail"])["id_user"];
        }
        if(userBanned($_SESSION["id_user"])['banned'] != 0){
            disconnectUser();
            return false;
        }
        return true;
    }
    else{
        return false;
    }
}

/* Fonction pour déconnecter un utilisateur */ 
function disconnectUser() {
    setcookie("connected", 'false', -1); // On créé un cookie avec un timer négatif pour supprimer le cookie
    setcookie("mail", 'false', -1); // On créé un cookie avec un timer négatif pour supprimer le cookie
    $_SESSION["connected"] = 'false'; // On passe la variable SESSION connected à false pour infiquer que l'user n'est plus connecté
    $_SESSION["id_user"] = 'false'; // On passe la variable SESSION connected à false pour infiquer que l'user n'est plus connecté
    return true;
}

/* Fonction pour vérifier le mot de passe d'un utilisateur */ 
function passVerify($mail, $pass) {
    $db = connectToDB("reader");
    $queryText = "SELECT `password` FROM path_users WHERE `mail` = :mail";

    try {
        $query = $db -> prepare($queryText);
        $query -> bindParam(':mail', $mail, PDO::PARAM_STR);
        $query -> execute();
        $resultPass = $query -> fetch(PDO::FETCH_ASSOC);

        //On vérifie que les mots de passes correspondent (Les deux sont hachés)
        if($resultPass['password'] === $pass)return true;
        else return false;
    } catch(PDOException $e) {
        echo "Erreur lors de la vérification du mot de passe: " . $e->getMessage();
        return false;
    }
}

/* Fonction pour récupérer le pseudo et l'image de la personne */
function getUserImg($id_user){
    $db = connectToDB("reader");
    $queryText = "SELECT `id_user`, `pseudo`, `img_profil` FROM path_users WHERE `id_user` = :id_user";

    try {
        $query = $db -> prepare($queryText);
        $query->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $query->execute();
        $infoAccount = $query -> fetch(PDO::FETCH_ASSOC);
        return $infoAccount;
    } catch(PDOException $e) {
        echo "Erreur lors de la récupération de l'image de l'utilisateur : " . $e->getMessage();
        return false;
    }
}

/* Fonction pour savoir si un user est banni ou non */
function userBanned($id_user){
    $db = connectToDB("reader");
    $queryText = "SELECT `banned` FROM path_users WHERE `id_user` = :id_user";

    try {
        $query = $db -> prepare($queryText);
        $query->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $query->execute();
        $infoAccount = $query -> fetch(PDO::FETCH_ASSOC);
        return $infoAccount;
    } catch(PDOException $e) {
        echo "Erreur lors de la fonction pour savoir si l'user est banni : " . $e->getMessage();
        return false;
    }
}

/* Suppression d'un profil user */
function deleteUserProfil($id_user){
    $db = connectToDB("user");
    $queryText = "UPDATE `path_users` SET `banned` = 1 WHERE `id_user` = :id_user";

    try {
        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id_user);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de la suppression d'un profil user. CODE: " . $e->getMessage();
        return false;
    }
}

/* Modification d'un profil User par un admin. Fonction moins complète que ModifyUserProfilByUser */
function ModifyUserProfil($id_user, $pseudo, $img, $imgTmp){
    $db = connectToDB("user");
    if($img == 0)$queryText = "UPDATE `path_users` SET `pseudo` = :pseudo WHERE `id_user` = :id_user";
    else $queryText = "UPDATE `path_users` SET `pseudo` = :pseudo, `img_profil` = :img_profil WHERE `id_user` = :id_user";

    try {
        if($img != 0){
            /* Suppression de l'ancien fichier */
            $oldImg = getUserImg($id_user)['img_profil'];
            if(file_exists("assets/img/profil/" . $oldImg)) unlink("assets/img/profil/" . $oldImg);
            /* Génération du nouveau fichier */
            $fileName = $pseudo .'.'. $img['extension'];
            move_uploaded_file($imgTmp, "assets/img/profil/" . $fileName);
        }

        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id_user);
        $query -> bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        if($img != 0)$query -> bindParam(':img_profil', $fileName, PDO::PARAM_STR);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de la modification d'un profil user. CODE: " . $e->getMessage();
        return false;
    }
}

/* Modification d'un profil User depuis ' modifier mon compte '. Fonction plus complète que ModifyUserProfil */
function ModifyUserProfilByUser($id_user, $firstname, $lastname, $pseudo, $mail, $pass, $img, $imgTmp, $adress, $city, $postal_code){
    $db = connectToDB("user");
    if($img == 0){ // Si l'user n'a pas UP d'img
        if($pass == 0)$queryText = "UPDATE `path_users` SET `firstname` = :firstname, `lastname` = :lastname, `pseudo` = :pseudo, `mail` = :mail, `adress` = :adress, `city` = :city, `postal_code` = :postal_code WHERE `id_user` = :id_user"; // Sans password
        else $queryText = "UPDATE `path_users` SET `firstname` = :firstname, `lastname` = :lastname, `pseudo` = :pseudo, `mail` = :mail, `password` = :pass, `adress` = :adress, `city` = :city, `postal_code` = :postal_code WHERE `id_user` = :id_user"; // Avec password
    }
    else{ // Si l'user a UP une img
        if($pass == 0) $queryText = "UPDATE `path_users` SET `firstname` = :firstname, `lastname` = :lastname, `pseudo` = :pseudo, `mail` = :mail, `img_profil` = :img_profil, `adress` = :adress, `city` = :city, `postal_code` = :postal_code WHERE `id_user` = :id_user"; // Sans password
        else $queryText = "UPDATE `path_users` SET `firstname` = :firstname, `lastname` = :lastname, `pseudo` = :pseudo, `mail` = :mail, `password` = :pass, `img_profil` = :img_profil, `adress` = :adress, `city` = :city, `postal_code` = :postal_code WHERE `id_user` = :id_user"; // Avec password
    }

    try {
        if($img != 0){
            /* Suppression de l'ancien fichier */
            $oldImg = getUserImg($id_user)['img_profil'];
            if(file_exists("assets/img/profil/" . $oldImg)) unlink("assets/img/profil/" . $oldImg);
            /* Génération du nouveau fichier */
            $fileName = $pseudo .'.'. $img['extension'];
            move_uploaded_file($imgTmp, "assets/img/profil/" . $fileName);
        }
        if($pass != 0)$hash = hash_hmac('sha256', $pass, 'path');

        $query = $db -> prepare($queryText);
        $query -> bindValue(':id_user', $id_user);
        $query -> bindParam(':firstname', $firstname, PDO::PARAM_STR);
        $query -> bindParam(':lastname', $lastname, PDO::PARAM_STR);
        $query -> bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $query -> bindParam(':mail', $mail, PDO::PARAM_STR);
        if($pass != 0)$query -> bindParam(':pass', $hash, PDO::PARAM_STR);
        if($img != 0)$query -> bindParam(':img_profil', $fileName, PDO::PARAM_STR);
        $query -> bindParam(':adress', $adress, PDO::PARAM_STR);
        $query -> bindParam(':city', $city, PDO::PARAM_STR);
        $query -> bindParam(':postal_code', $postal_code, PDO::PARAM_INT);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de la modification d'un profil user. CODE: " . $e->getMessage();
        return false;
    }
}
?>