<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
    <title>ADD book</title>
</head>

<body class="bg">
    <?php require "./header.php";  ?>
    <div class="con center">
        <form method="post">
            <?php
            if (!isset($_COOKIE["username"])) {
                # code...
                header("Location: ../template/acc/signup.php ");
            } else {
                require "../config/books.php";
                $db = new books("localhost", "mohammed", "m12345", "project");
                print_r(json_decode($_COOKIE["username"]));
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $db->addbook("book", [
                        "book_title" => filter_input(INPUT_POST, "book_title"),
                        "book_auther" => filter_input(INPUT_POST, "book_auther"),
                        "book_des" => filter_input(INPUT_POST, "book_des"),
                        "book_by" => $_COOKIE["username"]
                    ], "../index.php");
                    $db->ended();
                }
            ?>
                <h2>Login</h2>
                <label for="book">Add The Book Title</label>
                <br>
                <input type="text" required placeholder="Enter Your The Book Title" name="book_title">
                <br>
                <label for="book_auther">book auther</label>
                <br>
                <input type="text" required placeholder="Enter The Book Auther" name="book_auther">
                <br>
                <label for="pass">Enter The Book description</label>
                <br>
                <textarea name="book_des" required style=" height: 15vh;" placeholder="Enter The book description"></textarea>
                <br>
                <input type="submit" value="Submit">
        </form>
    </div>

<?php } ?>
</body>

</html>