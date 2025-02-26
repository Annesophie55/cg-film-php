<?php
require_once 'config/database.php';

header('Content-Type: application/json');

try {
    $stmt = $pdo->query("SELECT * FROM partners");
    $partners = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($partners);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(["error" => "Erreur serveur : " . $e->getMessage()]);
}
?>
