<?php
require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

// Définition de l'URL de base des images (à adapter selon ton serveur)
$baseImageUrl = "http://localhost/cg-film-new/server/images"; 

try {
    $query = "
    SELECT 
        f.id AS film_id, 
        f.title, 
        f.subtitle,
        f.release_date,
        f.description,
        f.slug,
        (SELECT fi.src FROM film_images fi WHERE fi.film_id = f.id AND fi.type = 'poster' LIMIT 1) AS poster,
        (SELECT fv.embed_url FROM film_videos fv WHERE fv.film_id = f.id AND fv.video_type = 'youtube' LIMIT 1) AS embed_url,
        GROUP_CONCAT(DISTINCT t.name SEPARATOR '||') AS tags
    FROM films f
    LEFT JOIN film_tag ft ON f.id = ft.film_id
    LEFT JOIN tags t ON ft.tag_id = t.id
    GROUP BY f.id
    ";

    $stmt = $pdo->query($query);
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    foreach ($films as &$film) {
        // Convertir les tags en tableau
        $film['tags'] = $film['tags'] ? explode(',', $film['tags']) : [];

        // Vérifier si un poster existe
        if (!empty($film['poster'])) {
            // Nettoyer le chemin et éviter un double "/"
            $cleanedPath = ltrim($film['poster'], '/');
            $film['poster'] = "$baseImageUrl/$cleanedPath";
        } else {
            // Fallback sur une image par défaut si le film n'a pas d'affiche
            $film['poster'] = "$baseImageUrl/logo.webp";
        }

        // Vérifier si une vidéo existe
        $film['embed_url'] = $film['embed_url'] ?? null;
    }
    
    echo json_encode($films);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur : " . $e->getMessage()]);
}
?>
