<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=1.7">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
    <link rel="stylesheet" href="css/header2.css?v=1.3"/>
</head>
<body>
    <?php require_once("header2.php"); ?>
    <div class="containerPrincipal">
        <div class="container_1_profilClient">
            <h3>Mon profil</h3>
        <br>
            <div class="containerProfil">
                <div class="containerAdresse">
                    <h3><img src="images/information.png" alt="infos icone">&nbsp;&nbsp; Votre adresse</h3>
                <br>
                    <p>0123 rue exemple 01234 Ville</p>
                <br>
                    <button class="btnAdresse">Modifier</button>
                </div>
                <div class="containerTel">
                    <h3><img src="images/information.png" alt="infos icone">&nbsp;&nbsp; Votre numéro de téléphone</h3>
                <br>
                    <p>0123456789</p>
                <br>
                    <button class="btnAdresse">Modifier</button>
                </div>
            </div> 
            <div class="HabitudeClient">
            <a href="#"><h3 class="mesAchats">Mes achats</h3></a>
            
            <a href="#"><h3 class="mesPref">Mes préférences</h3></a>
        </div>
        </div>
        
    </div>
   
    <?php require_once('footer.php'); ?>
    
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
</body>
</html>