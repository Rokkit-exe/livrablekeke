<?php
    require 'bd.php';
    $pdo = Getpdo();
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Gandalf</title>
</head>
<body>
    <div id="conteneurcon">
        <?php require "header.php" ?>
        <?php require "nav.php" ?>
        <section class="center section">
            <h1>Gandalf</h1><br><br><br>
            <?php require "ASCII/Gandalf.php";?>> 
        </section>
        <?php require "footer.php" ?>
    </div>
</body>
</html>