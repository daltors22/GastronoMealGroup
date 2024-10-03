<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=1.3">
    <link rel="stylesheet" href="css/home.css?v=1.0">
    <link rel="stylesheet" href="css/index.css?v=1.3">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <link rel="stylesheet" href="css/nav.css?v=1.2"/>
</head>
<body>
    <?php require_once("header.php"); ?>
    <div class="containerPrincipal">
        <div class="container_1">
            <h1>Bienvenue</h1>
            <h3>sur le site</h3>
            <div class="button_container">
            <a href="login.php"><button class="button_connexion">Connexion</button></a>
            <a href="register.php"><button class="button_inscription">inscription</button></a>
            </div>
        </div>
        <div class="container_2">
           
        </div>
    </div>
   
    <?php require_once('footer.php'); ?>
    <!-- POST DEV POUR PROD <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
</body>
</html>