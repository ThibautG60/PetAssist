<?php
/* Vérification de la conformité du mot de passe */
function regexPassword($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $content) == 1)return true;
        else return false;
        //?=.*: Vérifie si les caractères sont présent quelque part dans le password
        //\d: 0-9
    }
}
/* Vérification de la conformité des noms */
function regexName($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^[A-Za-z]{2,}$/", $content) == 1)return true;
        else return false;
    }
}
/* Vérification de la conformité du pseudo */
function regexPseudo($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^[A-Za-z0-9]{2,}$/", $content) == 1)return true;
        else return false;
    }
}
/* Vérification de la conformité du mail */
function regexMail($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^[a-z0-9\._\%\+\-]+@[a-z0-9\.\-]+\.[a-z]{2,}$/", $content) == 1)return true;
        else return false;
    }
}
/* Vérification de la conformité de l'adresse */
function regexAdress($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^\d+[A-Za-zÀ-ÿ0-9\s'\-\.]+$/", $content) == 1)return true;
        else return false;
    }
}
/* Vérification de la conformité d'une adresse au format long */
function regexLongAdress($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^(?=.*\d{5})([A-Za-zÀ-ÿ0-9\s'\-\.]+(?:\s*\d{5}\s*)?[A-Za-zÀ-ÿ0-9\s'\-\.]+)*$/", $content) == 1)return true;
        else return false;
    }
}
/* Vérification de la conformité du code postal */
function regexPostalCode($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^[0-9]{5,}$/", $content) == 1)return true;
        else return false;
    }
}
/* Vérification de la conformité de la taille */
function regexWaist($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^[A-Za-z0-9]{1,}$/", $content) == 1)return true;
        else return false;
    }
}
/* Vérification de la conformité de l'âge */
function regexAge($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^[0-9]{1,}$/", $content) == 1)return true;
        else return false;
    }
}
/* Vérification du numéro de puce */
function regexPuce($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^[0-9]{15,}$/", $content) == 1)return true;
        else return false;
    }
}
/* Vérification d'un long texte (espaces autorisés) */
function regexText($content, $required = 0){
    if($required == 0 && $content == "")return true;
    else{
        if(preg_match("/^[A-Za-z0-9\s]{2,}$/", $content) == 1)return true;
        else return false;
    }
}
/* Fonction pour vérifier l'extension du fichier transmis */
function imgSecure($img, $imgSize){
    $extension = $img['extension'];
    if(($extension == 'JPG' || $extension == 'JPEG' || $extension == 'PNG' || $extension == 'jpg' || $extension == 'jpeg' || $extension == 'png') && $imgSize <= 56000000){
        return true;
    }
    else{
        return false;
    }
}
?>