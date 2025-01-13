<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérifiez si l'utilisateur a accepté les cookies
    if (isset($_COOKIE['cookies_accepted']) || $_COOKIE['cookies_accepted'] === 'false') {
        // Préparez les données pour envoyer au backend Spring Boot
        $data = json_encode([
            'email' => $email,
            'motDePasse' => $password,
        ]);
        

        // Requête cURL vers le backend
        $ch = curl_init('http://localhost:8080/api/auth/login');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            // Connexion réussie : Créez des cookies pour l'utilisateur
            $token = bin2hex(random_bytes(16));
            setcookie("user_session", $token, time() + 3600, "/", "", false, true);
            setcookie("user_email", $email, time() + 3600, "/", "", false, true);

            // Redirection vers la page utilisateur
            header("Location: isLogin.php");
            exit();
        } else {
            // Affiche un message d'erreur en cas d'échec
            echo "Email ou mot de passe incorrect. Code HTTP: $httpCode";
        }
    } else {
        // Si les cookies ne sont pas acceptés, afficher un message
        echo "Vous devez accepter les cookies pour vous connecter.";
    }
}
?>
<?php
session_start();
$_SESSION['user_id'] = $userId; // ID de l'utilisateur depuis la base de données
$_SESSION['user_email'] = $email; // Email de l'utilisateur
?>