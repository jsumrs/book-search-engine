<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$key = $_GET['key'];
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
            <img id="book-cover" src="" alt="The book's cover"></img>
            <button class="bookmark-btn">Save to library</button>
        </div>

        <!-- Right Section -->
        <div class="info-section">
            <h1 id="book-title">Sample Title</h1>
            <h2 id="book-authors">Sample Author</h2>
            <p id="book-description">Sample Paragraph</p>
        </div>
    </div>

    <script src="book.js"></script>
</body>

</html>