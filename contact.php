<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["name"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP de Free
        $mail->isSMTP();
        $mail->Host = 'smtp.free.fr';  // Serveur SMTP de Free
        $mail->SMTPAuth = false;       // Free n’a pas besoin d’authentification
        $mail->Port = 25;              // Port SMTP de Free

        // Destinataire
        $mail->setFrom($email, $nom);
        $mail->addAddress('secondechancepc@free.fr'); // Remplace par ton adresse Free

        // Contenu du mail
        $mail->isHTML(true);
        $mail->Subject = 'Nouveau message depuis Second Chance PC';
        $mail->Body = "<b>Nom:</b> $nom <br><b>Email:</b> $email <br><b>Message:</b><br>$message";

        $mail->send();
        echo "Message envoyé avec succès.";
    } catch (Exception $e) {
        echo "Erreur lors de l'envoi du message: {$mail->ErrorInfo}";
    }
}
?>
