<?php

function DBConnect() {
    return new PDO("mysql:host=localhost;dbname=birthday_manager;charset=utf8", "publicuser", "root");
}

function createUser($username, $email, $password) {
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if(isset($_SESSION["user"])) {
        $sessionId = $_SESSION["user"]["id"];
        $stmt = DBConnect()->prepare("INSERT INTO users(`username`, `email`, `password`, `status` `created_by`) VALUES (?, ?, ?, ?, $sessionId)");
    } else {
        $stmt = DBConnect()->prepare("INSERT INTO users(`username`, `email`, `password`, `status`) VALUES (?, ?, ?, ?)");
    }

    $stmt->execute([$username, $email, $password_hash, "N"]);
}

function connectUser($email, $password) {
    
    $stmt = DBConnect()->prepare("SELECT * FROM users WHERE `email` = ?");
    
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    $password_verify = password_verify($password, $user["password"]);

    if($password_verify == 1) {
        session_start();
        $_SESSION["user"] = $user;
    } else {
        header("Location: ./login_form.php?error=Email ou mot de passe incorrect");
    }
}

// Fonctions anniversaires

function createBirthday($name, $date) {
    
    $stmt = DBConnect()->prepare("INSERT INTO birthdays (`name`, `date`, `user_id`, `status`, `created_by`) VALUES(?, ?, ?, ?, ?)");

    $stmt->execute([$name, $date, $_SESSION["user"]["id"], "N", $_SESSION["user"]["id"]]);
}

function selectBirthday($user_id) {

    $stmt = DBConnect()->prepare("SELECT birthdays.id AS 'id', name AS 'name', DATE_FORMAT(date, '%d-%m-%Y') AS 'date', 'user_id' AS 'user_id' FROM birthdays INNER JOIN users ON users.id = birthdays.user_id WHERE birthdays.user_id = ? AND birthdays.is_active = 1 AND birthdays.is_deleted = 0 ORDER BY date DESC");

    $stmt->execute([$user_id]);

    $birthday = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $birthday;
}

function selectSpecificBirthday($id) {

    $stmt = DBConnect()->prepare("SELECT birthdays.id AS 'id', name AS 'name', date AS 'date', user_id AS 'user_id' FROM birthdays INNER JOIN users ON users.id = birthdays.user_id WHERE birthdays.id = ? AND birthdays.is_active = 1 AND birthdays.is_deleted = 0 ");

    $stmt->execute([$id]);

    $birthday = $stmt->fetch(PDO::FETCH_ASSOC);

    return $birthday;
}

function updateBirthday($name, $date, $id) {
    $stmt = DBConnect()->prepare("UPDATE birthdays SET `name` = ?, `date` = ?, status = 'U', `updated_by` = ?, `updated_at` = ? WHERE id = ?");

    $stmt->execute([$name, $date, $_SESSION["user"]["id"], date("Y-m-d H:i:s"), $id]);
}

function deleteBirthday($id) {
    $stmt = DBConnect()->prepare("UPDATE birthdays SET `status` = 'D', `is_active` = 0, `is_deleted` = 1 WHERE id = ?");

    $stmt->execute([$id]);
}

?>