<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
} 
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];
}
?>
<nav>
    <ul class="navbar">
        <li><a id="navbar-logo-anchor" href="index.php"><img class="navbar-logo" src="images/android-chrome-512x512.png" alt="Company Logo: an open book"></a></li>
        <li><a href="index.php">Home</a></li>
        <li>
            <form action="search.php" method="GET">
                <input id="navbar-search-box" name="search_query" type="text" placeholder="Search books..." />
            </form>
        </li>
        <?php
        if (isset($username)) {
            echo "<li style='margin-left: auto'><a href='user_library.php'>My Library</a></li>";
            echo "<li><a href='logout.php'>Logout</a></li>";
        } else {
            echo "<li style='margin-left: auto'><a href='login.php'>Login</a></li>";
            echo "<li ><a href='register.php'>Register</a></li>";
        }
        ?>
        
    </ul>
</nav>
<script src="search.js"></script>