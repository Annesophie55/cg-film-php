<?php
require_once __DIR__ . '/../config/database.php';

header('Content-Type: application/json');

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

            GROUP_CONCAT(DISTINCT t.name SEPARATOR '||') AS tags,
            GROUP_CONCAT(DISTINCT a.name SEPARATOR '||') AS actors
        FROM films f
        LEFT JOIN film_tag ft ON f.id = ft.film_id
        LEFT JOIN tags t ON ft.tag_id = t.id
        LEFT JOIN film_roles fr ON f.id = fr.film_id
        LEFT JOIN actors a ON fr.actor_id = a.id
        WHERE 1
    ";

    $params = [];

    // 🔎 Recherche par titre, acteur ou tag
    if (!empty($_GET['query'])) {
        $query .= " AND (
            f.title LIKE :query 
            OR EXISTS (SELECT 1 FROM film_roles fr INNER JOIN actors a ON fr.actor_id = a.id WHERE fr.film_id = f.id AND a.name LIKE :query) 
            OR EXISTS (SELECT 1 FROM film_tag ft INNER JOIN tags t ON ft.tag_id = t.id WHERE ft.film_id = f.id AND t.name LIKE :query)
        )";
        $params[':query'] = "%" . $_GET['query'] . "%";
    }

    // 🔎 Filtrage par tag si présent
    if (!empty($_GET['tag'])) {
        $query .= " AND EXISTS (
            SELECT 1 FROM film_tag ft 
            INNER JOIN tags t ON ft.tag_id = t.id 
            WHERE ft.film_id = f.id AND t.name = :tag
        )";
        $params[':tag'] = $_GET['tag'];
    }

    $query .= " GROUP BY f.id";

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($films as &$film) {
        $film['tags'] = $film['tags'] ? explode('||', $film['tags']) : [];
        $film['actors'] = $film['actors'] ? explode('||', $film['actors']) : [];

        if (!empty($film['poster'])) {
            $film['poster'] = "http://localhost/cg-film-new/server/images/" . ltrim($film['poster'], '/');
        } else {
            $film['poster'] = "http://localhost/cg-film-new/server/images/logo.webp";
        }

        $film['embed_url'] = $film['embed_url'] ?? null;
    }

    echo json_encode($films);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur : " . $e->getMessage()]);
}
?>
