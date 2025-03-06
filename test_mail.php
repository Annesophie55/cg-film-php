<?php
$to = "test@example.com";
$subject = "Test MailHog";
$message = "Ceci est un email de test envoyé depuis MailHog.";
$headers = "From: webmaster@localhost";

if (mail($to, $subject, $message, $headers)) {
    echo "Email envoyé avec succès !";
} else {
    echo "Échec de l'envoi.";
}
?>
