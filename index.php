<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="/php/main/style/index.css" type="text/css">
</head>

<body class="bg">
    <?php require "template/header.php"; ?>
    <section class="center grid-3">
        <?php
        require "config/books.php";
        foreach ($db->getalldata() as $key => $value) :
        ?>
            <div class="main">
                <h3><?php echo  $value["book_title"]  ?></h3>
                <p>The Auther Is <span><?php echo $value["book_auther"]; ?></span></p>
                <p class="des"><?php echo $value["book_des"] ?></p>
                <a href="template/books.php?id=<?php echo $value["book_id"] ?>">More Info</a>
            </div>
        <?php endforeach; ?>
    </section>
</body>

</html>