<?php

session_start();

if(!isset($_SESSION["user"])) {
    header("Location: ../index.php?error=Connexion échouée ou non-établie");
}

require_once '../functions.php';

$birthday = selectSpecificBirthday($_GET["id"]);

if($_SESSION["user"]["id"] == $birthday["user_id"]) {
    deleteBirthday($_GET["id"]);
}

header("Location: ./birthdays.php");