<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/login.css?v=1.5">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <link rel="stylesheet" href="css/nav.css"/>
</head>
<body>
    <?php require_once('header.php') ?>
    <div class="containerPrincipal">
      <div class="content_full">  
        <div class="content_login">
        <a href="index.php" class="close_btn">&times;</a>
            <h2>Connectez-vous</h2>
            <p>Entrez votre adresse mail</p>
            <form>
                <label for="mail"></label>
                <input type="text" id="mail" name="mail">
            </form>
            <form>
                <p>Entrez votre mot de passe</p>
                <label for="mot_de_passe"></label>
                <input type="text" id="passwd" name="passwd">
                <a href=""><p>mot de passe oublié ?</p></a>
            </form>
            <button>Connexion</button>   
        </div>
      </div>
    </div>
   
<?php require_once('footer.php'); ?>
</body>
</html>