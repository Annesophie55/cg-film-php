<?php
require_once __DIR__ . '/../../config/database.php';

// Headers pour JSON et CORS (si besoin)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Récupère la route demandée
$request = $_SERVER['REQUEST_URI'];

// Routeur simple
switch ($request) {
    case '/api/films_carrousel':
        require __DIR__ . '/api/films_details.php';
        break;
    case '/api/films_search':
        require __DIR__ . '/api/films_search.php';
        break;
    case '/api/films_carrousel':
        require __DIR__ . '/api/films_carrousel.php';
        break;
    case '/api/films':
        require __DIR__ . '/api/films_card.php';
        break;
    case '/api/partners':
        require __DIR__ . '/api/partners.php';
        break;
    case '/api/tags':
        require __DIR__ . '/api/tags.php';
        break;
    default:
        http_response_code(404);
        echo json_encode(["error" => "Route not found"]);
        break;
}
?>