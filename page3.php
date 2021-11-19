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
    <title>Gollum</title>
</head>
<body>
    <div id="conteneurcon">
        <?php require "template/header.php" ?>
        <?php require "template/nav.php" ?>
        <section class="center section">
            <h1>Gollum</h1><br><br><br>
            <?php require "ASCII/Gollum.php";?>> 
        </section>
        <?php require "template/footer.php" ?>
    </div>
</body>
</html>