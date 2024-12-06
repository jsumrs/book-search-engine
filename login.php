<?php if (session_status() === PHP_SESSION_NONE){session_start();} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <link rel="icon" type="image/x-icon" href="images/favicon.ico">
    <title>Login</title>
</head>

<body>
    <?php include 'navbar.php'; ?>
    <div class="account-form">
        <form action="process_login.php" method="post">
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
                        if (isset($_COOKIE["not_auth"])) {
                            echo "Username/Password Incorrect!";
                            setcookie("not_auth", "", time() + 1);
                        }
                        ?>
                    </td>
                    <td><button name="submit">Login</button></td>
                </tr>
            </table>
            <a id="link" href="register.php">Don't have an account?</a>
        </form>
    </div>
</body>

</html>