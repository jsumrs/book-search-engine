<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if(isset($_GET['key'])){
    $key = htmlspecialchars($_GET['key']);
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main.css">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<title id="title"></title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="book-container">
        <!-- Left Section -->
        <div class="cover-section">
            <img id="book-cover" src="" alt="Cover unavailable."></img>
            <form action="save_book.php" method="GET">
                <input type="hidden" name="key" value="<?php echo $key ?>">
                <button type="submit" class="bookmark-btn">Save to library</button>
            </form>
        </div>

        <!-- Right Section -->
        <div class="info-section">
            <h1 id="book-title">Sample Title</h1>
            <h2 id="book-authors">Sample Author</h2>
            <p id="book-description">Sample Paragraph</p>
        </div>
    </div>


    <script src="book.js"></script>
    <script>
        <?php 
        if($_COOKIE['not_logged_in']) {
            echo "alert('You are not logged in!')";
            unset($_COOKIE['not_logged_in']);
            setcookie("not_logged_in", "", 1);
        }
        ?>
    </script>
</body>

</html>