<?php
session_start();
require 'bd.php';
$erreurStr = '';
$username = $_SESSION['username'] ;

    if($_SERVER['REQUEST_METHOD'] == "POST"){


        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pseudo = $_POST['pseudo'];
        $mdp = $_POST['mdp'];
        $email = $_POST['email'];
        Getpdo();
        AjouterUtilisateur($nom,$prenom,$pseudo,$mdp);
        EnvoyeEmail($email);
        
        echo "<span>Veillez confirmez votre email!</span>";
    }

    if($_SESSION['erreur'])
    {

        $erreurStr = "Erreur pseudonyme et mot de passe invalides! ";
    }

    //session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <div id="conteneur">
        <header class="center header"><h1>Connection</h1></header>
        <br><br>
        <section class="section">
            <div class="login">
                <br><br><br>
                <form action="index.php" method="POST" class="center">
                    <label for="1">Nom d'utilisateur : </label><input type="text" name="username" id="1" required><br><br>
                    <label for="2">Mot de Passe : </label><input type="password" name="mdp" id="2" required><br><br>

                    <button type="submit">Connection</button>
                </form>
                <br>
                <div class="center">
                    c'est votre première fois ? <br>
                    inscrivez-vous => <a href="inscrip.php">Inscription</a>
                </div>
            </div>
        </section>
        <br><br>
        <?php require "template/footer.php"; ?>
    </div>
</body> 
</html>
