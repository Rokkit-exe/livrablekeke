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
<div id="conteneurcon">
    <header class="header greeting">
        <a href="index.php" class="homebutton">
            <img class="homeimage" src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ficon-library.com%2Fimages%2Fhome-logo-icon%2Fhome-logo-icon-16.jpg&f=1&nofb=1" alt="Home">
        </a>
        <span>
            <h1 class="titre">Bienvenue ! </h1>
        </span>
        <span class="titre"> <?php echo $_SESSION['username'] ?> </span>

         <a href="login.php" class="logoutbutton">
            <img class="logoutimage" src="https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fcdn.onlinewebfonts.com%2Fsvg%2Fimg_376344.png&f=1&nofb=1" alt="Logout">
        </a>
    </header> <!-- ajouter le nom du user -->
    <nav class="nav">
        <div class="dnav">
            <table class="navtable">
                <thead>
                    <tr>
                        <th>
                            <h1>Navigation</h1>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><a href="page1.php">
                                <h2>page 1</h2>
                            </a></td>
                    </tr>
                    <tr>
                        <td><a href="page2.php">
                                <h2>page 2</h2>
                            </a></td>
                    </tr>
                    <tr>
                        <td><a href="page3.php">
                                <h2>page 3</h2>
                            </a></td>
                    </tr>
                </tbody>

            </table>
        </div>

    </nav>
    <section class="section">
       
       <div class="meme">
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
</div>
       
    </section>
    <footer class="footer">
        <table id="footertable">
            <tr>
                <th>Contributors</th>
                <th>Contact</th>
                <th>License</th>
            </tr>
            <tr>
                <td>Kesava</td>
                <td>kesava@prog.com</td>
                <td>license 234567</td>
            </tr>
            <tr>
                <td>Francis</td>
                <td>francis@prog.com</td>
            </tr>
        </table>
    </footer>
</div>
</body>


</html>