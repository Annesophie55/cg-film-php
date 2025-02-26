<?php
require_once 'config/database.php';
header('Content-Type: application/json');

try {
    $query = "SELECT f.*, fv.embed_url, fv.video_id FROM films f 
              LEFT JOIN film_videos fv ON f.id = fv.film_id 
              WHERE fv.video_type = 'youtube'"; 

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($films);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur : " . $e->getMessage()]);
}
?>
