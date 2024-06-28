<?php

session_start();

require_once "../functions.php";

if(htmlspecialchars(trim($_POST["username"])) !== "" && htmlspecialchars(trim($_POST["email"])) !== "" && htmlspecialchars(trim($_POST["password"])) !== "" && htmlspecialchars(trim($_POST["passwordVerify"])) !== "") {
    if(htmlspecialchars(trim($_POST["passwordVerify"])) == htmlspecialchars(trim($_POST["password"]))) {
        if(filter_var(htmlspecialchars(trim($_POST["email"])), FILTER_VALIDATE_EMAIL)) {
            createUser(htmlspecialchars(trim($_POST["username"])), htmlspecialchars(trim($_POST["email"])), htmlspecialchars(trim($_POST["password"])));
            header("Location: ./login_form.php");
        } else {
            header("Location: ./register_form.php?error=Mauvais format d'e-mail.");
        }
    } else {
        header("Location: ./register_form.php?error=Les mots de passe ne sont pas identiques.");
    }
} else {
    header("Location: ./register_form.php?error=Veuillez remplir tout les champs.");
}