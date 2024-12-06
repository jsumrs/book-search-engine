<?php
session_start();
if (filter_input(INPUT_COOKIE, 'auth') != session_id()) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
$mysqli = new mysqli("localhost", "root", "", "zbooks");

if ($mysqli->connect_error) {
    die("Connection error: " . $mysqli->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="main.css">
<link rel="icon" type="image/x-icon" href="images/favicon.ico">
<title>My Library</title>
</head>

<body>
<?php include 'navbar.php'; ?>
    <h1 id="welcome-banner">Welcome to your library!</h1>
    <table id="library-table">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Title</th>
                <th>Author(s)</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "SELECT book_key FROM savedbooks WHERE u_id=?";
            $stmt = $mysqli->prepare($query);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $book_key = htmlspecialchars($row['book_key']);
                // Generate placeholder row with data-book-key for JS to populate.
                echo "<tr data-book-key=\"$book_key\">";
                echo "<td class='cover'>Loading...</td>";
                echo "<td class='title'>Loading...</td>";
                echo "<td class='author'>Loading...</td>";
                echo "</tr>";
            }

            $result->free();
            $stmt->close();
            $mysqli->close();
            ?>
        </tbody>
    </table>
    <script src="library.js"></script>
</body>

</html>