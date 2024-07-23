<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/php/main/style/index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>

<body class="bg">
    <?php

    require "../../template/header.php";
    // require "/xampp/htdocs/php/main/config/user.php";
    require "../../config/user.php";
    $adddata = new newacount('localhost', "mohammed", "m12345", "project");
    if (!isset($_COOKIE["data"])) :
    ?>
        <div class="con center">
            <form method="post">
                <h2>New Acoount </h2>
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
                <br>
                <label for="time">Enter The Brith Date</label>
                <br>
                <input type="datetime-local" name="time">
                <br>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $db->adduser("user", [
                        "username" => htmlspecialchars(filter_input(INPUT_POST, "username")),
                        "email" => htmlspecialchars(filter_input(INPUT_POST, "email")),
                        "passworld" => htmlspecialchars(filter_input(INPUT_POST, "pass")),
                        "age" => date_diff(date_create(filter_input(INPUT_POST, "time")), date_create())->y
                    ], "../../index.php");
                    $db->ended();
                }



                ?>
                <input type="submit" value="Submit">
                <span>Or Do You Accully Have Account <a href="./login.php" class="login">Login </a></span>
            </form>
        </div>

    <?php else :
        echo "YOUR ON THE WRONG PAGE";
        // header("Location: ../../index.php");
    ?>


    <?php endif; ?>
</body>

</html>