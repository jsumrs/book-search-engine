<?php
$search_query = htmlspecialchars($_GET['search_query']);
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
    <table id="search-output"></table>
    <?php if (!empty($search_query)) {
        echo "<script type='text/javascript'> fireFetch('{$search_query}') </script>";
    }
    ?>
</body>

</html>