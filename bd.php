<?php

$pdo = null;

function Getpdo(){
    if (!empty($GLOBALS["pdo"])){
        return $GLOBALS["pdo"];
    }
    else{
        $host = '127.0.0.1'; 
        $db = 'dataLogin'; 
        $user = 'root';
        $pass = 'web';
        $charset = 'utf8';

        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];


        try {
            $pdo = new PDO($dsn, $user, $pass, $options);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
            echo 'Connexion échoué';
        }

        $GLOBALS['pdo'] =  $pdo;

        return $pdo;
        
    }
}

function AjouterUtilisateur($nom, $prenom, $pseudonyme, $mdp)
{
    $pdo = getPdo();
    try {
        $sql = "INSERT INTO Login (nom, prenom, pseudonyme, mdp) VALUES (?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom, $prenom, $pseudonyme, $mdp]);
        echo "tu est un genie! ";
    } catch (Exception $e) {
        //throw new \Exception($e->getMessage(), (int)$e->getCode());
        echo 'POURRI! MARCHE PAS!';
    }
}
function VérifierLogin()
{

}

function EnvoyeEmail($email)
{

    // entêtes (il y en a d'autres et tous ne sont pas obligatoires)
    $destinataire = $email; //$_POST['destinataire'];
    $sujet        = "Mon site Confirmation email "; //$_POST['sujet'];
    $message      = "http://144.217.82.25/kesava/ProjetFinal/login.php" . "  <<<<<< Lien retour vers la page de connection!"; //$_POST['message'];
    $entetes      = "From: keke\r\n" .
                    "Reply-To: keke\r\n" .
                    "Return-Path: <keke_023@hotmail.com>\r\n" .
                    "Content-Type: text/plain; charset=utf-8\r\n" .
                    "X-Mailer: PHP/'" . phpversion();

    // la fonction "mail" retourne un booléen
    $code = mail($destinataire, $sujet, $message, $entetes);

    // la valeur TRUE ne garantit pas la livraison à 100%
    if (!$code) {
        echo "<h3 style='color:red'>Le message n'a pas été envoyé</h3>";
    } else {
        echo "<h3 style='color:green'>Le message a été envoyé avec succès</h3>";
    }
}


//$stmt = $GLOBALS['pdo']->query('SELECT id, nom, prenom, pseudonyme, mdp FROM Login');
