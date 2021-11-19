<?php
require 'bd.php';
$pdo = Getpdo();
session_start();

$username = "";

if (!(empty($_POST['username']))) {
    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $username = $_POST['username'];

        $mdp = $_POST['mdp'];

        $sql = "SELECT pseudonyme, mdp FROM Login WHERE pseudonyme=? and mdp=?";

        $stmt = $pdo->prepare($sql);

        $stmt->execute([$username, $mdp]);

        $row = $stmt->fetch(PDO::FETCH_BOTH);

        if (($_POST['username'] == $row['pseudonyme']) && ($_POST['mdp'] == $row['mdp'])) {

            $_SESSION['username'] = $username;

            $_SESSION['mdp'] = $_POST['mdp'];
        } else {
            $_SESSION['erreur'] = true;
            header('Location:login.php');
        }
    } else {
        header('Location:login.php');
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <div id="conteneurcon">
        <?php require "header.php"; ?> 
        <?php require "nav.php"; ?> 
        <section class="center section">
            <h1>The Lord Of The Rings</h1><br><br><br>
            <?php require "ASCII/LOTR.php"; ?>
            <!-- <div class="meme">
                        ⢸⠉⠉⠉⠉⠉⠉⠉⠉⠉⠉⠉⠉⠉⠉⡷⡄⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                ⢸⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀ ⡇⠢⣀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                ⢸⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⡇⠀⠈⠑⢦⡀⠀⠀⠀⠀⠀Are you wasting my money again, son?
                ⢸⠀⠀⠀⠀⢀⠖⠒⠒⠒⢤⠀⠀⠀⠀⠀⡇⠀ ⠀⠀⠀⠀⠙⢦⡀⠀⠀⠀⠀
                ⢸⠀⠀⣀⢤⣼⣀⡠⠤⠤⠼⠤⡄⠀⠀⡇⠀⠀ ⠀⠀⠀⠀⠀⠙⢄⠀⠀⠀⠀
                ⢸⠀⠀⠑⡤⠤⡒⠒⠒⡊⠙⡏⠀⢀⠀⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠑⠢⡄⠀
                ⢸⠀⠀⠀⠇⠀⣀⣀⣀⣀⢀⠧⠟⠁⠀⡇⠀⠀⠀⠀⠀⠀⠀ ⠀⠀⠀⠀⡇⠀
                ⢸⠀⠀⠀⠸⣀⠀⠀⠈⢉⠟⠓⠀⠀⠀⠀⡇⠀⠀⠀⠀⠀⠀⠀ ⠀⠀⠀⢸
                ⢸⠀⠀⠀⠀⠈⢱⡖⠋⠁⠀⠀⠀⠀⠀⠀⡇⠀⠀⠀⠀⠀⠀⠀ ⠀⠀⠀⢸
                ⢸⠀⠀⠀⠀⣠⢺⠧⢄⣀⠀⠀⣀⣀⠀⠀⡇⠀⠀⠀⠀⠀⠀ ⠀⠀⠀⠀⢸
                ⢸⠀⠀⠀⣠⠃⢸⠀⠀⠈⠉⡽⠿⠯⡆⠀⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸
                ⢸⠀⠀⣰⠁⠀⢸⠀⠀⠀⠀⠉⠉⠉⠀⠀⡇⠀⠀⠀⠀⠀⠀ ⠀⠀⠀⠀⢸
                ⢸⠀⠀⠣⠀⠀⢸⢄⠀⠀⠀⠀⠀⠀⠀⠀⠀⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸
                ⢸⠀⠀⠀⠀⠀⢸⠀⢇⠀⠀⠀⠀⠀⠀⠀⠀⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸
                ⢸⠀⠀⠀⠀⠀⡌⠀⠈⡆⠀⠀⠀⠀⠀⠀⠀⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸
                ⢸⠀⠀⠀⠀⢠⠃⠀⠀⡇⠀⠀⠀⠀⠀⠀⠀⡇⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸
                ⢸⠀⠀⠀⠀⢸⠀⠀⠀⠁⠀⠀⠀⠀⠀⠀⠀⠷⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⢸
            </div>      -->
        </section>
        <?php require "footer.php"; ?> 
    </div>
</body>
</html>