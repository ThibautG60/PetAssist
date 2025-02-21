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

/* Fonction pour déconnecter un utilisateur */ 
function disconnectUser() {
    setcookie("connected", 'false', -1); // On créé un cookie avec un timer négatif pour supprimer le cookie
    setcookie("id_user", 'false', -1); // On créé un cookie avec un timer négatif pour supprimer le cookie
    $_SESSION["connected"] = 'false'; // On passe la variable SESSION connected à false pour infiquer que l'user n'est plus connecté
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

/* Fonction pour vérifier si l'utilisateur est connecté */ 
function userConnected() {
    if((isset($_SESSION["connected"]) && $_SESSION["connected"] == 'true') || (isset($_COOKIE["connected"]) && $_COOKIE["connected"] == 'true')){
        return true;
    }
    else{
        return false;
    }
}

/* Fonction pour récupérer le pseudo et l'image de la personne */
function getUserImg($id_user){
    $db = connectToDB("reader");
    $queryText = "SELECT `pseudo`, `img_profil` FROM path_users WHERE `id_user` = :id_user";

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
?>