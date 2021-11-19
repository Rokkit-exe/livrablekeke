<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    <div id="conteneur">
        <header class="center header">
            <h1>Inscription</h1>
        </header>
        <section class="section">
            <div class="inscription">
                <br><br>
                <form class="center" action="login.php" method="POST">
                    <table class="centertable">
                        <tr>
                            <td><label for="1">Nom</label></td>
                            <td><input type="text" name="nom" id="1" size="50" required></td>
                        </tr>
                        <tr>
                            <td><label for="2">Prenom</label></td>
                            <td><input type="text" name="prenom" id="2" size="50" required><br></td>
                        </tr>
                        <tr>
                            <td><label for="3">Pseudo</label> </td>
                            <td><input type="text" name="pseudo" id="3" size="50" required></td>
                        </tr>
                        <tr>
                            <td><label for="4">Mot de passe</label></td>
                            <td><input type="password" name="mdp" id="4" size="50" required></td>
                        </tr>
                        <tr>
                            <td><label for="5">Courriel</label></td>
                            <td><input type="email" name="email" id="5" size="50" required></td>
                        </tr>
                    </table>
                    <br>
                    <input type="submit" value="Envoyer">
                </form>

                <form class="center" action="login.php"><input type="submit" value="Retour"></form>

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