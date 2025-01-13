<?php
session_start();

header('Content-Type: application/json');

// Vérifier si l'utilisateur est connecté
if (!isset($_COOKIE['user_session']) || !isset($_COOKIE['user_email'])) {
    http_response_code(401); // Non autorisé
    echo json_encode(['error' => 'Utilisateur non authentifié.']);
    exit();
}

// Exemple : Connexion à la base de données
//$conn = new mysql("localhost", "root", "password", "gastronomeal");

if ($conn->connect_error) {
    http_response_code(500); // Erreur serveur
    echo json_encode(['error' => 'Erreur de connexion à la base de données.']);
    exit();
}

// Récupérer les informations de l'utilisateur depuis la base de données
$user_email = $conn->real_escape_string($_COOKIE['user_email']);
$sql = "SELECT nom, prenom, telephone, email, FROM user WHERE email = '$user_email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $userData = $result->fetch_assoc();
    echo json_encode($userData);
} else {
    http_response_code(404); // Non trouvé
    echo json_encode(['error' => 'Utilisateur introuvable.']);
}

$conn->close();
?>
