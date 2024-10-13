<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>GastronoMeal</title>
    <meta name="description" content="A brief description of your page.">
    <link rel="stylesheet" href="css/styles.css?v=2.1">
    <link rel="icon" href="GastronoMealGroup/images/G-meal-2.ico">
</head>
<body>
    <?php require_once("header.php"); ?>
    <div class="containerPrincipal">
        <div class="container_1">
        </div>
        <div class="container_2">
            <div class="superpoImage">
                <div class="foundAdress"></div>
                <div class="whenLivraison"></div>
                <button class="foundRetaurantBtn">Trouver un restaurant</button>
            </div>
            <img src="images/foodAlex.png" alt="image restaurant" class="imgRestaurantIndex">
        </div>
    </div>
    <div class="containerSecondaire">
        <div class="container_1">
            
        </div>
        <div class="container_2">
          
        </div>
    </div>
   
    <?php require_once('footer.php'); ?>
    <!-- POST DEV POUR PROD <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.14/dist/vue.js"></script>
</body>
</html>