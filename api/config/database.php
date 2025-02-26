<?php
$host = "localhost"; // Change si nécessaire (ex: 127.0.0.1)
$dbname = "cg-film"; // Remplace par le nom de ta base de données
$username = "root"; // Ton utilisateur MySQL (par défaut "root" en local)
$password = ""; // Mot de passe MySQL (souvent vide en local)

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "✅ Connexion à la base de données réussie !";
} catch (PDOException $e) {
    die("❌ Erreur de connexion : " . $e->getMessage());
}
?>
