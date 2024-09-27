<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/register.css">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
</head>
<body>
    <div class="containerPrincipal">
    <div class="content_full">  
        <div class="content_register">
            <h2>Inscrivez-vous</h2>
            <p>Entrez une adresse mail</p>
            <form>
                <label for="mail"></label>
                <input type="text" id="mail" name="mail">
            </form>
            <p>Confirmez votre adresse mail</p>
            <form>
                <label for="mail"></label>
                <input type="text" id="mail" name="mail">
            </form>
            <form>
                <p>Entrez un mot de passe</p>
                <label for="mot_de_passe"></label>
                <input type="text" id="passwd" name="passwd">
            </form>
            <button>S'inscrire</button>   
        </div>
      </div>
    </div>
   
<?php require_once('footer.php'); ?>
</body>
</html>