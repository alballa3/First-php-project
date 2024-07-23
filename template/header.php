<header>
    <h1>Project</h1>
    <?php
    if (!isset($_COOKIE["username"])) :
    ?>
        <a href="template/acc/signup.php">Signup</a>
    <?php else : ?>
        <a href="template/adddata.php">Add Book</a>
    <?php endif; ?>
</header>