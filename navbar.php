<?php
session_start();
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>
<nav>
    <ul class="navbar">
        <li><a id="navbar-logo-anchor" href="index.php"><img class="navbar-logo" src="images/android-chrome-512x512.png" alt="Company Logo: an open book"></a></li>
        <li><a href="index.php">Home</a></li>
        <li>Browse</li>
        <li class="navbar-search-box">
            <input id="searchbar" type="text" placeholder="Search books..." />
        </li>
        <?php
        if (isset($username)) {
            echo "<li><a href='user_library.php'>My Library</a></li>";
        } else {
            echo "<li><a href='login.php'>Login</a></li>";
            echo "<li><a href='register.php'>Register</a></li>";
        }
        ?>
    </ul>
</nav>