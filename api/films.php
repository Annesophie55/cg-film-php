<?php
require_once 'config/database.php';

header('Content-Type: application/json');

try {
    $query = "
        SELECT 
            f.id AS film_id, 
            f.title, 
            f.subtitle,
            f.release_date, 
            f.synopsis,
            GROUP_CONCAT(DISTINCT t.name) AS tags,
            GROUP_CONCAT(DISTINCT CONCAT(a.name, '||', fr.roles)) AS actors_roles,
            GROUP_CONCAT(DISTINCT fv.video_type, '::', fv.embed_url, '::', fv.video_src) AS videos,
            GROUP_CONCAT(DISTINCT fi.src) AS images
        FROM films f
        LEFT JOIN film_tag ft ON f.id = ft.film_id
        LEFT JOIN tags t ON ft.tag_id = t.id
        LEFT JOIN film_roles fr ON f.id = fr.film_id
        LEFT JOIN actors a ON fr.actor_id = a.id
        LEFT JOIN film_videos fv ON f.id = fv.film_id
        LEFT JOIN film_images fi ON f.id = fi.film_id
        GROUP BY f.id
    ";

    $stmt = $pdo->query($query);
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // 🔍 Reformater les données pour avoir des tableaux bien structurés
    foreach ($films as &$film) {
        $film['tags'] = $film['tags'] ? explode(',', $film['tags']) : [];

        $film['actors'] = [];
        if ($film['actors_roles']) {
            foreach (explode(',', $film['actors_roles']) as $actor_role) {
                list($actor, $role) = explode('||', $actor_role);
                $film['actors'][] = ["name" => $actor, "role" => $role];
            }
        }
        unset($film['actors_roles']);

        $film['videos'] = [];
        if ($film['videos']) {
            foreach (explode(',', $film['videos']) as $video_data) {
                list($type, $embed_url, $src) = explode('::', $video_data);
                $film['videos'][] = [
                    "video_type" => $type,
                    "embed_url" => $embed_url ?: null,
                    "video_src" => $src ?: null
                ];
            }
        }

        $film['images'] = $film['images'] ? explode(',', $film['images']) : [];
    }

    echo json_encode($films);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur : " . $e->getMessage()]);
}
?>
