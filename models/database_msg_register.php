<?php
/* Model PHP pour enregistrer uniquement dans la databse */ 
session_start();// On démarre une session pour récupérer l'id_user (Comme le fichier est appelé par un JS, la session du routeur n'est pas valide ici)

require_once 'database.php'; // Importation des fonctions de communication avec la BDD
require_once 'controllers/controller_regex.php'; // Importation des fonctions de vérification des formulaires

/* Si on retrouve le texte envoyé par le JS, on appel la fonction addMsgDb pour l'enregistrer dans la database */
if (isset($_POST['text'])){
    if(regexText($_POST['text'], 1) == true){
        addMsgDB($_SESSION["id_user"], htmlspecialchars($_POST['text']), $_SESSION["id_r"]);
    }
}

/* Fonction pour ajouter un message dans la database */ 
function addMsgDB($id_sender, $text, $id_receiver) {
    $date_time = date ("Y-m-d H:i:s"); // On récupère l'heure du message
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