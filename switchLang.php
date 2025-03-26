<?php
session_start();

// Basculer la langue
if ($_SESSION['lang'] == 'fr') {
    $_SESSION['lang'] = 'en';
} else {
    $_SESSION['lang'] = 'fr';
}

// Retour à la page précédente
header("Location: " . $_SERVER['HTTP_REFERER']);
exit;
?>
