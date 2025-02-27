<?php
require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

// Définir le chemin de base pour les images
$baseImageUrl = "http://localhost/cg-film-new/server/images";

try {
    $stmt = $pdo->query("SELECT * FROM partners");
    $partners = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($partners as &$partner) {
        // Si le chemin de l’image commence par "/", on évite de doubler les "/"
        $cleanedPath = ltrim($partner['logo'], '/');
        $partner['logo'] = "$baseImageUrl/$cleanedPath";
    }

    echo json_encode($partners);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur : " . $e->getMessage()]);
}
?>