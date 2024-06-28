<?php

session_start();

if(!isset($_SESSION["user"])) {
    header("Location: ./login.php?error=Connection non-établie.");
} else {
    session_destroy();
    header("Location: ../index.php");
}
