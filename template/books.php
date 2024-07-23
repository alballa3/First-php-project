    <?php
    $db = mysqli_connect("localhost", "mohammed", "m12345", "project");
    $sql = "SELECT * FROM `book` WHERE `book_id`= " . $_GET['id'];
    $data = mysqli_query($db, $sql);
    $main = mysqli_fetch_assoc($data);
    require "header.php";
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <link rel="stylesheet" href="../style/index.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php
                echo $main["book_title"];
                ?></title>
    </head>

    <body class="bg">
        <div>
            <h3><?php echo $main["book_title"]; ?></h3>
            <p>The Auther <span><?php echo $main["book_auther"]; ?></span></p>
        </div>
    </body>

    </html>