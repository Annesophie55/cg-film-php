<?php
// Autorise les requêtes depuis http://localhost:3000
header("Access-Control-Allow-Origin: http://localhost:3000");
// Autorise d'autres méthodes si besoin (GET, OPTIONS, etc.)
header("Access-Control-Allow-Methods: POST, OPTIONS");
// Autorise les en-têtes envoyés (dont Content-Type)
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");

ini_set('SMTP', 'localhost');
ini_set('smtp_port', '1025');


// Gérer la requête OPTIONS (preflight) si le navigateur en fait une :
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    // On arrête le script pour la requête OPTIONS
    exit(0);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));
    $recaptchaResponse = $_POST["recaptchaResponse"] ?? '';

    if (!$name || !$email || !$subject || !$message) {
        echo json_encode(["status" => "error", "message" => "Tous les champs sont obligatoires."]);
        exit;
    }

    // reCAPTCHA v3 standard : Vérification
    $recaptchaSecret = "6LfsPusqAAAAAA1rL7cGVD-XyO4GBfa_q8-39bVX";
    $verifyUrl = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptchaSecret}&response={$recaptchaResponse}";
    $recaptchaVerify = file_get_contents($verifyUrl);
    $recaptchaData = json_decode($recaptchaVerify);

    if (!$recaptchaData->success) {
        echo json_encode(["status" => "error", "message" => "Échec du reCAPTCHA."]);
        exit;
    }

    // Ici, tu peux éventuellement lire le score v3
    // $score = $recaptchaData->score;
    // $action = $recaptchaData->action;
    // if ($score < 0.5) { ... } // exemple

    // Envoi de l’email
    $to = "cgfilm@cg-film.com";
    $headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=UTF-8\r\n";
    $body = "Nom: $name\nEmail: $email\nSujet: $subject\nMessage:\n$message";

    if (mail($to, $subject, $body, $headers)) {
        echo json_encode(["status" => "success", "message" => "Votre message a été envoyé."]);
    } else {
        echo json_encode(["status" => "error", "message" => "Échec de l'envoi du message."]);
    }
}
?>
