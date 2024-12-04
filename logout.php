<?php
session_start();
if (filter_input(INPUT_COOKIE, 'auth') == session_id()) {
    unset($_COOKIE['auth']);
    setcookie("auth", "", time() + 1);
    session_unset();
    session_destroy();
}

header("Location: login.php");
exit();
