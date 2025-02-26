<?php
require_once 'config/database.php';

header('Content-Type: application/json');

try {
    // 🔍 Initialisation de la requête avec toutes les relations
    $query = "
        SELECT 
            f.*, 
            GROUP_CONCAT(DISTINCT t.name) AS tags,
            GROUP_CONCAT(DISTINCT a.name) AS actors,
            GROUP_CONCAT(DISTINCT fv.embed_url) AS youtube_videos,  -- 🔹 On ne prend que les vidéos YouTube
            GROUP_CONCAT(DISTINCT fi.src) AS images
        FROM films f
        LEFT JOIN film_tag ft ON f.id = ft.film_id
        LEFT JOIN tags t ON ft.tag_id = t.id
        LEFT JOIN film_roles fr ON f.id = fr.film_id
        LEFT JOIN actors a ON fr.actor_id = a.id
        LEFT JOIN film_videos fv ON f.id = fv.film_id AND fv.video_type = 'youtube' -- 🔥 Filtrer YouTube ici
        LEFT JOIN film_images fi ON f.id = fi.film_id
        WHERE 1
    ";

    $params = [];

    // 🔎 Recherche par titre
    if (!empty($_GET['title'])) {
        $query .= " AND f.title LIKE :title";
        $params[':title'] = "%" . $_GET['title'] . "%";
    }

    // 🔎 Filtrer par année
    if (!empty($_GET['year'])) {
        $query .= " AND f.release_date = :year";
        $params[':year'] = $_GET['year'];
    }

    // 🔎 Filtrer par tag
    if (!empty($_GET['tag'])) {
        $query .= " AND t.name = :tag";
        $params[':tag'] = $_GET['tag'];
    }

    // 🔎 Filtrer par acteur
    if (!empty($_GET['actor'])) {
        $query .= " AND a.name LIKE :actor";
        $params[':actor'] = "%" . $_GET['actor'] . "%";
    }

    $query .= " GROUP BY f.id"; // 🔹 Évite les doublons en regroupant par film ID

    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $films = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($films);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur : " . $e->getMessage()]);
}

?>
