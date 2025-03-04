<?php
require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

try {
    $query = "SELECT f.id, f.title, f.subtitle, f.release_date, f.description, 
                     f.synopsis, f.slug, fv.embed_url, fv.video_id
              FROM films f 
              LEFT JOIN film_videos fv ON f.id = fv.film_id 
              WHERE fv.video_type = 'youtube'"; 

    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Organiser les films avec leurs vidéos associées
    $films = [];
    foreach ($rows as $row) {
        $filmId = $row['id'];

        if (!isset($films[$filmId])) {
            $films[$filmId] = [
                "id" => $filmId,
                "title" => $row['title'],
                "subtitle" => $row['subtitle'],
                "release_date" => $row['release_date'],
                "description" => $row['description'],
                "synopsis" => $row['synopsis'],
                "slug" => $row['slug'],
                "videos" => []
            ];
        }

        if (!empty($row['embed_url'])) {
            $films[$filmId]['videos'][] = [
                "embed_url" => $row['embed_url'],
                "video_id" => $row['video_id']
            ];
        }
    }

    echo json_encode(array_values($films));
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur : " . $e->getMessage()]);
}
?>
