<?php
session_start();

require_once 'database.php'; // Importation des fonctions de communication avec la BDD

if (isset($_POST['text'])){
    addMsgDB($_SESSION["id_user"], htmlspecialchars($_POST['text']), $_SESSION["id_r"]);
}

/* Fonction pour ajouter un message */ 
function addMsgDB($id_sender, $text, $id_receiver) {
    $date_time = date ("Y-m-d H:i:s");
    $db = connectToDB("user");
    $queryText = "INSERT INTO path_msg (`date_time`, `msg`, `id_user`, `id_user_1`) 
    VALUES (:date_time, :msg, :id_user, :id_user_1)";
    try {
        // Utilisation de Bind Param pour des questions de sécurité (Injections)
        $query = $db -> prepare($queryText);
        $query -> bindParam(':date_time', $date_time, PDO::PARAM_STR);
        $query -> bindParam(':msg', $text, PDO::PARAM_STR);
        $query -> bindParam(':id_user', $id_sender, PDO::PARAM_INT);
        $query -> bindParam(':id_user_1', $id_receiver, PDO::PARAM_INT);
        $query -> execute();
        return true;
    } catch(PDOException $e) {
        echo "Erreur lors de l'enregistrement du message: " . $e->getMessage();
        return false;
    }
}
?>