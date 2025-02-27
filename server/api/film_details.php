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
        f.detail_page,
        (SELECT fi.src FROM film_images fi WHERE fi.film_id = f.id AND fi.type = 'poster' LIMIT 1) AS poster,
        (SELECT fv.embed_url FROM film_videos fv WHERE fv.film_id = f.id AND fv.video_type = 'youtube' LIMIT 1) AS embed_url,
        GROUP_CONCAT(DISTINCT CONCAT(a.name, '||', fr.role)) AS cast
    FROM films f
    LEFT JOIN film_roles fr ON f.id = fr.film_id
    LEFT JOIN actors a ON fr.actor_id = a.id
    WHERE f.detail_page = :slug
    GROUP BY f.id
    ";

    $stmt = $pdo->prepare($query);
    $stmt->execute(['slug' => "/films/$slug"]);
    $film = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$film) {
        http_response_code(404);
        echo json_encode(["error" => "Film non trouvé"]);
        exit;
    }

    // Convertir les acteurs en tableau
    $film['cast'] = [];
    if ($film['cast']) {
        foreach (explode(',', $film['cast']) as $actor_data) {
            list($actor, $role) = explode('||', $actor_data);
            $film['cast'][] = ["name" => $actor, "role" => $role];
        }
    }

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
