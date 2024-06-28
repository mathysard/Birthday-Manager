<?php

require_once '../functions.php';

if(htmlspecialchars(trim($_POST["email"])) !== "" && htmlspecialchars(trim($_POST["password"])) !== "") {
    connectUser(htmlspecialchars(trim($_POST["email"])), htmlspecialchars(trim($_POST["password"])));
    header("Location: ../birthdays/birthdays.php");
} else {
    header("Location: ./login_form.php?error=Veuillez remplir tout les champs.");
}