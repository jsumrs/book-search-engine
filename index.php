<?php
session_start();

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main.css">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<title>Home</title>
</head>

<body>
    <nav>
        <ul class="navbar">
            <li><a href="index.php">Home</a></li>
            <li><a href="browse.php">Browse</a></li>
            <li><a href="user_library.php">My Library</a></li>
            <?php 
            if (isset($username)) {
                echo "<li class='navbar-auth-buttons'><a href='user_library.php'>$username</a></li>";
            } else {
                echo "<li class='navbar-auth-buttons'><a href='login.php'>Login</a></li>";
                echo "<li><a href='register.php'>Register</a></li>";
            }
            ?>
            
        </ul>
    </nav>
</body>

</html>