<?php
/*
// tout ce qui regarde les "namespace" et l'auto-chargement des classes sera abordé plus tard
use \PHPMailer\PHPMailer\PHPMailer;
use \PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

// création d'une instance
$mail = new PHPMailer(TRUE);

try {
   // origine
   $mail->setFrom('keke_023@hotmmail.com', 'Petit salope qui suce pas');

   // destination
   $mail->addAddress('raph_hockey@hotmail.com', 'Razoph');

   // sujet
   $mail->Subject = 'ACHETE DE LA CRYPTO!';

   // le message comme tel
   $mail->Body = 'WAGMI!!!!!!WAGMI!!!!!WAGMI!!!!!!';

   // important pour les caractères accentués
   $mail->CharSet = 'UTF-8';
   
   // envoi du courriel
   $mail->send();

   echo "Reussie";

} catch (Exception $e) {
   echo $e->errorMessage();
} catch (\Exception $e) {
   echo $e->getMessage();
}
*/
?>
<?php
// on est arrivé ici via un formulaire


// entêtes (il y en a d'autres et tous ne sont pas obligatoires)
$destinataire = "raph_hockey@hotmail.com"; //$_POST['destinataire'];
$sujet        = "ACHETE DE LA CRYPTO!";//$_POST['sujet'];
$message      = "WAGMI!!!!!!WAGMI!!!!!WAGMI!!!!!!";//$_POST['message'];
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

?>