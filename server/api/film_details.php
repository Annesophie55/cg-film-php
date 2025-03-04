<?php
require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

// Vérifier si un slug est fourni
if (!isset($_GET['slug'])) {
    http_response_code(400);
    echo json_encode(["error" => "Paramètre 'slug' manquant"]);
    exit;
}

$slug = $_GET['slug'];
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
    f.synopsis,
    (SELECT fi.src FROM film_images fi WHERE fi.film_id = f.id AND fi.type = 'poster' LIMIT 1) AS poster,
    (SELECT fv.video_src FROM film_videos fv WHERE fv.film_id = f.id AND fv.video_type = 'mp4' LIMIT 1) AS video_src,
    GROUP_CONCAT(DISTINCT CONCAT(a.name, '||', IFNULL(fr.role, 'Inconnu')) SEPARATOR '###') AS cast,
    GROUP_CONCAT(DISTINCT CONCAT(fi.src, '||', fi.alt) SEPARATOR '###') AS images
FROM films f
LEFT JOIN film_roles fr ON f.id = fr.film_id
LEFT JOIN actors a ON fr.actor_id = a.id
LEFT JOIN film_images fi ON f.id = fi.film_id AND fi.type = 'photo'
WHERE f.slug = :slug
GROUP BY f.id";


    $stmt = $pdo->prepare($query);
    $stmt->execute(['slug' => "/films/$slug"]);
    $film = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$film) {
        http_response_code(404);
        echo json_encode(["error" => "Film non trouvé"]);
        exit;
    }

    $film['cast'] = !empty($film['cast']) 
    ? array_values(array_filter(array_map(function ($actor_data) {
        if (strpos($actor_data, '||') !== false) {
            list($actor, $role) = explode('||', $actor_data);
            return ["name" => $actor, "role" => $role];
        }
        return null;
    }, explode('###', $film['cast']))))
    : [];

$film['images'] = !empty($film['images']) 
    ? array_values(array_filter(array_map(function ($image_data) use ($baseImageUrl) {
        if (strpos($image_data, '||') !== false) {
            list($src, $alt) = explode('||', $image_data);
            return [
                "src" => "$baseImageUrl/" . ltrim($src, '/'),
                "alt" => $alt
            ];
        }
        return null;
    }, explode('###', $film['images']))))
    : [];

    // Vérifier si un poster existe
    if (!empty($film['poster'])) {
        $film['poster'] = "$baseImageUrl/" . ltrim($film['poster'], '/');
    } else {
        $film['poster'] = "$baseImageUrl/logo.webp";
    }

    echo json_encode($film);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur : " . $e->getMessage()]);
}
?>
