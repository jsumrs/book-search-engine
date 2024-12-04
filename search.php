<?php
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
    <?php include 'navbar.php'; ?> <!-- This should be kept at the top of <body> -->
    <table id="search-output">
        
    <?php if (!empty($_GET['search_query'])) {
        $search_query = htmlspecialchars($_GET['search_query']);
        echo "<script type='text/javascript'> fireFetch('{$search_query}') </script>";
    } else {
        echo "<h1 id='welcome-banner'>Search to get started~!</h1>";
    }
    ?>
    </table>
</body>

</html>