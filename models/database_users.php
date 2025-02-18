<?php
/* Fonction pour créer un nouvel utilisateur */ 
function registerUser($firstname, $lastname, $pseudo, $email, $pass, $adress, $city, $postal_code, $img, $imgTmp) {
    $db = connectToDB("user");
    $queryText = "INSERT INTO path_users (`firstname`, `lastname`, `pseudo`, `mail`, `password`, `img_profil`, `adress`, `city`, `postal_code`) 
    VALUES (:firstname, :lastname, :pseudo, :email, :pass, :img_profil, :adress, :city, :postal_code)";
    try {
        $fileName = $pseudo .'.'. $img['extension'];
        move_uploaded_file($imgTmp, "assets/img/profil/" . $fileName);

        $hash = password_hash($pass, PASSWORD_DEFAULT);
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
?>