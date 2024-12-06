<?php

session_start();
if (!isset($_GET['key'])) {
    header("Location: index.php");
    exit();
}

if (!isset($_SESSION['username'])) {
    setcookie("not_logged_in", true, time() + 60 * 60);
    header("Location: book.php?key=" . $_GET['key']);
    exit();
}

$username = $_SESSION['username'];

// Database Portion
$user_id = $_SESSION['user_id'];
$key = $_GET['key'];

$mysqli = new mysqli("localhost", "root", "", "zbooks");
$stmt = $mysqli->stmt_init();
$stmt->prepare("SELECT book_key FROM savedbooks WHERE u_id=? AND book_key=?");
$stmt->bind_param("is", $user_id, $key);
$stmt->execute();
if ($stmt->get_result()->num_rows > 0) {
    header("Location: book.php?key=" . $_GET['key']);
    exit();
}
$stmt->prepare("INSERT INTO `savedbooks` (`u_id`,`book_key`) VALUES (?,?)");
$stmt->bind_param("ss", $user_id, $key);
$stmt->execute();
$stmt->close();


header("Location: book.php?key=" . $_GET['key']);
exit();
