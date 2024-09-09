<?php
    $page = isset($_GET['page']) ? $_GET['page'] : "home";
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">

        <title> <?php echo ucfirst($page); ?> | DigiDate</title>
        <link rel="stylesheet" href="css/output.css">
    </head>
    
    <body>
        <?php
        if (file_exists("includes/$page.inc.php")) {
            include "includes/$page.inc.php";
        } else {
            include "includes/404.inc.php";
        }
        ?>
    </body>
</html>