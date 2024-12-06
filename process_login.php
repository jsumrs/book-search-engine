<?php

$username = filter_input(INPUT_POST, "username");
$password = filter_input(INPUT_POST, "password");
if (!$username || !$password) {
    header("Location: login.php");
    exit();
}


$mysqli = new mysqli("localhost", "zbook_server", "gallstone ice sanded engross", "zbooks");
$stmt = $mysqli->stmt_init();
$stmt->prepare("SELECT id, username, password FROM users WHERE username=?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->bind_result($stored_id, $stored_username, $stored_password);
$stmt->fetch();

if (!$stored_password || !password_verify($password, $stored_password)) {
    setcookie("not_auth", "0", time() + 60 * 60 * 24);
    header("Location: login.php");
    exit();
}

if (session_status() === PHP_SESSION_NONE) session_start();
setcookie("auth", session_id(), time() + 60 * 60 * 24);
$_SESSION['user_id'] = $stored_id;
$_SESSION['username'] = $stored_username;
header("Location: index.php");
exit();
