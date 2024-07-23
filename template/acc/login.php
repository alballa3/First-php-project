<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/php/main/style/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="bg">
    <?php
    require "/xampp/htdocs/php/main/template/header.php";
    require "/xampp/htdocs/php/main/config/user.php";
    ?>
     <div class="con center">
        <form method="post">
            <h2>Login</h2>
            <label for="username">Enter Your Username:</label>
            <br>
            <input type="text" required placeholder="Enter Your user name" name="username">
            <br>
            <label for="email">Enter Your Email:</label>
            <br>
            <input type="email" required placeholder="Enter Your Email" name="email">
            <br>
            <label for="pass">Enter Your Password</label>
            <br>
            <input type="password" name="pass" required placeholder="Enter Your Password">
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $db->adduser("user", [
                    "username" => htmlspecialchars(filter_input(INPUT_POST, "username")),
                    "email" => htmlspecialchars(filter_input(INPUT_POST, "email")),
                    "passworld" => htmlspecialchars(filter_input(INPUT_POST, "pass")),
                    "age" => date_diff(date_create(filter_input(INPUT_POST, "time")), date_create())->y
                ], "/php/main/");
                $db->ended();
            }
            ?>
            <br>
            <input type="submit" value="Submit">
            <span>If You Didnt Have Account <a href="./signup.php" class="login">Signup</a></span>
        </form>
    </div>
</body>

</html>