<?php if (session_status() === PHP_SESSION_NONE){session_start();} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>Register</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="account-form">
    <form action="process_register.php" method="post">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password: </td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td id="invalid-input">
                    <?php
                    if (isset($_SESSION['name_taken'])) {
                        echo "That username is taken!";
                        unset($_SESSION['name_taken']);
                    }
                    ?>
                </td>
                <td>
                    <button name="submit">Register</button>
                </td>
            </tr>
        </table>
        <a id="link" href="login.php">Go back to login page</a>
    </form>
    </div>
</body>

</html>