<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acceptCookies = $_POST['accept'] === 'true';

    if ($acceptCookies) {
        // Si l'utilisateur accepte les cookies, on crée un cookie
        setcookie('cookies_accepted', 'true', time() + 365 * 24 * 3600, '/', '', false, true);
    } else {
        // Si l'utilisateur refuse les cookies, on crée un cookie pour enregistrer son choix
        setcookie('cookies_accepted', 'false', time() + 365 * 24 * 3600, '/', '', false, true);
    }

    // Redirection vers la page d'accueil ou autre
    header('Location: login.php');
    exit();
}
?>
