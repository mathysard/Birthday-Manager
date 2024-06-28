<?php

session_start();

if(!isset($_SESSION["user"])) {
    header("Location: ../index.php?error=Connexion échouée ou non-établie");
}

require_once '../functions.php';

if(isset($_GET["id"])) {
    $birthday = selectSpecificBirthday($_GET["id"]);
    
    if(isset($_SESSION["user"])) {
        if($_SESSION["user"]["id"] == $birthday["user_id"]) {
            updateBirthday(htmlspecialchars(trim($_POST["name"])), htmlspecialchars(trim($_POST["date"])), $_GET["id"]);
            header("Location: ./birthdays.php");
        } else {
            // var_dump($birthday);
            header("Location: ./birthdays.php?error=Vous n'avez pas les permissions acquises");
        }
    } else {
        header("Location: ./birthdays.php?error=Vous n'avez pas les permissions acquises");
    }
} else {
    header("Location: ./birthdays.php?error=Il n'y a aucun identifiant");
}