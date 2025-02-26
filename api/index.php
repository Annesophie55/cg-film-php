<?php
require_once 'config/database.php';

header('Content-Type: application/json');

$request_uri = explode("?", $_SERVER["REQUEST_URI"], 2)[0];

// Route pour les films et leurs relations (acteurs, tags, images, vidéos)
if (strpos($request_uri, "/api/films") === 0) {
    require_once 'films.php';
}

// Route pour les partenaires
elseif ($request_uri === "/api/partners") {
    require_once 'partners.php';
}

// Si la route n'existe pas
else {
    http_response_code(404);
    echo json_encode(["error" => "Ressource non trouvée"]);
}
?>
