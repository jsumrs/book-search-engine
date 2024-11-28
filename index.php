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
            <li><a id="navbar-logo-anchor" href="index.php"><img class="navbar-logo" src="images/android-chrome-512x512.png" alt="Company Logo: an open book"></a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="browse.php">Browse</a></li>
            <li class="navbar-search-box">
                <input id="searchbar" type="text" placeholder="Search books..." />
            </li>
            <?php 
            if (isset($username)) {
                echo "<li><a href='user_library.php'>My Library</a></li>";
            } else {
                echo "<li ><a href='login.php'>Login</a></li>";
                echo "<li><a href='register.php'>Register</a></li>";
            }
            ?>
            
        </ul>
    </nav>
    <table id="search_output"></table>
    <script src="main.js"></script>
</body>

</html>