<?php

session_start();

if(!isset($_SESSION["user"])) {
    header("Location: ../index.php?error=Connexion échouée ou non-établie");
}

require_once '../functions.php';

if(htmlspecialchars(trim($_POST["name"])) !== "" && htmlspecialchars(trim($_POST["date"])) !== "") {
    createBirthday(htmlspecialchars(trim($_POST["name"])), htmlspecialchars(trim($_POST["date"])));
    header("Location: ./birthdays.php");
} else {
    if(isset($_GET["id"])) {
        header("Location: ./birthday_form.php?error=Veuillez remplir tout les champs.&id=" . $_GET["id"]);
    } else {
        header("Location: ./birthday_form.php?error=Veuillez remplir tout les champs.");
    }
}