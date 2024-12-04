<?php
session_start();

$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");

if ($username && $password) {
    $mysqli = new mysqli("localhost", "root", "", "zbooks");
    $stmt = $mysqli->stmt_init();

    // Check if user_name is taken
    $stmt->prepare("SELECT username FROM users WHERE username=?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $results = $stmt->get_result();
    if ($results->num_rows > 0) {
        // Logic for handling duplicate name
        $_SESSION["name_taken"] = true;
        header("Location: register.php");
        exit();
    } else {
        $stmt->prepare("INSERT INTO `users` (`username`, `password`) VALUES (?,?)");

        $password = password_hash($password, PASSWORD_BCRYPT);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->close();
        header("Location: login.php");
        exit();
    }
} else {
    header("Location: register.php");
    exit();
}
